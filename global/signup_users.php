<?php
session_start(); // Start the session to store messages

if (isset($_POST['submit'])) {
    include("../conn.php");
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // Sanitize and validate input
    $fname = trim(htmlspecialchars($_POST['fname']));
    $lname = trim(htmlspecialchars($_POST['lname']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $contact = trim(htmlspecialchars($_POST['contact']));
    $pass = $_POST['pass'];
    $roles = $_POST['roles'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
        header("Location: ../signup.php");
        exit;
    }

    if (empty($pass)) {
        $_SESSION['error'] = "Password cannot be empty.";
        header("Location: ../signup.php");
        exit;
    }

    $pass_hashed = password_hash($pass, PASSWORD_BCRYPT);
    $valid_roles = ['CAGRO - Administrator', 'Section Head', 'Client'];

    if (!in_array($roles, $valid_roles)) {
        $_SESSION['error'] = "Invalid role selected.";
        header("Location: ../signup.php");
        exit;
    }

    // Check if email already exists
    $email_check_sql = $conn->prepare("SELECT u_email FROM users WHERE u_email = ?");
    $email_check_sql->bind_param("s", $email);
    $email_check_sql->execute();
    $email_check_sql->store_result();

    if ($email_check_sql->num_rows > 0) {
        $_SESSION['error'] = "This email is already registered. Please use a different email.";
        $email_check_sql->close();
        header("Location: ../signup.php");
        exit;
    }
    $email_check_sql->close();

    // Insert the new user
    $sql = $conn->prepare("INSERT INTO users (u_fname, u_lname, u_pass, u_email, u_contact, u_role) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$sql) {
        $_SESSION['error'] = "Error preparing statement: " . $conn->error;
        header("Location: ../signup.php");
        exit;
    }

    $sql->bind_param("ssssss", $fname, $lname, $pass_hashed, $email, $contact, $roles);

    if ($sql->execute()) {
        $_SESSION['success'] = "Registration successful!";
        header("Location: ../login.php");
        exit;
    } else {
        $_SESSION['error'] = "Error: " . $sql->error;
        header("Location: ../signup.php");
    }

    $sql->close();
    $conn->close();
}
?>

?>
