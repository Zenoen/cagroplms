<?php

include("../conn.php");

class LicenseSMSNotifier
{
    private $dbConnection;

    public function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }
    public function sendNotificationsByEmail($lid, $email, $expirationDate)
    {
        $debugEnable = false;
        $currentDate = new DateTime();
        $thresholdDate = (clone $currentDate)->modify('+30 days');
    
        // Debugging output for current and threshold dates
        if ($debugEnable) {
            echo "Current Date: " . $currentDate->format('Y-m-d') . "\n";
            echo "Threshold Date: " . $thresholdDate->format('Y-m-d') . "\n";
        }
    
        // Prepare the SQL query to get distinct contacts as a comma-separated list
        $query = "
            SELECT GROUP_CONCAT(DISTINCT contact SEPARATOR ',') AS contacts
            FROM (
                SELECT ff_contact AS contact FROM fisherfolks WHERE u_email = ? AND ff_contact IS NOT NULL AND ff_contact <> ''
                UNION ALL
                SELECT fw_contact AS contact FROM fishworkerlicense WHERE u_email = ? AND fw_contact IS NOT NULL AND fw_contact <> ''
                UNION ALL
                SELECT fg_loccontact AS contact FROM fishinggears WHERE u_email = ? AND fg_loccontact IS NOT NULL AND fg_loccontact <> ''
                UNION ALL
                SELECT fc_contact AS contact FROM fishcage WHERE u_email = ? AND fc_contact IS NOT NULL AND fc_contact <> ''
                UNION ALL
                SELECT fb_contact AS contact FROM fishingboats WHERE u_email = ? AND fb_contact IS NOT NULL AND fb_contact <> ''
            ) AS contacts_table
        ";
    
        if ($stmt = $this->dbConnection->prepare($query)) {
            $stmt->bind_param("sssss", $email, $email, $email, $email, $email);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $contacts = $row['contacts'];
    
                if (empty($contacts)) {
                    if ($debugEnable) {
                        echo "No valid contacts found for email: $email.\n";
                    }
                    return;
                }
    
                // Debugging output for contacts list and expiration date
                if ($debugEnable) {
                    echo "Contacts: " . $contacts . "\n";
                    echo "Expiration Date: " . $expirationDate . "\n";
                }
    
                $expirationDateObj = new DateTime($expirationDate);
                if ($expirationDateObj <= $thresholdDate &&!$this->alreadySentNotification($lid)) {
                    $contactList = array_unique(array_map('trim', explode(',', $contacts)));
    
                    foreach ($contactList as $number) {
                        if (!empty($number)) {
                            $message = "CAGRO PLMS\nYour license is about to expire.\nThank you.";
                            $response = $this->sendSMS($number, $message);
    
                            if ($debugEnable) {
                                echo $response 
                                    ? "Message sent successfully to $number. Response: $response\n"
                                    : "Message sending failed for number: $number.\n";
                            }
                        }
                    }
    
                    $this->recordExpiryNotification($lid);
                    $this->updateStatus($email);
                } else {
                    if ($debugEnable) {
                        echo "Expiration date not within threshold for $email. Expiration: " 
                            . $expirationDateObj->format('Y-m-d') . ", Threshold: " 
                            . $thresholdDate->format('Y-m-d') . "\n";
                    }
                }
            } else {
                if ($debugEnable) {
                    echo "No rows returned for email: $email.\n";
                }
            }
            $stmt->close();
        } else {
            if ($debugEnable) {
                echo "Error preparing the statement: " . $this->dbConnection->error . "\n";
            }
        }
    }
    
    private function sendSMS($number, $message)
    {
        $encodedMessage = urlencode($message);
        $url = "https://coral-opossum-642640.hostingersite.com/sendSMS.php?number={$number}&message={$encodedMessage}";

        // Initialize cURL
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Set to true to return the response as a string
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Set a timeout for the request

        // Execute the request
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            // Handle error if needed
            $errorMessage = curl_error($ch);
            curl_close($ch);
            throw new Exception("cURL Error: {$errorMessage}");
        }

        // Close cURL resource
        curl_close($ch);

        // Return the response
        return $response;
    }

    private function recordRenewalNotification($rowId)
    {
        // Insert the renewal notification record
        $stmt = $this->dbConnection->prepare("INSERT INTO sent_notifications (row_id, row_type, sms_type, sent_date) VALUES (?, ?, ?, NOW())");
        $rowType = "licensing";  // Set the row type
        $smsType = "renewal";     // Set the SMS type as "renewal"
        $stmt->bind_param("sss", $rowId, $rowType, $smsType);

        if ($stmt->execute()) {
            echo "Renewal notification recorded for row ID: $rowId.\n";
        } else {
            echo "Failed to record renewal notification: " . $this->dbConnection->error . "\n";
        }

        $stmt->close();
    }
    private function recordExpiryNotification($rowId)
    {
        // Insert the expiry notification record
        $stmt = $this->dbConnection->prepare("INSERT INTO sent_notifications (row_id, row_type, sms_type, sent_date) VALUES (?, ?, ?, NOW())");
        $rowType = "licensing";  // Set the row type
        $smsType = "expiry";      // Set the SMS type as "expiry"
        $stmt->bind_param("sss", $rowId, $rowType, $smsType);

        if ($stmt->execute()) {
            // echo "Expiry notification recorded for row ID: $rowId.\n";
        } else {
            // echo "Failed to record expiry notification: " . $this->dbConnection->error . "\n";
        }

        $stmt->close();
    }


    private function updateStatus($email)
    {
        // Update the license_status in the licensing table based on the provided email
        $updateQuery = "UPDATE licensing SET license_status = '2' WHERE u_email = ?";

        if ($stmt = $this->dbConnection->prepare($updateQuery)) {
            $stmt->bind_param("s", $email);
            if ($stmt->execute()) {
                // echo "License status updated for email: $email.\n";
                echo "<script>setTimeout(function() { window.location.reload(); }, 300);</script>";

            } else {
                echo "Failed to update license status: " . $this->dbConnection->error . "\n";
            }
            $stmt->close();
        } else {
            echo "Error preparing update statement: " . $this->dbConnection->error . "\n";
        }
    }

    private function alreadySentNotification($rowId)
    {
        // Check if a notification has already been sent for this row ID
        $stmt = $this->dbConnection->prepare("SELECT COUNT(*) AS count FROM sent_notifications WHERE row_id = ? AND row_type = 'licensing'");
        $stmt->bind_param("s", $rowId);
        $stmt->execute();
        $result = $stmt->get_result(); // Fetch the result

        $count = 0; // Initialize $count as 0 by default
        if ($row = $result->fetch_assoc()) {
            $count = $row['count']; // Retrieve the 'count' column value
        }

        $stmt->close();
        return $count > 0; // Return true if a notification has already been sent
    }
}
