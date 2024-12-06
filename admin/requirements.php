<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="../css/dash1.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/animation.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/add.css">
    <link rel="stylesheet" type="text/css" href="../css/req_table.css">
    <script src="../js/global/prof-drp.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <title>Requirements</title>

    <style>
        .print-btn {
            background-color: #398c55;

        }
    </style>
</head>


<?php
include("../conn.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the permit type you want to fetch
$permitType = $_GET['permittype'] ?? 'ff_permit';

// Prepare and execute the query
$stmt = $conn->prepare("SELECT `requirements`, `payment_data` FROM `requirementfees` WHERE `permit_name` = ?");
$stmt->bind_param("s", $permitType);
$stmt->execute();
$stmt->bind_result($requirementsJson, $paymentDataJson);
$stmt->fetch();
$stmt->close();

// Decode JSON data
$requirements = json_decode($requirementsJson, true) ?? [];
$paymentData = json_decode($paymentDataJson, true) ?? [];



?>

<body>

    <?php
    // include("../conn.php");
    // include("functions/admin_session.php");
    ?>


    <div class="container">

        <!-----------------------------------------------------------side-nav---------------------------------------------------------------------------->
        <?php
        // include("UI/side-nav.php");
        ?>
        <!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

        <div class="dash-body">
            <div class="dash-con">
                <table border="0" width="100%" class="table table-borderless">
                    <tr class="d-none">
                        <td>
                            <div class="style-inline" style="display: none; justify-content: space-between">
                                <div class="animx">
                                    <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ REQUIREMENTS</p>
                                </div>


                                <div class="profile-menu">
                                    <div class="profile-menu-items"><!--notification-->
                                        <img src="../img/icons/notif.svg" class="space img-notif selector">
                                    </div>

                                    <div class="profile-menu-items" onclick="toggleDropdown()"><!--profile-menu-->
                                        <?php
                                        if (!empty($userData['u_prof'])) {
                                            echo '<img class="sechead-prof-img selector" src="../uploads/' . htmlspecialchars($userData['u_prof']) . '" alt="Profile Image">';
                                        } else {
                                            echo '<img src="../img/user.png" class="space img-profile selector">';
                                        }
                                        ?>
                                        <img src="../img/icons/arrow-down.svg"
                                            style="height:20px;width:20px; margin:auto;" class="space selector">
                                    </div>
                                </div>

                                <div class="dropdown-content-prof" id="dropdown-prof">
                                    <div class="prof-divider">
                                        <img src="../img/user.png" class="space img-profile selector">
                                        <div style="display: block; margin: auto">
                                            <p style="color: black; font-size: 15px; font-weight: bold; text-wrap: wrap;"
                                                class="space">
                                                <?php echo $userData['lname'] . ', ' . $userData['fname'] ?>
                                            </p>
                                        </div>
                                    </div>

                                    <a href="#profile">My Profile</a>
                                    <a href="#settings">Settings</a>
                                    <a href="../logout.php">Logout</a>
                                </div>

                            </div>
                        </td>
                    </tr>

                    <!----------------------------------------------------table-------------------------------------------------------------------------->
                    <form action="generate_requirements/generate_req.php" method="POST">
                        <tr>

                            <td class="">
                                <div class="" style="display: flex;justify-content:end">


                                </div>

                                <br>

                                <div class="row gap-3 justify-content-center">


                                    <div class="col-sm-5 round_sm border p-4">
                                        <div class=" ">
                                            <h4>Permit Type:</h4>

                                        </div>
                                        <div>

                                            <select id="cars" class="form-select" name="permit_type" onchange="updateUrl()">
                                                <option value="ff_permit" <?php echo ($permitType == 'ff_permit') ? 'selected' : ''; ?>>Fisherfolk Permit</option>
                                                <option value="fw_permit" <?php echo ($permitType == 'fw_permit') ? 'selected' : ''; ?>>Fishworker Permit</option>
                                                <option value="fg_permit" <?php echo ($permitType == 'fg_permit') ? 'selected' : ''; ?>>Fishgear Permit</option>
                                                <option value="fv_permit" <?php echo ($permitType == 'fv_permit') ? 'selected' : ''; ?>>Fishing Vessel Permit</option>
                                                <option value="fc_permit" <?php echo ($permitType == 'fc_permit') ? 'selected' : ''; ?>>Fishcage Permit</option>

                                            </select>
                                            <br>
                                        </div>
                                        <div class=" ">
                                            <h5>REQUIREMENT CHECKLIST</h5>
                                        </div>
                                        <div class="fg-fields-check-slim">
                                            <?php
                                            // Iterate through requirements and create checkboxes
                                            $availableRequirements = [
                                                "BRGY. CLEARANCE/CERTIFICATION",
                                                "CEDULA",
                                                "FARMC CERTIFICATION",
                                                "2x2 I.D. PICTURE (2PCS)",
                                                "PNP MARITIME CLEARANCE",
                                                "ADMEASUREMENTS",
                                                "FISHERY LICENSE I.D",
                                                "OLD BOAT PERMIT (FOR RENEWAL)",
                                                "OLD PERMIT (RENEWAL)"
                                            ];

                                            foreach ($availableRequirements as $requirement) {
                                                $checked = in_array($requirement, $requirements) ? 'checked' : '';
                                                echo '<label class="check-box">' . $requirement . '
                                <input type="checkbox" class="cbox" name="requirements[]" value="' . $requirement . '" ' . $checked . '>
                                <span class="checkmark rounded shadow  border"></span>
                            </label>';
                                            }
                                            ?>
                                        </div>
                                        <div class="w-100 text-end">
                                            <button type="submit" class="btn btn-primary" name="saveReq" onclick="prepareData()">Save</button>
                                        </div>

                                    </div>

                                    <div class="col-sm-6 round_sm border p-4">
                                        <div class="">
                                            <div style="justify-content: space-between; display:flex;">
                                                <div>
                                                    <h4>PAYMENT SECTION</h4>
                                                </div>
                                                <div style="display: flex; align-items: center;">
                                                    <button class="btn btn-success print-btn" onclick="prepareData()" name="apply">Print</button>


                                                    <button type="button" onclick="addRow()" class="btn btn-primary">+ Add </button>

                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="fgnew-con1">
                                            <div class="fg-fields-slim">
                                                <table class="req-table table table-bordered"
                                                    style="position:sticky;top:0;border-spacing: 0; margin: 0; padding: 0;"
                                                    id="paymentTable">
                                                    <thead>
                                                        <tr>
                                                            <th class="req-border" width="30%">List of Payments</th>
                                                            <th class="req-border" width="20%">Amount</th>
                                                            <th class="req-border" width="20%">QTY</th>
                                                            <th class="req-border" width="20%">Sub-Total</th>
                                                            <th width="15%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="style-inline space-top space-bot"
                                            style="border-top: 0.5px groove #025193">
                                            <div
                                                style="float: right; display: flex; justify-content:center; align-items:center">
                                                <label id="total-lbl" style="color: black; margin: auto">Total:</label>
                                                <input type="number" id="total" style="color: black; margin: auto" readonly
                                                    class="input-drp">
                                            </div>
                                        </div>

                                    </div>


                                </div>

                                <!-- Add hidden fields for payments -->
                                <input type="hidden" id="payment_data" name="payment_data">

                            </td>
                        </tr>

                        <tr>
                            <td>

                            </td>
                        </tr>
                    </form>
                </table>

            </div>

        </div>
    </div>
    <!--table-autocalculate-script-->
    <script>
        function updateUrl() {
            // Get the selected value
            var selectElement = document.getElementById("cars");
            var selectedValue = selectElement.value;

            // Construct the URL with the query parameter
            var url = window.location.pathname + "?page=requirements&permittype=" + encodeURIComponent(selectedValue);

            // Redirect to the constructed URL
            window.location.href = url;
        }

        var paymentData = <?php echo json_encode($paymentData); ?>;

        // Populate the checklist
        document.addEventListener("DOMContentLoaded", function() {


            // Populate the payment table
            var paymentTableBody = document.getElementById("paymentTable").getElementsByTagName('tbody')[0];
            paymentData.forEach(function(payment) {
                var newRow = paymentTableBody.insertRow();

                var paymentCell = newRow.insertCell(0);
                paymentCell.innerHTML = `<input type="text" class="form-control "  value="${payment.payment}" style="outline:none; width:100%; height: 30px; text-align: center; background-color: #f9f9f9; border: 1px solid #ccc;" />`;

                var amountCell = newRow.insertCell(1);
                amountCell.innerHTML = `<input type="number" class="form-control"  value="${payment.amount}" style="width:100%; outline:none; height: 30px; background-color: #f9f9f9; border: 1px solid #ccc;" oninput="calculateSubTotal(this)" />`;

                var qtyCell = newRow.insertCell(2);
                qtyCell.innerHTML = `<input type="number" class="form-control"  value="${payment.qty}" style="width:100%; outline:none; height: 30px; background-color: #f9f9f9; border: 1px solid #ccc;" oninput="calculateSubTotal(this)" />`;

                var subTotalCell = newRow.insertCell(3);
                subTotalCell.innerHTML = `<input type="number" class="form-control"  value="${payment.subtotal}" style="width:100%; outline:none; height: 30px; background-color: #f9f9f9; border: 1px solid #ccc;" readonly />`;

                var actionCell = newRow.insertCell(4);
                actionCell.innerHTML = `<button class="btn btn-danger" onclick="deleteRow(this)">Delete</button>`;
            });

            // Optionally calculate total here
            calculateTotal();
        });

        function addRow() {
            var table = document.getElementById("paymentTable").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow();

            var paymentCell = newRow.insertCell(0);
            paymentCell.innerHTML = '<input type="text"  class="form-control "  style="outline:none; width:100%; height: 30px; text-align: center; background-color: #f9f9f9; border: 1px solid #ccc;" />';

            var amountCell = newRow.insertCell(1);
            amountCell.innerHTML = '<input type="number"  class="form-control "  style="width:100%; outline:none; height: 30px; background-color: #f9f9f9; border: 1px solid #ccc;" oninput="calculateSubTotal(this)" />';

            var qtyCell = newRow.insertCell(2);
            qtyCell.innerHTML = '<input type="number"  class="form-control "  style="width:100%; outline:none; height: 30px; background-color: #f9f9f9; border: 1px solid #ccc;" oninput="calculateSubTotal(this)" />';

            var subTotalCell = newRow.insertCell(3);
            subTotalCell.innerHTML = '<input type="number"  class="form-control "  style="width:100%; outline:none; height: 30px; background-color: #f9f9f9; border: 1px solid #ccc;" readonly />';

            var actionCell = newRow.insertCell(4);
            actionCell.innerHTML = `<button class="btn btn-danger"  onclick="deleteRow(this)">Delete</button>`;
        }

        function calculateSubTotal(element) {
            var row = element.parentNode.parentNode;
            var amount = parseFloat(row.cells[1].getElementsByTagName('input')[0].value) || 0;
            var qty = parseFloat(row.cells[2].getElementsByTagName('input')[0].value) || 0;
            var subTotalCell = row.cells[3].getElementsByTagName('input')[0];
            subTotalCell.value = (amount * qty).toFixed(2);
            console.log('Sub-Total Updated:', subTotalCell.value);
            calculateTotal();
        }

        function calculateTotal() {
            var table = document.getElementById("paymentTable").getElementsByTagName('tbody')[0];
            var rows = table.getElementsByTagName('tr');
            var total = 0;
            for (var i = 0; i < rows.length; i++) {
                var subTotal = parseFloat(rows[i].cells[3].getElementsByTagName('input')[0].value) || 0;
                total += subTotal;
            }
            console.log('Total Calculated:', total);
            document.getElementById("total").value = total.toFixed(2);
        }

        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
            calculateTotal();
        }

        function prepareData() {
            // Get table data
            let paymentData = [];
            let rows = document.querySelectorAll('#paymentTable tbody tr');

            rows.forEach(row => {

                let payment = row.cells[0].querySelector('input').value;
                let amount = row.cells[1].querySelector('input').value;
                let qty = row.cells[2].querySelector('input').value;
                let subtotal = row.cells[3].querySelector('input').value;

                paymentData.push({
                    payment,
                    amount,
                    qty,
                    subtotal
                });
            });

            document.getElementById('payment_data').value = JSON.stringify(paymentData);
        }
    </script>

</body>

</html>