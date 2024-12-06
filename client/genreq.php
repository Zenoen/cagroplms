<?php
 include("../conn.php");
//  include("functions/client_session.php");
require_once __DIR__ . '../../vendor/autoload.php';

if (isset($_POST['apply'])) {
    // Define the permit type you want to fetch
    $permitType = $_GET['permit_type'] ?? 'ff_permit'; // Permit type selected from the form

    $permitName = str_replace(
        ['ff_permit', 'fw_permit', 'fg_permit', 'fc_permit', 'fv_permit'],
        ['Fisherfolks', 'Fishing Worker', 'Fishing Gear', 'Fish Cage', 'Fishing Vessels'],
        $permitType
    );

    // Fetch requirements and payment data from the database
    $stmt = $conn->prepare("SELECT `requirements`, `payment_data` FROM `requirementfees` WHERE `permit_name` = ?");
    $stmt->bind_param("s", $permitType);
    $stmt->execute();
    $stmt->bind_result($requirementsJson, $paymentDataJson);
    $stmt->fetch();
    $stmt->close();

    // Decode JSON data
    $requirements = json_decode($requirementsJson, true) ?? [];
    $paymentData = json_decode($paymentDataJson, true) ?? [];

    // Create new PDF document
    $pdf = new TCPDF();

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('CAGRO Administrator');
    $pdf->SetTitle('Requirements & Fees');

    // Add a page
    $pdf->AddPage();

    // Set margins
    $pdf->SetMargins(15, 40, 15); // Left, Top, Right margins

    // Set font for the header
    $pdf->SetFont('helvetica', 'B', 12);

    // Add the main title text
    $pdf->SetXY(25, 10); // Adjust this position based on your needs
    $pdf->Cell(0, 0, 'CITY AGRICULTURE OFFICE', 0, 1, 'C');
    $pdf->SetFont('helvetica', '', 10);
    $pdf->Cell(0, 0, 'Panabo City', 0, 1, 'C');

    // Add the second line for subtitle
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->SetXY(25, 20); // Adjust this position based on your needs
    $pdf->Cell(0, 0, 'CHECKLIST FOR PERMIT TO OPERATE', 0, 1, 'C');

    // Optional signature or hand-written text
    $pdf->SetFont('helvetica', 'I', 12);
    $pdf->SetXY(160, 30); // Position to the right
    $pdf->Cell(30, 0, 'Signature', 0, 1, 'R');

    // Move the Y position to start the content below the header
    $pdf->SetY(50);

    // Set font for the content
    $pdf->SetFont('helvetica', 'B', 12);

    // Add the Requirements Checklist
    $pdf->Write(0, $permitName, '', 0, 'L', true, 0, false, false, 0);

    $pdf->SetFont('helvetica', '', 12);

    // Add the Requirements Checklist
    $pdf->Write(0,'Requirements Checklist:', '', 0, 'L', true, 0, false, false, 0);

    // List the fetched requirements
    if (!empty($requirements)) {
        foreach ($requirements as $requirement) {
            $pdf->Write(0, '- ' . $requirement, '', 0, 'L', true, 0, false, false, 0);
        }
    } else {
        $pdf->Write(0, 'No requirements available.', '', 0, 'L', true, 0, false, false, 0);
    }

    // Add a line break
    $pdf->Ln(10);

    // Add the Payment Details section
    $pdf->Write(0, 'Payment Details:', '', 0, 'L', true, 0, false, false, 0);

    if (!empty($paymentData)) {
        // Create a simple table layout for payments
        $tbl = '<table border="1" cellpadding="4">
            <thead>
                <tr style="background-color:#f2f2f2;">
                    <th><strong>Payment Description</strong></th>
                    <th><strong>Amount</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>Subtotal</strong></th>
                </tr>
            </thead>
            <tbody>';

        foreach ($paymentData as $payment) {
            $tbl .= '<tr>
                    <td>' . htmlspecialchars($payment['payment']) . '</td>
                    <td>' . htmlspecialchars($payment['amount']) . '</td>
                    <td>' . htmlspecialchars($payment['qty']) . '</td>
                    <td>' . htmlspecialchars($payment['subtotal']) . '</td>
                </tr>';
        }

        $tbl .= '</tbody></table>';

        $pdf->writeHTML($tbl, true, false, false, false, '');
    } else {
        $pdf->Write(0, 'No payment data available.', '', 0, 'L', true, 0, false, false, 0);
    }

    // Output the PDF as a file download
    $pdf->Output($permitName.'_Requirements.pdf', 'D'); // 'D' forces download, 'I' shows in browser
}

?>