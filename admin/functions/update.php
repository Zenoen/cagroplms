
<?php
session_start();
include("../../conn.php");
include("../../class/SMSNotifier.php");
include("../../class/Notification.php");
$smsNotifier = new SMSNotifier($conn);


$userEmail = $_SESSION["user"];
$query = "";
if ($_SESSION['usertype'] == 'CAGRO - Administrator') {
    $query = "SELECT u_prof, u_fname AS fname, u_lname AS lname, u_role AS urole, u_email AS uemail  
          FROM users WHERE u_email = ?";
}

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
} else {
    echo "No user data found.";
    exit();
}
if (!isset($_SESSION["user"]) || $_SESSION['usertype'] != 'CAGRO - Administrator') {
    header("location: ../../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'send_for_approval') {
        $notification = new Notification($conn);
        $notification->addNotification($userData,$_POST['u_email'], 'Approval','sectionhead','dashboard');
        $notification->addNotification($userData,$_POST['u_email'], 'Approval','client','profile');
        

    }
    

    if (isset($_POST['form_type']) && $_POST['form_type'] == 'fisherfolks') {
        $row_type = $_POST['form_type'];
        $ff_id = intval($_POST['id']);
        $ff_gender = $_POST['gender'];
        $ff_fname = $_POST['fname'];
        $ff_mname = $_POST['mname'];
        $ff_lname = $_POST['lname'];
        $ff_dob = $_POST['dob'];
        $contact = $_POST['contact'];
        $postal = $_POST['postal'];
        $province = $_POST['province'];
        $municipal = $_POST['municipal'];
        $barangay = $_POST['barangay'];
        $street = $_POST['street'];
        $ff_OR = $_POST['OR'];
        $u_email = $_POST['u_email'];
        $fftype = $_POST['AT'];



        if ($_POST['action'] == 'update') {

            $sql_update = "UPDATE fisherfolks SET ff_gender = ?, ff_fname = ?, ff_mname = ?, ff_lname = ?, ff_dob = ?, ff_contact = ?, ff_postall = ?, ff_prov = ?, ff_municipal = ?, ff_barangay = ?,ff_street = ?, ff_OR = ? WHERE ff_id = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("ssssssssssssi", $ff_gender, $ff_fname, $ff_mname, $ff_lname, $ff_dob, $contact, $postal, $province, $municipal, $barangay, $street, $ff_OR, $ff_id);

            if ($stmt_update->execute()) {
                $_SESSION['message'] = "Fisherfolk Details Updated Successfully.";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error updating data: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }
            header("Location: ../index.php?page=fisherfolks");
            exit();
        } elseif ($_POST['action'] == 'send_for_approval') {
            $sql_insert = "INSERT INTO section_head (client_gender, client_fname, client_mname, client_lname, client_dob, client_prov, client_municipal, client_street, client_brgy, client_OR, approval_type, u_email,row_id,row_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $sql_insert2 = "UPDATE fisherfolks SET u_status = ? WHERE ff_id = ?";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("ssssssssssssis", $ff_gender, $ff_fname, $ff_mname, $ff_lname, $ff_dob, $province, $municipal, $street, $barangay, $ff_OR, $fftype, $u_email, $ff_id, $row_type);

            if ($stmt_insert->execute()) {

                $stmt_insert2 = $conn->prepare($sql_insert2);
                $new_status = 3;
                $stmt_insert2->bind_param("is", $new_status, $ff_id);

                if ($stmt_insert2->execute()) {
                    $_SESSION['message'] = "Approval Request Sent.";
                    $_SESSION['message_type'] = "success";
                } else {
                    $_SESSION['message'] = "Error Updating Status: " . $conn->error;
                    $_SESSION['message_type'] = "error";
                }
            } else {
                $_SESSION['message'] = "Error Sending Approval Request: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }

            header("Location: ../index.php?page=fisherfolks");
            exit();
        } elseif ($_POST['action'] == 'issue_requirements') {
            $sql_status_update = "UPDATE fisherfolks SET u_status = 2 WHERE ff_id = ?";
            $stmt_status_update = $conn->prepare($sql_status_update);
            $stmt_status_update->bind_param("i", $ff_id);

            if ($stmt_status_update->execute()) {
                $_SESSION['message'] = "Requirements Issued Successfully.";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error issuing requirements: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }
            header("Location: ../index.php?page=fisherfolks");

            exit();
        } elseif ($_POST['action'] == 'renew') {

            // Calculate next year's December 31 date
            $next_year_dec31 = date('Y-m-d', strtotime('last day of December ' . (date('Y') + 1)));

            // Prepare SQL query to update the expiration date
            $query = "UPDATE fisherfolks SET expiration_date = ?, u_status=4 WHERE ff_id = ?";

            // Initialize prepared statement for updating expiration date
            if ($stmt = $conn->prepare($query)) {
                // Bind parameters
                $stmt->bind_param('si', $next_year_dec31, $ff_id);

                // Execute the update query
                if ($stmt->execute()) {


                    // Prepare the delete query to remove from sent_notifications
                    $delete_query = "DELETE FROM sent_notifications WHERE row_id = ? AND row_type = ?";
                    if ($delete_stmt = $conn->prepare($delete_query)) {
                        // Bind parameters for the delete query
                        $delete_stmt->bind_param('is', $ff_id, $row_type);

                        // Execute the delete query
                        if ($delete_stmt->execute()) {


                            $_SESSION['message'] = "Fisherfolk expiration date has been updated to next year, December 31.";
                            $_SESSION['message_type'] = "success";



                            $message = "CAGRO PLMS\nYour permit for Fisherfolks has been renewed..\nThank you.";
                            $response = $smsNotifier->sendSMS($contact, $message);
                            $smsNotifier->recordRenewalNotification($ff_id, $row_type);
                        } else {
                            $_SESSION['message'] .= " Error deleting notification record: " . $delete_stmt->error;
                            $_SESSION['message_type'] = "error";
                        }

                        // Close the delete statement
                        $delete_stmt->close();
                    } else {
                        $_SESSION['message'] .= " Error preparing delete statement: " . $conn->error;
                        $_SESSION['message_type'] = "error";
                    }
                } else {
                    $_SESSION['message'] = "Error updating expiration date: " . $stmt->error;
                    $_SESSION['message_type'] = "error";
                }

                // Close the update statement
                $stmt->close();
            } else {
                $_SESSION['message'] = "Error preparing the SQL statement: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }

            // Close the database connection
            $conn->close();
            header("Location: ../index.php?page=fisherfolks");
            exit();
        }
    }

    if (isset($_POST['form_type']) && $_POST['form_type'] == 'fishworkerlicense') {
        $row_type = $_POST['form_type'];
        $fw_id = intval($_POST['id']);
        $fw_gender = $_POST['gender'];
        $fw_fname = $_POST['fname'];
        $fw_mname = $_POST['mname'];
        $fw_lname = $_POST['lname'];
        $fw_dob = $_POST['dob'];
        $contact = $_POST['contact'];
        $postal = $_POST['postal'];
        $province = $_POST['province'];
        $municipal = $_POST['municipal'];
        $barangay = $_POST['barangay'];
        $street = $_POST['street'];
        $fw_OR = $_POST['OR'];
        $locator = $_POST['locator'];
        $u_email = $_POST['uemail'];

        $fftype = $_POST['AT'];

        if ($_POST['action'] == 'update') {
            $sql_update = "UPDATE fishworkerlicense 
            SET fw_gender = ?, fw_fname = ?, fw_mname = ?, fw_lname = ?, fw_dob = ?, fw_contact = ?, fw_postal = ?, fw_province = ?, fw_municipal = ?, fw_barangay=?, fw_street = ?, fw_OR = ? 
            WHERE fw_id = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("ssssssssssssi", $fw_gender, $fw_fname, $fw_mname, $fw_lname, $fw_dob, $contact, $postal, $province, $municipal, $barangay, $street, $fw_OR, /*$locator*/ $fw_id);
            $stmt_update->execute();
            if ($stmt_update->execute()) {
                $_SESSION['message'] = "Fishworker Details Updated Successfully.";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error updating data: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }
            header("Location: ../index.php?page=fishworkers");

            exit();
        } elseif ($_POST['action'] == 'send_for_approval') {
            // Updated INSERT query
            $sql_insert = "INSERT INTO section_head (client_gender, client_fname, client_mname, client_lname, client_dob, client_prov, client_municipal, client_street, client_brgy, client_OR, approval_type, u_email,row_id,row_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)";
            $sql_insert2 = "UPDATE fishworkerlicense SET u_status = ? WHERE fw_id = ?";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("ssssssssssssis", $fw_gender, $fw_fname, $fw_mname, $fw_lname, $fw_dob, $province, $municipal, $street, $barangay, $ff_OR, $fftype, $u_email, $fw_id, $row_type);

            if ($stmt_insert->execute()) {

                $stmt_insert2 = $conn->prepare($sql_insert2);
                $new_status = 3;
                $stmt_insert2->bind_param("is", $new_status, $fw_id);

                if ($stmt_insert2->execute()) {
                    $_SESSION['message'] = "Approval Request Sent.";
                    $_SESSION['message_type'] = "success";
                } else {
                    $_SESSION['message'] = "Error Updating Status: " . $conn->error;
                    $_SESSION['message_type'] = "error";
                }
            } else {
                $_SESSION['message'] = "Error Sending Approval Request: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }

            header("Location: ../index.php?page=fishworkers");

            exit();
        } elseif ($_POST['action'] == 'issue_requirements') {
            $sql_status_update = "UPDATE fishworkerlicense SET u_status = 2 WHERE fw_id = ?";
            $stmt_status_update = $conn->prepare($sql_status_update);
            $stmt_status_update->bind_param("i", $fw_id);

            if ($stmt_status_update->execute()) {
                $_SESSION['message'] = "Requirements Issued Successfully.";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error issuing requirements: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }
            header("Location: ../index.php?page=fishworkers");

            exit();
        } elseif ($_POST['action'] == 'renew') {

            // Calculate next year's December 31 date
            $next_year_dec31 = date('Y-m-d', strtotime('last day of December ' . (date('Y') + 1)));

            // Prepare SQL query to update the expiration date
            $query = "UPDATE fishworkerlicense SET expiration_date = ?, u_status=4 WHERE fw_id = ?";

            // Initialize prepared statement for updating expiration date
            if ($stmt = $conn->prepare($query)) {
                // Bind parameters
                $stmt->bind_param('si', $next_year_dec31, $fw_id);

                // Execute the update query
                if ($stmt->execute()) {


                    // Prepare the delete query to remove from sent_notifications
                    $delete_query = "DELETE FROM sent_notifications WHERE row_id = ? AND row_type = ?";
                    if ($delete_stmt = $conn->prepare($delete_query)) {
                        // Bind parameters for the delete query
                        $delete_stmt->bind_param('is', $fw_id, $row_type);

                        // Execute the delete query
                        if ($delete_stmt->execute()) {
                            $_SESSION['message'] = "Fisherfolk expiration date has been updated to next year, December 31.";
                            $_SESSION['message_type'] = "success";


                            $message = "CAGRO PLMS\nYour permit for Fish Worker has been renewed..\nThank you.";
                            $response = $smsNotifier->sendSMS($contact, $message);
                            $smsNotifier->recordRenewalNotification($fw_id, $row_type);
                        } else {
                            $_SESSION['message'] .= " Error deleting notification record: " . $delete_stmt->error;
                            $_SESSION['message_type'] = "error";
                        }

                        // Close the delete statement
                        $delete_stmt->close();
                    } else {
                        $_SESSION['message'] .= " Error preparing delete statement: " . $conn->error;
                        $_SESSION['message_type'] = "error";
                    }
                } else {
                    $_SESSION['message'] = "Error updating expiration date: " . $stmt->error;
                    $_SESSION['message_type'] = "error";
                }

                // Close the update statement
                $stmt->close();
            } else {
                $_SESSION['message'] = "Error preparing the SQL statement: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }

            // Close the database connection
            $conn->close();
            header("Location: ../index.php?page=fishworkers");
            exit();
        }
    }

    if (isset($_POST['form_type']) && $_POST['form_type'] == 'fishinggears') {
        $row_type = $_POST['form_type'];
        $fg_id = intval($_POST['id']);
        $fg_gender = $_POST['gender'];
        $fg_fname = $_POST['fname'];
        $fg_mname = $_POST['mname'];
        $fg_lname = $_POST['lname'];
        $fg_dob = $_POST['dob'];
        $contact = $_POST['contact'];
        $postal = $_POST['postal'];
        $province = $_POST['province'];
        $municipal = $_POST['municipal'];
        $barangay = $_POST['barangay'];
        $street = $_POST['street'];
        $fg_OR = $_POST['OR'];
        $u_email = $_POST['uemail'];
        $fgtype = $_POST['AT'];

        if ($_POST['action'] == 'update') {
            $sql_update = "UPDATE fishinggears SET fg_gender = ?, fg_locfname = ?, fg_locmname = ?, fg_loclname = ?, fg_dob = ?, fg_loccontact = ?, fg_postal = ?, fg_locprov = ?, fg_locmunicipal = ?, fg_locbarangay = ?,fg_locstreet = ?, fg_OR = ? WHERE fg_id = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("ssssssssssssi", $fg_gender, $fg_fname, $fg_mname, $fg_lname, $fg_dob, $contact, $postal, $province, $municipal, $barangay, $street, $fg_OR, $fg_id);

            if ($stmt_update->execute()) {
                $_SESSION['message'] = "Fishing Gears Details Updated Successfully.";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error updating data: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }
            header("Location: ../index.php?page=fishinggears");

            exit();
        } elseif ($_POST['action'] == 'send_for_approval') {



            $sql_insert = "INSERT INTO section_head (client_gender, client_fname, client_mname, client_lname, client_dob, client_prov, client_municipal, client_street, client_brgy, client_OR, approval_type, u_email,row_id,row_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $sql_insert2 = "UPDATE fishinggears SET u_status = ? WHERE fg_id = ?";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("ssssssssssssis", $fg_gender, $fg_fname, $fg_mname, $fg_lname, $fg_dob, $province, $municipal, $street, $barangay, $fg_OR, $fgtype, $u_email, $fg_id, $row_type);

            if ($stmt_insert->execute()) {

                $stmt_insert2 = $conn->prepare($sql_insert2);
                $new_status = 3;
                $stmt_insert2->bind_param("is", $new_status, $fg_id);

                if ($stmt_insert2->execute()) {
                    $_SESSION['message'] = "Approval Request Sent.";
                    $_SESSION['message_type'] = "success";
                } else {
                    $_SESSION['message'] = "Error Updating Status: " . $conn->error;
                    $_SESSION['message_type'] = "error";
                }
            } else {
                $_SESSION['message'] = "Error Sending Approval Request: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }

            header("Location: ../index.php?page=fishinggears");

            exit();
        } elseif ($_POST['action'] == 'issue_requirements') {
            $sql_status_update = "UPDATE fishinggears SET u_status = 2 WHERE fg_id = ?";
            $stmt_status_update = $conn->prepare($sql_status_update);
            $stmt_status_update->bind_param("i", $fg_id);

            if ($stmt_status_update->execute()) {
                $_SESSION['message'] = "Requirements Issued Successfully.";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error issuing requirements: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }
            header("Location: ../index.php?page=fishinggears");
            exit();
        } elseif ($_POST['action'] == 'renew') {

            // Calculate next year's December 31 date
            $next_year_dec31 = date('Y-m-d', strtotime('last day of December ' . (date('Y') + 1)));

            // Prepare SQL query to update the expiration date
            $query = "UPDATE fishinggears SET expiration_date = ?, u_status=4 WHERE fg_id = ?";

            // Initialize prepared statement for updating expiration date
            if ($stmt = $conn->prepare($query)) {
                // Bind parameters
                $stmt->bind_param('si', $next_year_dec31, $fg_id);

                // Execute the update query
                if ($stmt->execute()) {


                    // Prepare the delete query to remove from sent_notifications
                    $delete_query = "DELETE FROM sent_notifications WHERE row_id = ? AND row_type = ?";
                    if ($delete_stmt = $conn->prepare($delete_query)) {
                        // Bind parameters for the delete query
                        $delete_stmt->bind_param('is', $fg_id, $row_type);

                        // Execute the delete query
                        if ($delete_stmt->execute()) {
                            $_SESSION['message'] = "Fisherfolk expiration date has been updated to next year, December 31.";
                            $_SESSION['message_type'] = "success";


                            $message = "CAGRO PLMS\nYour permit for Fishing Gear has been renewed..\nThank you.";
                            $response = $smsNotifier->sendSMS($contact, $message);
                            $smsNotifier->recordRenewalNotification($fg_id, $row_type);
                        } else {
                            $_SESSION['message'] .= " Error deleting notification record: " . $delete_stmt->error;
                            $_SESSION['message_type'] = "error";
                        }

                        // Close the delete statement
                        $delete_stmt->close();
                    } else {
                        $_SESSION['message'] .= " Error preparing delete statement: " . $conn->error;
                        $_SESSION['message_type'] = "error";
                    }
                } else {
                    $_SESSION['message'] = "Error updating expiration date: " . $stmt->error;
                    $_SESSION['message_type'] = "error";
                }

                // Close the update statement
                $stmt->close();
            } else {
                $_SESSION['message'] = "Error preparing the SQL statement: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }

            // Close the database connection
            $conn->close();
            header("Location: ../index.php?page=fishinggears");
            exit();
        }
    }


    if (isset($_POST['form_type']) && $_POST['form_type'] == 'fishcage') {

        $row_type = $_POST['form_type'];
        $fc_id = intval($_POST['id']); // Ensure the ID is an integer
        $fc_fname = $_POST['fc_fname'];
        $fc_mname = $_POST['fc_mname'];
        $fc_lname = $_POST['fc_lname'];
        $fc_appell = $_POST['fc_appell'];
        $fc_postal = $_POST['fc_postal']; // Integer field
        $fc_prov = $_POST['fc_prov'];
        $fc_municipal = $_POST['fc_municipal'];
        $fc_brgy = $_POST['fc_brgy'];
        $fc_street = $_POST['fc_street'];
        $fc_contact = $_POST['fc_contact'];
        $fc_invcategory = $_POST['fc_invcategory'];
        $fc_cagetype = $_POST['fc_cagetype'];
        $fc_culturedspicies = $_POST['fc_culturedspicies'];
        $fc_dimension_size = $_POST['fc_dimension_size'];
        $fc_intendedfor = $_POST['fc_intendedfor'];
        $fc_businessname = $_POST['fc_businessname'];
        $fc_businessadd = $_POST['fc_businessadd'];
        $fc_businessreg = $_POST['fc_businessreg'];
        $fc_capitalinv = $_POST['fc_capitalinv']; // Decimal field
        $fc_source = $_POST['fc_source'];
        $u_email = $_POST['u_email'];
        $approval_type = $_POST['approval_type'];

        if ($_POST['action'] == 'update') {
            // SQL Update Query
            $sql_update = "UPDATE fishcage 
        SET fc_fname = ?, fc_mname = ?, fc_lname = ?, fc_contact = ?, fc_appell = ?,
            fc_postal = ?, fc_prov = ?, fc_municipal = ?, fc_brgy = ?, 
            fc_street = ?, fc_invcategory = ?, fc_cagetype = ?, fc_culturedspicies = ?, 
            fc_dimension_size = ?, fc_intendedfor = ?, fc_businessname = ?, 
            fc_businessadd = ?, fc_businessreg = ?, fc_capitalinv = ?, fc_source = ?, 
            u_email = ?, approval_type = ? 
        WHERE id = ?";

            // Prepare statement
            $stmt_update = $conn->prepare($sql_update);

            if (!$stmt_update) {
                die("Prepare failed: " . $conn->error);
            }

            // Bind the parameters (21 parameters + 1 for the id)
            $stmt_update->bind_param(
                "ssssssssssssssssssdsssi", // Type definition string with 21 parameters
                $fc_fname,
                $fc_mname,
                $fc_lname,
                $fc_contact,
                $fc_appell,
                $fc_postal,
                $fc_prov,
                $fc_municipal,
                $fc_brgy,
                $fc_street,
                $fc_invcategory,
                $fc_cagetype,
                $fc_culturedspicies,
                $fc_dimension_size,
                $fc_intendedfor,
                $fc_businessname,
                $fc_businessadd,
                $fc_businessreg,
                $fc_capitalinv,
                $fc_source,
                $u_email,
                $approval_type,
                $fc_id
            );


            // Execute the query
            if ($stmt_update->execute()) {
                // Success message
                $_SESSION['message'] = "Fish Cage Details Updated Successfully.";
                $_SESSION['message_type'] = "success";
            } else {
                // Error message
                $_SESSION['message'] = "Error updating data: " . $stmt_update->error;
                $_SESSION['message_type'] = "error";
            }

            // Redirect to the fishing cages page
            header("Location: ../index.php?page=fishingcages");
            exit();
        } elseif ($_POST['action'] == 'send_for_approval') {
            $sql_insert = "INSERT INTO section_head (client_fname, client_mname, client_lname, client_prov, client_municipal, client_street, client_brgy, client_OR, approval_type, u_email,row_id,row_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";
            $sql_insert2 = "UPDATE fishcage SET u_status = ? WHERE id = ?";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("ssssssssssis", $fc_fname, $fc_mname, $fc_lname, $fc_prov, $fc_municipal, $fc_street, $fc_brgy, $fc_OR, $approval_type, $u_email, $fc_id, $row_type);

            if ($stmt_insert->execute()) {
                $stmt_insert2 = $conn->prepare($sql_insert2);
                $new_status = 3;
                $stmt_insert2->bind_param("ii", $new_status, $fc_id);

                if ($stmt_insert2->execute()) {
                    $_SESSION['message'] = "Approval Request Sent.";
                    $_SESSION['message_type'] = "success";
                } else {
                    $_SESSION['message'] = "Error Updating Status: " . $conn->error;
                    $_SESSION['message_type'] = "error";
                }
            } else {
                $_SESSION['message'] = "Error Sending Approval Request: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }
            header("Location: ../index.php?page=fishingcages");
            exit();
        } elseif ($_POST['action'] == 'renew') {
            $next_year_dec31 = date('Y-m-d', strtotime('last day of December ' . (date('Y') + 1)));
            $query = "UPDATE fishcage SET expiration_date = ?, u_status = 4 WHERE id = ?";

            if ($stmt = $conn->prepare($query)) {
                $stmt->bind_param('si', $next_year_dec31, $fc_id);

                if ($stmt->execute()) {
                    $delete_query = "DELETE FROM sent_notifications WHERE row_id = ? AND row_type = ?";
                    if ($delete_stmt = $conn->prepare($delete_query)) {
                        $delete_stmt->bind_param('is', $fc_id, $row_type);

                        if ($delete_stmt->execute()) {
                            $_SESSION['message'] = "Fish Cage expiration date updated to next year, December 31.";
                            $_SESSION['message_type'] = "success";
                            $message = "CAGRO PLMS\nYour permit for Fish Cage has been renewed..\nThank you.";
                            $response = $smsNotifier->sendSMS($contact, $message);
                            $smsNotifier->recordRenewalNotification($fc_id, $row_type);
                        } else {
                            $_SESSION['message'] .= " Error deleting notification record: " . $delete_stmt->error;
                            $_SESSION['message_type'] = "error";
                        }
                        $delete_stmt->close();
                    } else {
                        $_SESSION['message'] .= " Error preparing delete statement: " . $conn->error;
                        $_SESSION['message_type'] = "error";
                    }
                } else {
                    $_SESSION['message'] = "Error updating expiration date: " . $stmt->error;
                    $_SESSION['message_type'] = "error";
                }
                $stmt->close();
            } else {
                $_SESSION['message'] = "Error preparing the SQL statement: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }
            $conn->close();
            header("Location: ../index.php?page=fishingcages");
            exit();
        }
    }



    if (isset($_POST['form_type']) && $_POST['form_type'] == 'fishingboats') {
        // Retrieve form data
        $row_type = $_POST['form_type'];
        $fg_id = intval($_POST['id']);
        $fg_fname = $_POST['fb_opfname'];
        $fg_mname = $_POST['fb_opmname'];
        $contact = $_POST['fb_contact'];
        $fg_lname = $_POST['fb_oplname'];
        $fg_appel = $_POST['fb_opappel'];
        $fg_postal = $_POST['fb_postal'];
        $fg_prov = $_POST['fb_opprov'];
        $fg_municipal = $_POST['fb_opmunicipal'];
        $fg_barangay = $_POST['fb_opbarangay'];
        $fg_street = $_POST['fb_opstreet'];
        $fg_homeport = $_POST['fb_homeport'];
        $fg_vesselname = $_POST['fb_vesselname'];
        $fg_vesseltype = $_POST['fb_vesseltype'];
        $fg_placebuilt = $_POST['fb_placebuilt'];
        $fg_yearbuilt = $_POST['fb_yearbuilt'];
        $fg_materialbuilt = $_POST['fb_materialbuilt'];
        $fg_RL = $_POST['fb_RL'];
        $fg_RB = $_POST['fb_RB'];
        $fg_RD = $_POST['fb_RD'];
        $fg_TL = $_POST['fb_TL'];
        $fg_TB = $_POST['fb_TB'];
        $fg_TD = $_POST['fb_TD'];
        $fg_GT = $_POST['fb_GT'];
        $fg_NT = $_POST['fb_NT'];
        $fg_enginemake = $_POST['fb_enginemake'];
        $fg_serial = $_POST['fb_serial'];
        $fg_horsepower = $_POST['fb_horsepower'];
        $u_email = $_POST['u_email'];

        if ($_POST['action'] == 'update') {
            $sql_update = "UPDATE fishingboats 
                           SET fb_opfname = ?, fb_opmname = ?, fb_oplname = ?, fb_opappel = ?, fb_postal = ?, 
                               fb_opprov = ?, fb_opmunicipal = ?, fb_opbarangay = ?, fb_opstreet = ?, 
                               fb_homeport = ?, fb_vesselname = ?, fb_vesseltype = ?, fb_placebuilt = ?, 
                               fb_yearbuilt = ?, fb_materialbuilt = ?, fb_RL = ?, fb_RB = ?, fb_RD = ?, 
                               fb_TL = ?, fb_TB = ?, fb_TD = ?, fb_GT = ?, fb_NT = ?, fb_enginemake = ?, 
                               fb_serial = ?, fb_horsepower = ? 
                           WHERE id = ?";

            $stmt_update = $conn->prepare($sql_update);

            if (!$stmt_update) {
                die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
            }

            // Ensure you are binding the correct data types
            $stmt_update->bind_param(
                "ssssssssssssssssssssssssssi",
                $fg_fname,
                $fg_mname,
                $fg_lname,
                $fg_appel,
                $fg_postal,
                $fg_prov,
                $fg_municipal,
                $fg_barangay,
                $fg_street,
                $fg_homeport,
                $fg_vesselname,
                $fg_vesseltype,
                $fg_placebuilt,
                $fg_yearbuilt,
                $fg_materialbuilt,
                $fg_RL,
                $fg_RB,
                $fg_RD,
                $fg_TL,
                $fg_TB,
                $fg_TD,
                $fg_GT,
                $fg_NT,
                $fg_enginemake,
                $fg_serial,
                $fg_horsepower,
                $fg_id // last parameter for id
            );

            if ($stmt_update->execute()) {
                $_SESSION['message'] = "Fishing Gears Details Updated Successfully.";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error updating data: " . $stmt_update->error;
                $_SESSION['message_type'] = "error";
            }

            header("Location: ../index.php?page=fishingboats");
            exit();
        } elseif ($_POST['action'] == 'send_for_approval') {
            // SQL insert statement with the specified structure
            // Updated INSERT query without client_OR and approval_type
            $sql_insert = "INSERT INTO section_head (client_fname, client_mname, client_lname, client_prov, client_municipal, client_street, client_brgy, u_email,row_id,row_type) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ? ,?, ?)";

            // Prepare the statement
            $stmt_insert = $conn->prepare($sql_insert);

            // Bind parameters (adjusted to match the new query)
            $stmt_insert->bind_param(
                "ssssssssis",
                $fg_fname,      // First name
                $fg_mname,      // Middle name
                $fg_lname,      // Last name
                $fg_prov,       // Province
                $fg_municipal,  // Municipal
                $fg_street,     // Street
                $fg_barangay,   // Barangay
                $u_email,
                $fg_id,
                $row_type    // User email
            );

            // Execute the query
            if ($stmt_insert->execute()) {
                // Update the status in the fishworkerlicense table
                $sql_insert2 = "UPDATE fishingboats SET u_status = ? WHERE id = ?";
                $stmt_insert2 = $conn->prepare($sql_insert2);
                $new_status = 3; // Assuming 3 is the status for "approval pending"
                $stmt_insert2->bind_param("ii", $new_status, $fg_id);

                if ($stmt_insert2->execute()) {
                    $_SESSION['message'] = "Approval Request Sent.";
                    $_SESSION['message_type'] = "success";
                } else {
                    $_SESSION['message'] = "Error Updating Status: " . $conn->error;
                    $_SESSION['message_type'] = "error";
                }
            } else {
                $_SESSION['message'] = "Error Sending Approval Request: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }

            // Redirect back to fishing boats page
            header("Location: ../index.php?page=fishingboats");
            exit();
        } elseif ($_POST['action'] == 'issue_requirements') {
            // SQL status update for issuing requirements
            $sql_status_update = "UPDATE fishingboats SET u_status = 2 WHERE fg_id = ?";
            $stmt_status_update = $conn->prepare($sql_status_update);
            $stmt_status_update->bind_param("i", $fg_id);

            // Execute update status
            if ($stmt_status_update->execute()) {
                $_SESSION['message'] = "Requirements Issued Successfully.";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error issuing requirements: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }
            header("Location: ../index.php?page=fishingboats");
            exit();
        } elseif ($_POST['action'] == 'renew') {
            $next_year_dec31 = date('Y-m-d', strtotime('last day of December ' . (date('Y') + 1)));
            $query = "UPDATE fishingboats SET expiration_date = ?, u_status = 4 WHERE id = ?";

            if ($stmt = $conn->prepare($query)) {
                $stmt->bind_param('si', $next_year_dec31, $fg_id);

                if ($stmt->execute()) {
                    $delete_query = "DELETE FROM sent_notifications WHERE row_id = ? AND row_type = ?";
                    if ($delete_stmt = $conn->prepare($delete_query)) {
                        $delete_stmt->bind_param('is', $fg_id, $row_type);

                        if ($delete_stmt->execute()) {
                            $_SESSION['message'] = "Fishing Boat expiration date updated to next year, December 31.";
                            $_SESSION['message_type'] = "success";
                            $message = "CAGRO PLMS\nYour permit for Fishing Boat has been renewed..\nThank you.";
                            $response = $smsNotifier->sendSMS($contact, $message);
                            $smsNotifier->recordRenewalNotification($fg_id, $row_type);
                        } else {
                            $_SESSION['message'] .= " Error deleting notification record: " . $delete_stmt->error;
                            $_SESSION['message_type'] = "error";
                        }
                        $delete_stmt->close();
                    } else {
                        $_SESSION['message'] .= " Error preparing delete statement: " . $conn->error;
                        $_SESSION['message_type'] = "error";
                    }
                } else {
                    $_SESSION['message'] = "Error updating expiration date: " . $stmt->error;
                    $_SESSION['message_type'] = "error";
                }
                $stmt->close();
            } else {
                $_SESSION['message'] = "Error preparing thefishingboats SQL statement: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }
            $conn->close();
            header("Location: ../index.php?page=fishingboats");
            exit();
        }
    }









    if (isset($_POST['form_type']) && $_POST['form_type'] == 'licensing') {
        $row_type = $_POST['form_type'];
        $lic_id = intval($_POST['id']);
        $lic_fname = $_POST['fname'];
        $lic_mname = $_POST['mname'];
        $lic_lname = $_POST['lname'];
        $lic_email = $_POST['uemail'];
        $lic_prov = $_POST['province'];
        $lic_municipal = $_POST['municipal'];
        $lic_brgy = $_POST['barangay'];
        $lic_street = $_POST['street'];
        $lic_OR = $_POST['OR'];
        $approval_type = $_POST['approval_type'];


        if ($_POST['action'] == 'update') {
            // Updated the query to include approval_type
            $sql_update = "UPDATE licensing 
                           SET client_fname = ?, client_mname = ?, client_lname = ?, 
                               u_email = ?, client_prov = ?, client_municipal = ?, 
                               client_brgy = ?, client_street = ?, client_OR = ?, 
                               approval_type = ?
                           WHERE client_id = ?";

            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param(
                "sssssssssss",
                $lic_fname,
                $lic_mname,
                $lic_lname,
                $lic_email,
                $lic_prov,
                $lic_municipal,
                $lic_brgy,
                $lic_street,
                $lic_OR,
                $approval_type,
                $lic_id
            );

            if ($stmt_update->execute()) {
                $_SESSION['message'] = "Licensing Details Updated Successfully.";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error updating data: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }
            header("Location: ../index.php?page=licensing");
            exit();
        } elseif ($_POST['action'] == 'renew') {
            $next3years = date('Y-m-d', strtotime('+3 years'));

            $query = "UPDATE licensing 
                      SET expiration_date = ?, license_status = 1
                      WHERE client_id = ?";

            if ($stmt = $conn->prepare($query)) {
                $stmt->bind_param('si', $next3years, $lic_id);

                if ($stmt->execute()) {
                    $delete_query = "DELETE FROM sent_notifications WHERE row_id = ? AND row_type = ?";
                    if ($delete_stmt = $conn->prepare($delete_query)) {
                        $delete_stmt->bind_param('is', $lic_id, $row_type);

                        if ($delete_stmt->execute()) {
                            $_SESSION['message'] = "Licensing expiration date updated to next 3 years";
                            $_SESSION['message_type'] = "success";
                        } else {
                            $_SESSION['message'] .= " Error deleting notification record: " . $delete_stmt->error;
                            $_SESSION['message_type'] = "error";
                        }
                        $delete_stmt->close();
                    } else {
                        $_SESSION['message'] .= " Error preparing delete statement: " . $conn->error;
                        $_SESSION['message_type'] = "error";
                    }
                } else {
                    $_SESSION['message'] = "Error updating expiration date: " . $stmt->error;
                    $_SESSION['message_type'] = "error";
                }
                $stmt->close();
            } else {
                $_SESSION['message'] = "Error preparing the SQL statement: " . $conn->error;
                $_SESSION['message_type'] = "error";
            }
            $conn->close();
            header("Location: ../index.php?page=licensing");
            // echo $_SESSION['message'];

            exit();
        }
    }
}
?>