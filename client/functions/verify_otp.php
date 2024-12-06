<?php
// Include the database connection
include("../../conn.php");
include("../../class/OTPNotifier.php");

if (isset($_POST['contactNumber']) && isset($_POST['enteredOTP'])) {
    $contactNumber = $_POST['contactNumber'];
    $enteredOTP = $_POST['enteredOTP'];
    $id = $_POST['id'];

    // Create an instance of OTPNotifier class
    $otpNotifier = new OTPNotifier($conn);

    try {
        // Verify OTP
        $response = $otpNotifier->verifyOTP($contactNumber, $enteredOTP,$id);
        echo json_encode($response);

    
    } catch (Exception $e) {
        // Return error response
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>
