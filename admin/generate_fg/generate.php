<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // Make sure TCPDF is loaded
include("../../conn.php"); // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from POST
    $user_id = $_POST['id'];
    $restrictions = isset($_POST['restrictions']) ? $_POST['restrictions'] : [];

    // Fetch user data from the database
    $query = "SELECT *
              FROM fishinggears WHERE fg_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // // Update license_status and issuance_date
    // $update_query = "UPDATE licensing SET license_status = 1, issuance_date = NOW(), expiration_date = DATE_ADD(NOW(), INTERVAL 3 YEAR)  WHERE client_id = ?";
    // $update_stmt = $conn->prepare($update_query);
    // $update_stmt->bind_param("s", $user_id);
    // $update_stmt->execute();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit;
    }
    $htmlTemplate = "";
    // Load the template file
   
  
        $htmlTemplate = file_get_contents('fg.php');

    // Populate the template with user data
    function getOrdinalSuffix($number)
    {
        if (!in_array(($number % 100), [11, 12, 13])) {
            switch ($number % 10) {
                case 1:
                    return 'st';
                case 2:
                    return 'nd';
                case 3:
                    return 'rd';
            }
        }
        return 'th';
    }

    // Format the date
    $day = date('j'); // Day without leading zeros
    $ordinal = getOrdinalSuffix($day); // Get ordinal suffix
    $formattedDate = $day . $ordinal . ' day of ' . date('F, Y');
    // Get the current year
    $currentYear = date('Y');

    // Format the date as "DECEMBER 31, YYYY"
    $formattedDateExpiry = strtoupper("DECEMBER 31, $currentYear");

    // Replace the placeholder in the template
    $htmlTemplate = str_replace('{{EXPIRY}}', $formattedDateExpiry, $htmlTemplate);
    // Replace placeholder
    $htmlTemplate = str_replace('{{CURRENT_DATE}}', $formattedDate, $htmlTemplate);
    $htmlTemplate = str_replace('{{DATE_ISSUED}}', strtoupper($userData['issuance_date']), $htmlTemplate);
    $htmlTemplate = str_replace('{{DATE_EXPIRY}}', strtoupper($userData['expiration_date']), $htmlTemplate);
    // $htmlTemplate = str_replace('{{OR}}', strtoupper($userData['client_OR']), $htmlTemplate)??'';
    $htmlTemplate = str_replace('{{FIRST_NAME}}', strtoupper($userData['fg_locfname']), $htmlTemplate);
    $htmlTemplate = str_replace('{{MIDDLE_NAME}}', strtoupper($userData['fg_locmname']), $htmlTemplate);
    $htmlTemplate = str_replace('{{LAST_NAME}}', strtoupper($userData['fg_loclname']), $htmlTemplate);




    $htmlTemplate = str_replace('{{WING}}', strtoupper($userData['fg_wing']), $htmlTemplate);
    $htmlTemplate = str_replace('{{CENTERLNE}}', strtoupper($userData['fg_centerline']), $htmlTemplate);
    $htmlTemplate = str_replace('{{OTHER}}', strtoupper($userData['fg_otherspec']), $htmlTemplate);

    // $htmlTemplate = str_replace('{{DOB}}', strtoupper($userData['client_dob']), $htmlTemplate);
    $htmlTemplate = str_replace('{{ADDRESS}}', strtoupper($userData['fg_locstreet'] . ', ' . $userData['fg_locbarangay'] . ', ' . $userData['fg_locmunicipal'] . ', ' . $userData['fg_locprov']), $htmlTemplate);

    // Process restrictions and add to the template
    $restrictionText = '';
    if (!empty($restrictions)) {
        foreach ($restrictions as $restriction) {
            $restrictionText .= $restriction . ', ';
        }
        $restrictionText = rtrim($restrictionText, ', '); // Remove trailing comma
    }
    $htmlTemplate = str_replace('{{RESTRICTIONS}}', $restrictionText, $htmlTemplate);

    // Initialize TCPDF with portrait orientation
    $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('CAGRO');
    $pdf->SetTitle('Fishworker Data');
    $pdf->SetSubject('Fishworker Data Report');
    $pdf->SetKeywords('TCPDF, PDF, fishworker, report');

    // Remove default header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    // Set margins
    $pdf->SetMargins(10, 10, 10);  // Left, Top, Right margins
    $pdf->SetAutoPageBreak(TRUE, 10);  // Bottom margin

    // Add a page
    $pdf->AddPage();

    // Dynamically scale content to fit the page
    $pageWidth = $pdf->getPageWidth() - $pdf->getMargins()['left'] - $pdf->getMargins()['right'];
    $pageHeight = $pdf->getPageHeight() - $pdf->getMargins()['top'] - $pdf->getMargins()['bottom'];
    $contentWidth = $pdf->GetStringWidth(strip_tags($htmlTemplate));

    if ($contentWidth > $pageWidth) {
        // Reduce font size to fit content within the page width
        $pdf->SetFont('helvetica', '', 10); // Adjust font size
    } else {
        $pdf->SetFont('helvetica', '', 12); // Default font size
    }

    // Write the processed HTML to the PDF
    $pdf->writeHTML($htmlTemplate, true, false, true, false, '');

    // Output the PDF to the browser
    $pdf->Output('gear_' . $user_id . '.pdf', 'D');
}
