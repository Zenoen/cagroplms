<?php


class SMSNotifier
{
    private $dbConnection;

    public function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function sendExpiringNotifications($table, $idColumn, $contactColumn, $entityType)
    {
        $debugEnable = false;
        // Check if connection is open
        if ($this->dbConnection->ping()) {
            $currentDate = new DateTime();
            $thresholdDate = (clone $currentDate)->modify('+80 days');

            // Query to get records from dynamic table
            $query = "SELECT $idColumn, $contactColumn, expiration_date, issuance_date FROM $table";
            $result = $this->dbConnection->query($query);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $number = $row[$contactColumn];  // Dynamic contact field
                    $expDate = $row['expiration_date'] ? new DateTime($row['expiration_date']) : null;
                    $issueDate = $row['issuance_date'] ? new DateTime($row['issuance_date']) : null;
                    $rowId = $row[$idColumn];  // Get the dynamic row ID

                    // Skip if either issuance_date or expiration_date is null
                    if ($expDate === null || $issueDate === null) {
                        continue;
                    }

                    // Check if the expiration date is within 80 days and notification hasn't been sent for this row
                    if ($expDate <= $thresholdDate && !$this->isAlreadyNotified($rowId, $table, 'expiry')) {
                        $message = "CAGRO PLMS\nYour permit for {$entityType} is about to expire.\nThank you.";
                        $response = $this->sendSMS($number, $message);
                        // echo "<script>setTimeout(function() { window.location.reload(); }, 300);</script>";

                        if ($debugEnable) {
                          
                            // Optionally handle the response
                            if ($response) {
                                echo "Expiry message sent successfully to $number. Response: " . $response . "\n";
                            } else {
                                echo "Expiry message sending failed for number: $number.\n";
                            }
                        }
                        // Record notification with sms_type 'expiry' and update status
                        $this->recordExpiryNotification($rowId, $table, $idColumn);
                    }
                }
            }
        } else {
            die("Database connection is closed.");
        }
    }


    public function isAlreadyNotified($rowId, $table, $smsType)
    {
        $stmt = $this->dbConnection->prepare("SELECT * FROM sent_notifications WHERE row_id = ? AND row_type = ? AND sms_type = ?");
        $stmt->bind_param("sss", $rowId, $table, $smsType);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result->num_rows > 0;
    }

    public function recordExpiryNotification($rowId, $table, $idColumn)
    {
        // Insert the notification record with sms_type as 'expiry'
        $stmt = $this->dbConnection->prepare("INSERT INTO sent_notifications (row_id, row_type, sms_type) VALUES (?, ?, ?)");
        $smsType = 'expiry'; // sms_type for expiry notifications
        $stmt->bind_param("sss", $rowId, $table, $smsType);

        if (!$stmt->execute()) {
            throw new Exception("Failed to insert notification: " . $stmt->error);
        }
        $stmt->close();

        // Update the u_status to 5 in the specified table based on the ID (expiry notification)
        $updateQuery = "UPDATE $table SET u_status = 5 WHERE $idColumn = ?";
        $stmtUpdate = $this->dbConnection->prepare($updateQuery);
        $stmtUpdate->bind_param("s", $rowId);

        if (!$stmtUpdate->execute()) {
            throw new Exception("Failed to update status: " . $stmtUpdate->error);
        }
        $stmtUpdate->close();
    }

    public function recordRenewalNotification($rowId, $table)
    {
        // Insert the notification record with sms_type as 'renewal'
        $stmt = $this->dbConnection->prepare("INSERT INTO sent_notifications (row_id, row_type, sms_type) VALUES (?, ?, ?)");
        $smsType = 'renewal'; // sms_type for renewal notifications
        $stmt->bind_param("sss", $rowId, $table, $smsType);

        if (!$stmt->execute()) {
            throw new Exception("Failed to insert notification: " . $stmt->error);
        }
        $stmt->close();
    }

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

// Example usage
// $smsNotifier = new SMSNotifier($conn);
// $smsNotifier->sendExpiringNotifications('fisherfolks', 'ff_id', 'ff_contact', 'Fisherfolks');
// $smsNotifier->sendRenewalNotifications('fisherfolks', 'ff_id', 'ff_contact', 'Fisherfolks');
