<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // Make sure TCPDF is loaded
include("../../conn.php"); // Include your database connection

if (isset($_POST['id'])) {
    $fc_id = $_POST['id'];

    // Fetch fishing gear data from the database based on fc_id
    $query = "SELECT * FROM fishcage WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $fc_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();


        $htmlTemplate = file_get_contents('template_fc.php');


        // Replace placeholders in the template with actual data
        $htmlTemplate = str_replace('{{FIRST_NAME}}', strtoupper(htmlspecialchars($data['fc_fname'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{LAST_NAME}}', strtoupper(htmlspecialchars($data['fc_lname'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{MIDDLE_NAME}}', strtoupper(htmlspecialchars($data['fc_mname'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{APPELL}}', strtoupper(htmlspecialchars($data['fc_appell'])), $htmlTemplate);

        $htmlTemplate = str_replace('{{ADDRESS}}', strtoupper(htmlspecialchars($data['fc_street'] . ', ' . $data['fc_brgy'] . ', ' . $data['fc_municipal'] . ', ' . $data['fc_prov'])), $htmlTemplate);
       
        $htmlTemplate = str_replace('{{BARANGAY}}', strtoupper(htmlspecialchars($data['fc_brgy'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{DATE_ISSUED}}', strtoupper(htmlspecialchars($data['issuance_date'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{SPECIES}}', strtoupper(htmlspecialchars($data['fc_culturedspicies'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{INVESTMENTTYPE}}', strtoupper(htmlspecialchars($data['fc_invcategory'])), $htmlTemplate);
        $htmlTemplate = str_replace('{{CAGETYPE}}', strtoupper(htmlspecialchars($data['fc_cagetype'])), $htmlTemplate);


        // Initialize TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('CAGRO');
        $pdf->SetTitle('Fishworker Data');
        $pdf->SetSubject('Fishworker Data Report');
        $pdf->SetKeywords('TCPDF, PDF, fishworker, report');

        // Set header and footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        // Set margins (top margin set to 0 to remove space)
        $pdf->SetMargins(10, 0, 10);  // Left = 10mm, Top = 0mm, Right = 10mm

        // Set auto page breaks (to control the space on the bottom if needed)
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 12);
        $pdf->writeHTML($htmlTemplate, true, false, true, false, '');
        // Output PDF
        $pdf->Output('fish_cage_permit_' . $fc_id . '.pdf', 'D'); // 'D' forces download

    } else {
        echo "No data found for the given ID.";
    }
} else {
    echo "Invalid request.";
}