<?php

class OTPNotifier
{
    private $dbConnection;

    public function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    // Generate a random 4-digit OTP
    public function generateOTP()
    {
        return rand(1000, 9999);
    }

    // Send OTP to a given contact number
    public function sendOTP($contactNumber, $id)
    {
        date_default_timezone_set('Asia/Manila');
        // Generate a 4-digit OTP
        $otp = $this->generateOTP();

        // Get the current time
        $currentTime = new DateTime();

        // Add 5 minutes to the current time for expiration
        $expirationTime = clone $currentTime; // Clone current time to avoid modifying it directly
        $expirationTime->modify('+5 minutes'); // OTP expires in 5 minutes

        // Store OTP in the database with expiration time
        $this->storeOTP($contactNumber, $id, $otp, $expirationTime);

        // Prepare the OTP message Your verification code is: {$otp}.
        $message = " Your verification code is: {$otp}. It will expire in 5 minutes.";

        // Send the OTP message via SMS
        try {
            $response = $this->sendSMS($contactNumber, $message);
        } catch (Exception $e) {
            return ['error' => true, 'message' => 'Failed to send OTP: ' . $e->getMessage()];
        }

        // Return the response (for front-end confirmation)
        return ['success' => true, 'message' => $message];
    }

    // Store OTP and expiration time in the database
    private function storeOTP($contactNumber, $id, $otp, $expirationTime)
    {
        // Format the expiration time as a string
        $exp = $expirationTime->format('Y-m-d H:i:s');

        // Store OTP in the database (you can modify table structure as needed)
        $stmt = $this->dbConnection->prepare("INSERT INTO otp_verifications (contact_number,user_id, otp, expiration_time) VALUES (?,?, ?, ?)");
        $stmt->bind_param("siss", $contactNumber,$id, $otp, $exp);

        if (!$stmt->execute()) {
            throw new Exception("Failed to store OTP: " . $stmt->error);
        }
        $stmt->close();
    }

    // Verify OTP entered by the user
    public function verifyOTP($contactNumber, $enteredOTP, $id)
    {
        date_default_timezone_set('Asia/Manila');

        // Fetch the stored OTP and expiration time for the given contact number
        $stmt = $this->dbConnection->prepare("SELECT otp, expiration_time FROM otp_verifications WHERE contact_number = ? AND user_id = ? ORDER BY created_at DESC LIMIT 1");
        $stmt->bind_param("si", $contactNumber, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            return ['error' => true, 'message' => 'No OTP found for this contact number.'];
        }

        $row = $result->fetch_assoc();
        $storedOTP = $row['otp'];
        $expirationTime = new DateTime($row['expiration_time']);

        // Check if the OTP has expired
        $currentTime = new DateTime();

        if ($currentTime > $expirationTime) {
            return ['error' => true, 'message' => 'OTP has expired.'];
        } else {
            // Check if the entered OTP matches the stored OTP
            if ($storedOTP == $enteredOTP) {
                $query = "UPDATE users SET verified = 1 WHERE u_id = ?";
                $stmt = $this->dbConnection->prepare($query);
                $stmt->bind_param("i", $id);

                if ($stmt->execute()) {
                    return ['success' => true, 'message' => 'OTP verified successfully.'];

                } else {
                    return ['error' => true, 'message' => 'Failed to verify.'];

                }
            } else {
                return ['error' => true, 'message' => 'Invalid OTP.'];
            }
        }
    }

    // Send SMS using an external service
    public function sendSMS($number, $message)
    {
        $encodedMessage = urlencode($message);
        $url = "https://coral-opossum-642640.hostingersite.com/sendSMS.php?number={$number}&message={$encodedMessage}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $errorMessage = curl_error($ch);
            curl_close($ch);
            throw new Exception("cURL Error: {$errorMessage}");
        }

        curl_close($ch);
        return $response;
    }
}
