<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=210mm, height=297mm, initial-scale=1.0">
    <title>Fisher's License</title>
    <style>
        /* Set the body size to match A4 paper size */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            width: 210mm;
            height: 297mm;
            margin: 0;
            padding: 0px;
            box-sizing: border-box;
            font-size: 10px;
            /* Reduced base font size */
        }

        p,
        h1,
        h2,
        h3,
        h4 {
            margin: 0;
            padding: 0;
        }

        .license-container {
            width: 100%;
            padding: 8mm;
            margin: 0 auto;
            /* border: 1px solid #333; */
            background-color: #fff;
            box-sizing: border-box;
        }

        .license-header {
            text-align: center;
            font-weight: bold;
        }

        .license-footer {
            text-align: center;
            font-size: 8px;
        }

        .license-title {
            font-size: 12px;
            /* Reduced title font size */
            text-align: center;
            margin: 8px 0;
            text-transform: uppercase;
        }

        .license-content {
            margin-top: 12px;
        }

        .section {
            width: 48%;
        }

        .photo-box {
            width: 70px;
            height: 70px;
            border: 1px solid #000;
            text-align: center;
            line-height: 70px;
            font-size: 10px;
            color: #666;
            margin-top: 5px;
        }

        .restrictions-list {
            font-size: 9px;
            /* Reduced font size */
            list-style-type: none;
            padding: 0;
            margin: 5px 0;
        }

        p,
        span {
            font-size: 11px;
            /* Reduced paragraph font size */
        }

        .restrictions-list li {
            margin: 3px 0;
        }

        .info-text {
            font-size: 9px;
            margin: 5px 0;
        }

        .signature-box {
            font-size: 9px;
            margin-top: 12px;
        }

        .signature-box div {
            text-align: center;
            width: 33%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 0;
            border: 1px solid #fff;
        }

        .no-border {
            border: none;
        }
    </style>
</head>

