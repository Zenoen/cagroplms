<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permit to Operate</title>
    <style>
        @page {
            size: A4;
            margin: 20mm;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #fff;
        }
        .container {
            width: 210mm;
            margin: auto;
            border: 1px solid #000;
            padding: 20mm;
            box-sizing: border-box;
        }
        .header {
            text-align: center;
        }
        .header h1 {
            font-size: 15px;
            margin: 5px 0;
        }

        .header h3, h4
        {
            margin: 5px;
        }

        .section {
            margin: 20px 0;
        }
        .section table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .section table, .section th, .section td {
            border: 1px solid black;
        }
        .section th, .section td {
            padding: 8px;
            text-align: center;
        }
        .details-table {
            width: 100%;
            margin: 20px 0;
            border: none;
            border-collapse: separate;
        }
        .details-table td {
            padding: 5px 10px;
            text-align: left;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
        }

        .italic
        {
            font-style: italic;
        }

        td
        {
            font-size: 15px;
        }

        .parag
        {
            font-size: 15px;
            text-align: justify;
        }

        .name-table td
        {
            border-style:hidden
        }

        .signature-line {
            border-bottom: 2px solid black;
            width: auto;
            margin: auto;
        }

        .signature-line2
        {
            border-bottom: 2px solid black;
            width: 250px;
            margin: auto;
        }

        .data
        {
            font-size: 15px;
            font-weight: bold;
        }

        .data-label
        {
            font-size:12px;
        }

        .footer-label
        {
            font-size: 15px;
        }

        .footer-data
        {
            font-size: 15px;
        }
    </style>
<body>
    <div class="container">
        <div class="header">
            <p style="margin:0">Republic of the Philippines</p>
            <h3>City Government of Panabo</h3>
            <p style="margin:0">Province of Davao del Norte</p>
            <h2 style="padding-top:10px">PERMIT TO OPERATE</h2>
        </div>

        <div class="section">
            <table style="width: 100%; border: 1px solid black; border-collapse: collapse; text-align: left;">
                <tr>
                    <td colspan="3" style="border: 1px solid black; padding: 5px"><strong style="font-size:12px; float:left;" class="italic">Name of Fish Cage/Operator</strong><table><tr><td style="border-style:hidden">{{FIRST_NAME}} {{MIDDLE_NAME}} {{LAST_NAME}}</td></tr></table></td>
                    <td style="border: 1px solid black; padding: 5px"><strong style="font-size:12px; float:left;" class="italic">Permit No.:</strong><table><tr><td style="border-style:hidden">PCDDN2024-000065-1 MF</td></tr></table></td>
                </tr>
                <tr>
                    <td  style="border: 1px solid black; padding: 5px;"><strong style="font-size:12px; float:left;" class="italic">No. of Units</strong><table><tr><td style="border-style:hidden">{{UNITS}}</td></tr></table></td>
                    <td colspan="2" style="border: 1px solid black; padding: 5px;"><strong style="font-size:12px; float:left;" class="italic">Type of Structure</strong><table><tr><td style="border-style:hidden">{{CAGETYPE}}</td></tr></table></td>
                    <td style="border: 1px solid black; padding: 5px;"><strong style="font-size:12px; float:left;" class="italic">Production Size</strong><table><tr><td style="border-style:hidden">{{INVESTMENTTYPE}}</td></tr></table></td>
                </tr>
            </table>
        </div>


        <div class="section">
            <p class="parag">
            THIS IS TO CERTIFY THAT pursuant to the Provision of Article V, Section 28 of the Comprehensive Mariculture Park Development Ordinance of 2012 in compliance with the implementation 
            of Republic Act 8550 otherwise known as Fishery Code of 1998 {{FIRST_NAME}} {{MIDDLE_NAME}} {{LAST_NAME}} having taken and bscribe the oath required by and having sworn that:<br>
            </p>
        </div>

        <div class="section">
            <table class="name-table">
                <tr>
                    <td>
                        <div class="data-label italic"><strong>Locator/Owner</strong></div>
                        <div class="data">{{FIRST_NAME}} {{MIDDLE_NAME}} {{LAST_NAME}}</div>
                        <div class="signature-line"></div>
                    </td>

                    <td>
                        <div class="data-label italic"><strong>Address</strong></div>
                        <div class="data">{{ADDRESS}}</div>
                        <div class="signature-line"></div>
                    </td>
                </tr>                   
            </table>
        </div>

        <div class="section">
            <p class="parag">
            Is the operator/owner of the herein described Fish Cage and is hereby permitted to operate/culture in Zone C area of the Mariculture Zone.
            </p>
        </div>

        <div class="section">
            <div class="header">
                <h4>REGISTER CAGE DIMENSION</h4>
            </div>
            
            <table>
                <tr>
                    <th>Length (meters)</th>
                    <th>Width (meters)</th>
                    <th>Depth (meters)</th>
                </tr>
                <tr>
                    <td>10.0</td>
                    <td>10.0</td>
                    <td>4.0</td>
                </tr>
            </table>
        </div>

        <div class="section">
            <div class="header">
                <h4>PRODUCTION CAPACITY</h4>
            </div>
            
            <table>
                <tr>
                    <th>Species Culture</th>
                    <th>Stocking Density</th>
                    <th>Culture Method</th>
                    <th>Ave. Production</th>
                </tr>
                <tr>
                    <td>{{SPECIES}}</td>
                    <td>15,000 pcs/unit</td>
                    <td>Monoculture</td>
                    <td>5.0 MT/unit/crop</td>
                </tr>
            </table>
        </div>

        <div class="section">
            <p class="parag">
                Issued this 3rd day of December, 2024.<br>
            </p>
            <p class="parag">
                This permit may be revoked in case gross violations are committed or for any reason the City
                Government of Panabo finds cause.
            </p>
        </div>
            <table class="name-table" style="text-align:left">
                <tr>
                    <td>
                        <div class="data">DATE OF ISSUANCE - DECEMBER 31, 2024</div>
                        <div class="signature-line"></div>
                    </td>
                </tr>                   
            </table>

        <div class="section">
            <table class="name-table">
                <tr>
                    <td>
                        <div class="footer-label" style="padding-bottom:10px;">Recommending Approval:</div>
                        <div class="footer-data"><strong>SAMUEL N. ANAY, RA, MSAg, DPA</strong></div>
                        <div class="signature-line2"></div>
                        <div class="data-label italic">City Agriculturist</div>
                    </td>

                    <td>
                        <div class="footer-label" style="padding-bottom:10px">Approved:</div>
                        <div class="footer-data"><strong>JOSE E. RELAMPAGOS</strong></div>
                        <div class="signature-line2"></div>
                        <div class="data-label italic">City Mayor</div>
                    </td>
                </tr>                   
            </table>
        </div>

        <div class="secton" style="padding-top:20px">
            <div class="data-label italic"><strong>Amount:</strong></div>
            <div class="data-label italic"><strong>O.R Number:</strong></div>
            <div class="data-label italic"><strong>Date:</strong></div>
        </div>

    </div>
</body>
</html>