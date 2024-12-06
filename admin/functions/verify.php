<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include your database connection
    include("../../conn.php");

    // Get the user ID from the AJAX request
    $userId = $_POST['user_id'];

    // Update the 'verified' column to 1
    $query = "UPDATE users SET verified = 1 WHERE u_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $conn->close();
}
?>
