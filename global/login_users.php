<?php
session_start();
include("../conn.php");

if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Initialize variables
    $loggedIn = false;
    $error_message = '';

    // List of tables and roles
    $tables = [
        'users' => ['CAGRO - Administrator', 'Section Head', 'Client'],
    ];

    foreach ($tables as $table => $roles) {
        // Prepare and execute a statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM $table WHERE u_email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $user_role = $user['u_role'];

            if (in_array($user_role, $roles)) {
                // Verify password
                
                    // $checker = $conn->query("SELECT * FROM $table WHERE u_email='$email' AND u_pass='$password'");
                    // if ($checker && $checker->num_rows == 1) {
             if (password_verify($password, $user['u_pass'])) { // Replace with password_verify if passwords are hashed
                    $_SESSION['user'] = $email;
                    $_SESSION['usertype'] = $user_role;

                    // Redirect based on user role
                    switch ($user_role) {
                        case 'CAGRO - Administrator':
                            header('Location: ../admin/index.php?page=dashboard');
                            exit;
                        case 'Section Head':
                            header('Location: ../sectionhead/index.php?page=home');
                            exit;
                        case 'Client':
                            header('Location: ../client/index.php?page=profile');
                            exit;
                        default:
                            $error_message = 'Invalid user role';
                    }
                    $loggedIn = true;
                    break;
                } else {
                    $error_message = 'Invalid email or password'; // Incorrect password
                }
            }
        } else {
            $error_message = 'No account found for this email';
        }
        $stmt->close();
    }

    // Set the error message in the session and redirect to login page
    if (!$loggedIn) {
        $_SESSION['error_message'] = $error_message;
        header("Location: ../login.php");
        exit;
    }
}
?>
