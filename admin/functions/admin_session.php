<?php
session_start();

//user type verifier
if (isset($_SESSION["user"])) {
    if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'CAGRO - Administrator') {
        header("location: ../login.php");
    }
} else {
    header("location: ../login.php");
}

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








//Select Query for fisherfolk data
$sqlgg = "SELECT *
          FROM fisherfolks  ORDER BY ff_id DESC";
$result_fisherfolks = $conn->query($sqlgg);

//Select Query for fishworker data
$sql = "SELECT
        fishworkerlicense.fw_id, fishworkerlicense.u_email,
        fishworkerlicense.fw_gender, fishworkerlicense.fw_fname, fishworkerlicense.fw_mname, fishworkerlicense.fw_lname,
        fishworkerlicense.fw_street, fishworkerlicense.fw_barangay, fishworkerlicense.fw_municipal, fishworkerlicense.fw_province,
        fishworkerlicense.fw_postal, fishworkerlicense.fw_contact, fishworkerlicense.u_status, fishworkerlicense.approval_type,decline_reason,
        CONCAT(fishworkerlicense.fw_fname, ' ', fishworkerlicense.fw_mname, ' ', fishworkerlicense.fw_lname) AS name,
        fishworkerlicense.fw_dob,
        CONCAT(fishworkerlicense.fw_street, ', ', fishworkerlicense.fw_barangay, ', ', fishworkerlicense.fw_municipal, ', ', fishworkerlicense.fw_province) AS address,
        fishworkerlicense.fw_OR,
        CONCAT(locatorinvestor.loc_fname, ',', locatorinvestor.loc_mname, ',', locatorinvestor.loc_lname) AS locator
    FROM
        fishworkerlicense
    LEFT JOIN
        locatorinvestor ON fishworkerlicense.fw_id = locatorinvestor.fw_id  ORDER BY fw_id DESC";
$result_fishworker = $conn->query($sql);

//Select query for fishing gears data
$sql = "SELECT * FROM fishinggears ORDER BY fg_id DESC";
$result_fishinggear = $conn->query($sql);

//Select query for fish cage data
$sql4 = "SELECT * FROM fishcage ORDER BY id DESC";
$result_fishcage = $conn->query($sql4);

//Select query for fishing boats
$sql1 = "SELECT * FROM fishingboats ORDER BY id DESC" ;
$result_fishingboats = $conn->query($sql1);

//Select query for Clients
$sql2 = "SELECT u_id, u_fname, u_lname, u_email, verified FROM users where u_role = 'Client' ORDER BY u_id DESC";
$result_clients = $conn->query($sql2);

//Select query for Licensing
$sqlgg = "SELECT client_id, client_gender,client_fname, client_mname, client_lname, client_dob,client_prov, client_municipal, client_street, client_brgy, client_OR, approval_type,expiration_date,issuance_date,license_status,u_email FROM licensing ORDER BY client_id DESC";
$result_licensing = $conn->query($sqlgg);

$sqlgg = "SELECT * FROM notifications WHERE not_for='admin' ORDER BY not_id DESC";
$result_notifications = $conn->query($sqlgg);












//dashboard section
$currentDateTime = date('m-d-Y H:i:s A');

// SQL query for yearly registrations
$query = "
SELECT 
    YEAR(issuance_date) AS year,
    COUNT(*) AS total_registrations
FROM (
    SELECT issuance_date FROM fishingboats WHERE issuance_date IS NOT NULL
    UNION ALL
    SELECT issuance_date FROM fisherfolks WHERE issuance_date IS NOT NULL
    UNION ALL
    SELECT issuance_date FROM fishworkerlicense WHERE issuance_date IS NOT NULL
    UNION ALL
    SELECT issuance_date FROM fishcage WHERE issuance_date IS NOT NULL
    UNION ALL
    SELECT issuance_date FROM fishinggears WHERE issuance_date IS NOT NULL
) AS combined
GROUP BY YEAR(issuance_date);
";

// Prepare and execute the query
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();  // Get the result of the query

// Initialize arrays to store years and counts
$years = [];
$counts = [];

// Fetch data from the result
while ($row = $result->fetch_assoc()) {
    $years[] = $row['year'];  // Add the year to the $years array
    $counts[] = $row['total_registrations'];  // Add the count to the $counts array
}

// Encode the data as JSON for use in JavaScript
$yearsJson = json_encode($years);
$countsJson = json_encode($counts);




    
//clients
$query = "SELECT COUNT(*) as row_count FROM users WHERE u_role= 'Client'";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$clientCount = 0;
if ($result->num_rows > 0) {
    $clientCount = $result->fetch_assoc()['row_count'];
}

//pending
$query = "SELECT table_name 
          FROM information_schema.columns 
          WHERE column_name = 'u_status' 
            AND table_schema = 'u938234010_cagroplms'";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$penCount = 0;

while ($row = $result->fetch_assoc()) {
    $tableName = $row['table_name'];

    // Check for u_status = 1 in the current table
    $subQuery = "SELECT COUNT(*) as count FROM $tableName WHERE u_status IN (1, 2, 3)";
    $subStmt = $conn->prepare($subQuery);
    $subStmt->execute();
    $subResult = $subStmt->get_result();

    $penCount += $subResult->fetch_assoc()['count'];
}

