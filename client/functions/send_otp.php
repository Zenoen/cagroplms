<?php
include("../../class/OTPNotifier.php");
include("../../conn.php");



if (isset($_POST['contactNumber'])) {
    $contactNumber = $_POST['contactNumber'];
    $id = $_POST['id'];

    // Create an instance of OTPNotifier class
    $otpNotifier = new OTPNotifier($conn);

    try {
        // Send OTP
        $response = $otpNotifier->sendOTP($contactNumber,$id);
        echo json_encode($response);
    } catch (Exception $e) {
        // Return error response
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>
