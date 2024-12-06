<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../../index.php");
    exit();
}

// Check user type
$userType = $_SESSION['usertype'];
if ($userType != 'Client') {
    header("Location: ../../index.php");
    exit();
}

$userEmail = $_SESSION["user"];
$query = "";

// Fetch client details
if ($userType == 'Client') {
    $query = "SELECT u_id as userID, u_fname as fname, u_lname as lname, u_email as email, u_prof as uprof,u_contact as contact, verified
              FROM users WHERE u_email = ?";
}

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
    $is_verified = $userData['verified']; // Store is_verified status

} else {
    echo "No user data found.";
    exit();
}

// Activity log query
$query = "SELECT *, DATE_FORMAT(timestamp, '%M %d, %Y %h:%i %p') as formatted_datetime 
          FROM activity_logs 
          WHERE user_email = ? 
          ORDER BY timestamp DESC";
if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    $activityLogsResult = $stmt->get_result();
}



//Select Query for fisherfolk data
$sqlgg = "SELECT * 
          FROM fisherfolks WHERE u_email = ?";
// Prepare the statement
$result_fisherfolks = $conn->prepare($sqlgg);

// Bind the parameter
$result_fisherfolks->bind_param("s", $userEmail); // Assuming $email is the variable holding the user's email

// Execute the statement
$result_fisherfolks->execute();
// Get the result
$result_fisherfolks = $result_fisherfolks->get_result();



//Select Query for fisherfolk data
$sqlgg = "SELECT *
          FROM fishinggears WHERE u_email = ?";
// Prepare the statement
$result_fishinggears = $conn->prepare($sqlgg);

// Bind the parameter
$result_fishinggears->bind_param("s", $userEmail); // Assuming $email is the variable holding the user's email

// Execute the statement
$result_fishinggears->execute();
// Get the result
$result_fishinggears = $result_fishinggears->get_result();



//Select Query for fisherfolk data
$sqlgg = "SELECT * 
          FROM fishworkerlicense WHERE u_email = ?";
// Prepare the statement
$result_fisherworkers = $conn->prepare($sqlgg);

// Bind the parameter
$result_fisherworkers->bind_param("s", $userEmail); // Assuming $email is the variable holding the user's email

// Execute the statement
$result_fisherworkers->execute();
// Get the result
$result_fisherworkers = $result_fisherworkers->get_result();


//Select Query for fisherfolk data
$sqlgg = "SELECT * 
          FROM fishingboats WHERE u_email = ?";
// Prepare the statement
$result_fishingboats = $conn->prepare($sqlgg);

// Bind the parameter
$result_fishingboats->bind_param("s", $userEmail); // Assuming $email is the variable holding the user's email

// Execute the statement
$result_fishingboats->execute();
// Get the result
$result_fishingboats = $result_fishingboats->get_result();



//Select Query for fishcage data
$sqlgg = "SELECT * 
          FROM fishcage WHERE u_email = ?";
// Prepare the statement
$result_fishcage = $conn->prepare($sqlgg);

// Bind the parameter
$result_fishcage->bind_param("s", $userEmail); // Assuming $email is the variable holding the user's email

// Execute the statement
$result_fishcage->execute();
// Get the result
$result_fishcage = $result_fishcage->get_result();



//Select Query for fisherfolk data
$lstatus = "SELECT expiration_date,issuance_date,license_status
          FROM licensing WHERE u_email = ?";
// Prepare the statement
$result_lstatus = $conn->prepare($lstatus);

// Bind the parameter
$result_lstatus->bind_param("s", $userEmail); // Assuming $email is the variable holding the user's email

// Execute the statement
$result_lstatus->execute();
// Get the result
$result_lstatus = $result_lstatus->get_result();


// // Close connection
// $stmt->close();
// $conn->close();
?>