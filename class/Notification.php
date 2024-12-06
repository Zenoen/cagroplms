<?php
class Notification
{
    private $conn;

    // Constructor to initialize the database connection
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }

    // Function to add a notification to the database
    public function addNotification($userData, $u_email, $not_title, $not_for, $row_type)
    {
        // Construct the notification description
        if ($not_for == "admin") {
            if ($not_title == "Approval") {
                $not_desc = $userData['lname'] . ", " . $userData['fname'] . " approved the permit for " . $u_email;
            } else if ($not_title == "Declined") {
                $not_desc = $userData['lname'] . ", " . $userData['fname'] . " declined the permit for " . $u_email;
            }else if ($not_title == "Request") {
                $not_desc =$u_email. " submitted a request.";
            }
        }
        if ($not_for == "sectionhead") {
            if ($not_title == "Approval") {
                $not_desc = $userData['lname'] . ", " . $userData['fname'] . " sent an approval for " . $u_email;
            } else if ($not_title == "Declined") {
                $not_desc = $userData['lname'] . ", " . $userData['fname'] . " sent a decline for " . $u_email;
            }
        }
        if ($not_for == "client") {
            if ($not_title == "Approval") {
                $not_desc = "Your request has been sent for approval.";
            } else if ($not_title == "Approved") {
                $not_desc = "Your request has been successfully approved.";
            } else if ($not_title == "Declined") {
                $not_desc = "Your request has been declined.";
            }
        }
        
        // SQL query to insert the notification into the database (removed the extra comma after `not_date`)
        $sql = "INSERT INTO `notifications` (`not_title`, `not_desc`, `not_for`,`not_client_email`, `not_date`,`row_type`) VALUES (?, ?, ?,?, NOW(),?)";

        // Prepare the SQL statement
        if ($stmt = $this->conn->prepare($sql)) {
            // Bind the parameters to the statement
            $stmt->bind_param("sssss", $not_title, $not_desc, $not_for,$u_email, $row_type);

            // Execute the statement
            if ($stmt->execute()) {
                return true; // Success
            } else {
                return false; // Execution failed
            }
        } else {
            return false; // Preparation of statement failed
        }
    }
}

// $notification = new Notification($conn);
// $notification->addNotification($userData, $u_email, $not_title);