//registered
$query = "SELECT table_name 
          FROM information_schema.columns 
          WHERE column_name = 'u_status' 
            AND table_schema = 'u938234010_cagroplms'";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$regCount = 0;

while ($row = $result->fetch_assoc()) {
    $tableName = $row['table_name'];

    // Check for u_status = 1 in the current table
    $subQuery = "SELECT COUNT(*) as count FROM $tableName WHERE u_status = 4";
    $subStmt = $conn->prepare($subQuery);
    $subStmt->execute();
    $subResult = $subStmt->get_result();

    $regCount += $subResult->fetch_assoc()['count'];
}

//declined
$query = "SELECT table_name 
          FROM information_schema.columns 
          WHERE column_name = 'u_status' 
            AND table_schema = 'u938234010_cagroplms'";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$decCount = 0;

while ($row = $result->fetch_assoc()) {
    $tableName = $row['table_name'];

    // Check for u_status = 1 in the current table
    $subQuery = "SELECT COUNT(*) as count FROM $tableName WHERE u_status = 6";
    $subStmt = $conn->prepare($subQuery);
    $subStmt->execute();
    $subResult = $subStmt->get_result();

    $decCount += $subResult->fetch_assoc()['count'];
}

//expired
$query = "SELECT table_name 
          FROM information_schema.columns 
          WHERE column_name = 'u_status' 
            AND table_schema = 'u938234010_cagroplms'";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$expCount = 0;

while ($row = $result->fetch_assoc()) {
    $tableName = $row['table_name'];

    // Check for u_status = 1 in the current table
    $subQuery = "SELECT COUNT(*) as count FROM $tableName WHERE u_status = 5";
    $subStmt = $conn->prepare($subQuery);
    $subStmt->execute();
    $subResult = $subStmt->get_result();

    $expCount += $subResult->fetch_assoc()['count'];
}




//fishworker
$query = "SELECT COUNT(*) as row_count FROM fishworkerlicense";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$fishworkerCount = 0;
if ($result->num_rows > 0) {
    $fishworkerCount = $result->fetch_assoc()['row_count'];
}

$query = "SELECT COUNT(*) as row_count FROM fishingboats WHERE fb_vesseltype = 'motorized'";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$motorizedBoatCount = 0;
if ($result->num_rows > 0) {
    $motorizedBoatCount = $result->fetch_assoc()['row_count'];
}

$query = "SELECT COUNT(*) as row_count FROM fishingboats WHERE fb_vesseltype = 'non-motorized'";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$notmotorizedBoatCount = 0;
if ($result->num_rows > 0) {
    $notmotorizedBoatCount = $result->fetch_assoc()['row_count'];
}

// Fisherfolks
$query = "SELECT COUNT(*) as row_count FROM fisherfolks";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$fisherfolksCount = 0;
if ($result->num_rows > 0) {
    $fisherfolksCount = $result->fetch_assoc()['row_count'];
}

// Fishcage
$query = "SELECT COUNT(*) as row_count FROM fishcage";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$fishcageCount = 0;
if ($result->num_rows > 0) {
    $fishcageCount = $result->fetch_assoc()['row_count'];
}

// Fishingbpats
$query = "SELECT COUNT(*) as row_count FROM fishingboats";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$fishingbpatsCount = 0;
if ($result->num_rows > 0) {
    $fishingbpatsCount = $result->fetch_assoc()['row_count'];
}

// Fishinggears
$query = "SELECT COUNT(*) as row_count FROM fishinggears";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$fishinggearsCount = 0;
if ($result->num_rows > 0) {
    $fishinggearsCount = $result->fetch_assoc()['row_count'];
}








// PENDING

//fishworker
$query = "SELECT COUNT(*) as row_count FROM fishworkerlicense WHERE u_status=1";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$fishpendingworkerCount = 0;
if ($result->num_rows > 0) {
    $fishpendingworkerCount = $result->fetch_assoc()['row_count'];
}
// Fisherfolks
$query = "SELECT COUNT(*) as row_count FROM fisherfolks WHERE u_status=1";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$fisherpendingfolksCount = 0;
if ($result->num_rows > 0) {
    $fisherpendingfolksCount = $result->fetch_assoc()['row_count'];
}

// Fishcage
$query = "SELECT COUNT(*) as row_count FROM fishcage WHERE u_status=1";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$fishpendingcageCount = 0;
if ($result->num_rows > 0) {
    $fishpendingcageCount = $result->fetch_assoc()['row_count'];
}

// Fishingbpats
$query = "SELECT COUNT(*) as row_count FROM fishingboats WHERE u_status=1";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$fishingbpatsCount = 0;
if ($result->num_rows > 0) {
    $fishingbpatsCount = $result->fetch_assoc()['row_count'];
}

// Fishinggears
$query = "SELECT COUNT(*) as row_count FROM fishinggears WHERE u_status=1";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$fishingpendinggearsCount = 0;
if ($result->num_rows > 0) {
    $fishingpendinggearsCount = $result->fetch_assoc()['row_count'];
}






// Close connection
$conn->close();
?>