<body>
    <div class="license-container">
        <table class="no-border">
            <tr>
                <td class="no-border"><img src="../../img/white.jpg" alt=""></td>
                <td class="no-border">
                    <div class="license-header">
                        <span style="font-size:small">Republic of the Philippines</span><br>
                        <span>City Government of Panabo</span><br>
                        <span style="font-size:small">Province of Davao del Norte</span>
                    </div>
                </td>
                <td class="no-border" style="text-align:right"><img src="../../img/panabs.png" alt=""></td>
            </tr>
        </table>
        <br>
        <div class="license-header">
            <span style="text-align: center; font-size:30pt;font-weight:bold">CITY FISHING BOAT PERMIT</span><br>
        </div>
        <span>Motorized Boat:</span><br><span>Permit Number: </span><br><br><span>License I.D. no.: <b>PCDDN-2021-000370</b> </span>
        <div class="license-header">
            <span style="text-align: center; font-size:20pt">{{FIRST_NAME}} {{MIDDLE_NAME}} {{LAST_NAME}}</span><br>
            <span style="text-align: center; font-size:10pt"><i>(Name of Owner/Company/Individual) </i></span><br>

            <span style="text-align: center; font-size:15pt">{{ADDRESS}}</span><br>
            <span style="text-align: center; font-size:10pt"><i>(Address)</i></span><br>4
        </div>
        <table>
            <tr>
                <td> <span style="text-align: left; font-size:15pt">{{FIRST_NAME}}</span><br>
                    <span style="text-align: left; font-size:10pt"><i>(Boat Name)</i></span>
                </td>
                <td>

                </td>
                <td style="background-color:white;text-align:right">
                    <span style=" font-size:15pt;">1</span><br>
                    <span style=" font-size:10pt;"><i>(License Category)</i></span><br>
                </td>
            </tr>
        </table>
        <p>Boat side number call sign PCDDN000044A with color BLUE has the following specifications:
        </p>
        <center>
            <table>
                <tr>
                    <td>Registered Length: {{RL}} </td>
                    <td>Registered Breadth: {{RB}} </td>
                    <td>Registered Depth: {{RD}} </td>

                </tr>
                <tr>
                    <td>Tonnage Length: {{TL}} </td>
                    <td>Tonnage Breadth: {{TB}} </td>
                    <td>Tonnage Depth: {{TD}} </td>

                </tr>
                <tr>
                    <td>Gross Tonnage: {{GT}} </td>
                    <td>Net Breadth: {{NT}} </td>

                </tr>
              
            </table>
        </center>
        <br>
        <p>This boat is permitted to operate and engage in fishing legally approved gear for municipal fishing purposes in Panabo City waters as prescribed by the City Government of Panabo City.
            <br><br>
            The owner, operation and patron of the boat shall conduct fishing operation in accordance with the provision of the Panabo City Coastal and Fishery Management Ordinance.
            <br><br>

            This permit is issued pursuant to Section 17 of the City ordinance no. 03-03 in compliance to the implementation of Republic Act. 8550 otherwise known as Fishery Code of 1998. This certificate shall remain valid unless sooner suspended, cancelled or revoke, from <strong>DATE OF ISSUANCE TO {{EXPIRY}}</strong>.

        </p>
        <br>
        <br>
        <p>Done this {{CURRENT_DATE}} at New City Hall, Brgy. J.P. Laurel, Panabo City.</p>

        <table class="signature-box">
            <tr>
                <td>Recommending Approval:
                </td>
                <td>Approved by:
                </td>
            </tr>
            <tr>
                <td style="text-align: left;">
                    <br>
                    <p style="margin-top: 18px; white-space: nowrap;"><strong>Samuel N. Anay, RA, MSAg, DPA</strong><br>City Agriculturist</p>
                </td>
                <td>
                    <br>

                    <p style="margin-top: 18px; white-space: nowrap;"><strong>JOSE E. RELAMPAGOS</strong><br>City Mayor</p>

                </td>
            </tr>
        </table>

        <br><br>
        <i>Registration Fee: P270.00 <br>
            Under O.R. #:{{OR}} <br>
            Date Issued: {{DATE_ISSUED}}
        </i>
        <table style="display:none">
            <tr>
                <td style="width: 48%; padding-right: 5mm;">
                    <table class="no-border">
                        <tr>
                            <td class="no-border" width="50pt"><img src="../../img/white.jpg" alt=""></td>
                            <td class="no-border" width="150pt">
                                <div class="license-header">
                                    <span style="font-size:small">Republic of the Philippines</span><br>
                                    <span>City Government of Panabo</span><br>
                                    <span style="font-size:small">Province of Davao del Norte</span>
                                </div>
                            </td>
                            <td class="no-border" style="text-align:right" width="50pt"><img src="../../img/panabs.png" alt=""></td>
                        </tr>
                    </table>
                    <h3 class="license-title">Fisher's License</h3>
                    <h4>{{LAST_NAME}}, {{FIRST_NAME}} {{MIDDLE_NAME}}</h4>

                    <table>
                        <tr>
                            <td style="width: 25%; padding-right: 10px">
                                <div style="font-size: 6px; text-align: center; width: 160px; height: 125px; border: 1px solid #000">
                                    <br><br><br> PHOTO HERE <br><br><br>
                                </div>
                            </td>
                            <td style="width: 75%; padding-left: 5px;">
                                <table>
                                    <tr>
                                        <td>
                                            <p class="info-text">DATE ISSUED:<br> <strong>{{DATE_ISSUED}}</strong></p>
                                        </td>
                                        <td>
                                            <p class="info-text">EXPIRY DATE:<br> <strong>{{DATE_EXPIRY}}</strong></p>
                                        </td>
                                    </tr>
                                </table>

                                <p><strong>License No.: PCDDN-2024-000409</strong></p>
                                <p class="info-text">Restriction(s):<br><strong> {{RESTRICTIONS}}</strong></p>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td style="text-align: center;" width="160pt">
                                <p><strong>Jose E. Relampagos</strong><br>City Mayor</p>
                            </td>
                        </tr>
                    </table>

                </td>

                <td style="padding-left: 15px;">
                    <table class="license-content">
                        <tr>
                            <td>
                                <span class="info-text"><strong>Restrictions:</strong></span>
                                <ul class="restrictions-list">
                                    <li>1. Subsistence</li>
                                    <li>2. Fishworker</li>
                                    <li>3. Commercial</li>
                                    <li>4. Traps and Weir</li>
                                    <li>5. Aquaculture</li>
                                    <li>6. Mariculture</li>
                                    <li>7. Recreational/Sports Fishing</li>
                                    <li>8. Experimental and Research</li>
                                </ul>
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <p class="info-text"><strong>Birth Date:</strong><br> {{DOB}}</p>
                                        </td>
                                        <td>
                                            <p class="info-text"><strong>Gender:</strong><br> Male</p>
                                        </td>
                                    </tr>
                                </table>
                                <p class="info-text"><strong>Address:</strong><br> {{ADDRESS}}</p>
                            </td>
                        </tr>
                    </table>

                    <p class="license-footer">
                        <i>
                            Issued pursuant to Panabo City Coastal and Fishery Resource Management Ordinance No. 03-03. Valid only in Panabo Waters.
                        </i>
                    </p>
                    <table class="signature-box">
                        <tr>
                            <td>Issuing Officer:</td>
                            <td>Signature of Licensee:</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">
                                <br>
                                <p style="margin-top: 18px; white-space: nowrap;"><strong>Samuel N. Anay, RA, MSAg, DPA</strong><br>City Agriculturist</p>
                            </td>
                            <td>
                                <br><br>
                                _______________________
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br>

    </div>
</body>

</html>