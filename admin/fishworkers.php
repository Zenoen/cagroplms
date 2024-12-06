<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="../css/dash1.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/animation.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/edit_modal.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/customs.css"> -->
    <link rel="stylesheet" href="../css/bootstrap/icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../includes/sweetalert2.min.css">
    <script src="../includes/sweetalert2.min.js"></script>
    <script src="../js/global/prof-drp.js" defer></script>
    <script src="../js/admin/edit-fishworkers.js" defer></script>
    <script src="../js/admin/view-fishworkers.js" defer></script>
    <script src="../js/global/search.js" defer></script>
    <script src="../js/admin/button-disabler.js" defer></script>
    <script src="../js/admin/permit_status.js" defer></script>

    <title>Fishworkers</title>
</head>

<body>
    <!-- START -->
    <script>
        function printContent(el) {


            var restorePage = document.body.innerHTML;

            var printContent = document.getElementById(el).innerHTML;

            var tempDiv = document.createElement('div');
            tempDiv.innerHTML = printContent;


            printContent = tempDiv.innerHTML;


            document.body.innerHTML = '<div class="table table-bordered" id="printout">' + printContent + '</div>';
            window.print();

            document.body.innerHTML = restorePage;

        }
    </script>
   
    <span id="printout" class="d-none">


        <div class="license-header text-center">
            <span style="font-size:small">Republic of the Philippines</span><br>
            <span>City Government of Panabo</span><br>
            <span style="font-size:small">Province of Davao del Norte</span>

            <h2 class="mt-5"><?= ucwords($_GET['page']) ?></h2>

        </div>

        <small>
            <table class="table table-bordered " id="tableprint">

                <tr>
                    <th>Permit No</th>
                    <th>Gender</th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Address</th>
                    <th>OR Number</th>
                </tr>

                <?php
                $sqlprint = "SELECT * FROM `fishworkerlicense` WHERE `u_status`=4;";
                $resultprint = $conn->query($sqlprint);
                if ($resultprint->num_rows > 0) {
                    while ($row = $resultprint->fetch_assoc()) {
                        $name = $row['fw_fname'] . ' ' . $row['fw_mname'] . ' ' . $row['fw_lname'] . ' ' . $row['fw_appell'];
                        $location = $row['fw_street'] . ' ' . $row['fw_barangay'] . ', ' . $row['fw_municipal'] . ', ' . $row['fw_province'];
                        $gender = $row['fw_gender'];
                        $dob = $row['fw_dob'];

                ?>
                        <tr class="border">
                            <td><?= "PCMDDN-2024-0000" . $row['fw_id'] ?> </td>
                            <td><?= $gender ?> </td>
                            <td><?= $name ?> </td>
                            <td><?= $dob ?> </td>
                            <td><?= $location ?></td>
                            <td><?= htmlspecialchars($row['fw_OR']) ?></td>
                        </tr>


                <?php }
                } ?>
            </table>
        </small>
        
        <table border="0" style="width:100%; text-align:left;border-color:white">
        <tr>
            <td>
                <span style="font-size:small;">Prepared By:</span><br>
                <span style="font-weight:bold;">JACKIELOU G. LABRA,</span><br>
                <span style="font-weight:bold;">RFT</span><br>
                <span style="font-size:small;">Aquaculturist I.</span>
            </td>
            <td>
                <span style="font-size:small;">Concurred By:</span><br>
                <span style="font-weight:bold;">ALEX A. TAPANAN,</span><br>
                <span style="font-weight:bold;">RFT</span><br>
                <span style="font-size:small;">Aquaculturist II.</span>
            </td>
            <td>
                <span style="font-size:small;">Noted By:</span><br>
                <span style="font-weight:bold;">SAMUEL N. ANAY,</span><br>
                <span style="font-weight:bold;">MSAg.DPA</span><br>
                <span style="font-size:small;">City Aquaculturist</span>
            </td>
        </tr>
        </table>
    </span>
    <!-- END -->
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

            <tr>
                <td>
                    <div class="style-inline" style="display: none; justify-content: space-between">
                        <div class="animx">
                            <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ FISHWORKERS</p>
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
                                <img src="../img/icons/arrow-down.svg" style="height:20px;width:20px; margin:auto;" class="space selector">
                            </div>
                        </div>

                        <div class="dropdown-content-prof" id="dropdown-prof">
                            <div class="prof-divider">
                                <img src="../img/user.png" class="space img-profile selector">
                                <div style="display: block; margin: auto">
                                    <p style="color: black; font-size: 15px; font-weight: bold; text-wrap: wrap;" class="space"><?php echo $userData['lname'] . ', ' . $userData['fname'] ?></p>
                                </div>
                            </div>

                            <a href="profile.php">My Profile</a>
                            <a href="../logout.php">Logout</a>
                        </div>

                    </div>
                </td>
            </tr>
                <div class="text-end pb-2">
                    <button type="button" class="btn btn-primary " onclick="printContent('printout')">
                        <i class="bi bi-printer-fill me-3"></i>Print Report&emsp;
                    </button>
                </div>            <tr>
                <td class="style-inline">
                    <input type="search" name="search" id="searchInput" class="input-text form-control header-searchbar" placeholder="Search" onkeyup="searchTable()">
                </td>
            </tr>

            <!---------------------------------------------------------------------------------------table-------------------------------------------------------------------------->
            <tr>
                <td>
                    <center>
                        <div style="margin:auto; float: right" class="space-top">
                            <!-- <button><a>sort</a></button> -->
                        </div>
                        <div class="abc" style="padding-top: 1rem;">
                            <table width="100%" class="small sub-table table table-borderless scrolldown animy" cellspacing="0">
                                <thead class="headert bg-primary text-white">
                                    <tr>
                                        <th class="table-headin">
                                            ID
                                        </th>
     
                                        <th class="table-headin">
                                            NAME
                                        </th>

                                        <th class="table-headin">
                                            ADDRESS
                                        </th>
                                        <th class="table-headin">
                                            OR NUMBER
                                        </th>
                                        <th class="table-headin">
                                            LOCATOR/INVESTOR
                                        </th>
                                        <th class="table-headin">
                                            ACTIONS
                                        </th>
                                        <th class="table-headin">
                                            STATUS
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="table-con" id="dataTable"><!--table-body-->
                                    <?php
                                    if ($result_fishworker->num_rows > 0) {

                                        $smsNotifier = new SMSNotifier($conn);
                                        $smsNotifier->sendExpiringNotifications('fishworkerlicense', 'fw_id', 'fw_contact', 'Fish Worker');
                                        while ($row = $result_fishworker->fetch_assoc()) {
                                            $fwid = $row["fw_id"];
                                            $status = $row['u_status'];

                                            echo '<tr class="border-bottom">';
                                            echo '<td>' . htmlspecialchars($row['fw_id']) . '</td>';
                                        
                                            echo '<td class="nametd">' . htmlspecialchars($row['name']) . '</td>';
                                        
                                            echo '<td>' . htmlspecialchars($row['address']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['fw_OR']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['locator']) . '</td>';
                                            echo '<td><!-- Add your actions here -->
                                                <div class="action-icons" >

                                                    <i class="bi bi-pencil-square edit-icon icon-size icon-edit p-0  ps-1 pe-1 btn btn-primary fw-bold" 
                                                    data-id="' . htmlspecialchars($row['fw_id']) .
                                                '"data-id-type="fw_id"
                                                     data-gender="' . htmlspecialchars($row['fw_gender']) .
                                                '" data-fname="' . htmlspecialchars($row['fw_fname']) .
                                                '" data-mname="' . htmlspecialchars($row['fw_mname']) .
                                                '" data-lname="' . htmlspecialchars($row['fw_lname']) .
                                                '" data-dob="' . htmlspecialchars($row['fw_dob']) .
                                                '" data-contact="' . htmlspecialchars($row['fw_contact']) .
                                                '" data-postal="' . htmlspecialchars($row['fw_postal']) .
                                                '" data-province="' . htmlspecialchars($row['fw_province']) .
                                                '" data-municipal="' . htmlspecialchars($row['fw_municipal']) .
                                                '" data-barangay="' . htmlspecialchars($row['fw_barangay']) .
                                                '" data-street="' . htmlspecialchars($row['fw_street']) .
                                                '" data-or="' . htmlspecialchars($row['fw_OR']) .
                                                '" data-locator="' . htmlspecialchars($row['locator']) .
                                                '"    data-email="' . htmlspecialchars($row['u_email']) .
                                                '" data-status="' . htmlspecialchars($row['u_status']) .
                                                '"data-reason="' . htmlspecialchars($row['decline_reason']) .
                                                '" style="vertical-align: middle; cursor: pointer;"></i>

                                                    <i class="bi bi-eye view-icon icon-size icon-view p-0  ps-1 pe-1 btn btn-secondary fw-bold"
                                                    data-id="' . htmlspecialchars($row['fw_id']) .
                                                '" data-gender="' . htmlspecialchars($row['fw_gender']) .
                                                '" data-fname="' . htmlspecialchars($row['fw_fname']) .
                                                '" data-mname="' . htmlspecialchars($row['fw_mname']) .
                                                '" data-lname="' . htmlspecialchars($row['fw_lname']) .
                                                '" data-dob="' . htmlspecialchars($row['fw_dob']) .
                                                '" data-contact="' . htmlspecialchars($row['fw_contact']) .
                                                '" data-postal="' . htmlspecialchars($row['fw_postal']) .
                                                '" data-province="' . htmlspecialchars($row['fw_province']) .
                                                '" data-municipal="' . htmlspecialchars($row['fw_municipal']) .
                                                '" data-barangay="' . htmlspecialchars($row['fw_barangay']) .
                                                '" data-street="' . htmlspecialchars($row['fw_street']) .
                                                '" data-or="' . htmlspecialchars($row['fw_OR']) .
                                                '" data-locator="' . htmlspecialchars($row['locator']) .
                                                '"data-reason="' . htmlspecialchars($row['decline_reason']) .
                                                '" data-status="' . htmlspecialchars($row['u_status']) .
                                                '" style="vertical-align: middle; cursor: pointer;"></i>

                                                    <!-- Delete Button -->
                                                    <i class="bi bi-trash delete-icon icon-size icon-delete p-0  ps-1 pe-1 btn btn-danger fw-bold" 
                                                    style="cursor: pointer;" 
                                                    onclick="confirmDelete(' . htmlspecialchars($row['fw_id']) . ', \'fishworker\')"></i>
                                                    <!-- Add Generate Button -->
                                                    <form hidden action="generate_fw_application/generate_app_fw.php" method="POST" style="display:inline-block;">
                                                        <input type="hidden" name="fw_id" value="' . htmlspecialchars($row['fw_id']) . '">
                                                        <button type="submit" class="p-0  ps-1 pe-1 btn btn-success fw-bold"><i class="bi bi-file-earmark-arrow-down"></i></button>
                                                    </form>
                                                </div>
                                                </td>';
                                            echo '<td>';
                                            if ($status == 1) {
                                                echo '<span class="stats-pending">Pending</span>';
                                            } elseif ($status == 2) {
                                                echo '<span class="stats-pending">Requirements Issued</span>';
                                            } elseif ($status == 3) {
                                                echo '<span class="stats-pending">For Approval</span>';
                                            } elseif ($status == 4) {
                                                echo '<span class="stats-complete">Registered</span>';
                                            } elseif ($status == 5) {
                                                echo '<span class="stats-expiry">Expiry Notice</span>';
                                            } elseif ($status == 6) {
                                                echo '<span class="stats-expiry">Declined</span>';
                                            }
                                            echo '</td>';

                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="9">No results found</td></tr>';
                                    }

                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </center>

                </td>
            </tr>
            <!------------------------------------------------------------------------edit-modal--------------------------------------------------------------->
            <div id="editModal" class="modal animy">
                <div class="modal-content">
                    <div>
                        <span class="close">&times;</span>
                    </div>
                    <div>
                        <div style="margin-inline:10px">
                            <h3 class="modal-head">Edit Fishworker Details</h3>
                        </div>
                    </div>

                    <div style="margin-inline:10px">
                        <div class="modal-status">Permit Status: <span class=""></span><!--change the span class--></div>
                    </div>

                    <form id="editForm" action="functions/update.php" method="post">
                        <div>
                            <div style="display:flex;" class="space-top">

                                <div style="margin-inline:10px">
                                    <input type="hidden" name="id" id="edit-id">

                                    <div style="margin:auto" class="spacing">
                                        <label class="modal-label" for="gender">Gender:</label>
                                        <input class="input-xx" type="text" name="gender" id="edit-gender">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fname">First Name:</label>
                                        <input class="input-xx" type="text" name="fname" id="edit-fname">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="mname">Middle Name:</label>
                                        <input class="input-xx" type="text" name="mname" id="edit-mname">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="lname">Last Name:</label>
                                        <input class="input-xx" type="text" name="lname" id="edit-lname">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="dob">Date Of Birth:</label>
                                        <input class="input-xx" type="date" name="dob" id="edit-dob">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="contact">Contact No.:</label>
                                        <input class="input-xx" type="text" name="contact" id="edit-contact">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="AT">Approval Type:</label>
                                        <input class="input-xx" type="text" name="AT" value="Fishery License Permit">
                                    </div>

                                </div>

                                <div style="margin-inline:10px">

                                    <div class="spacing">
                                        <label class="modal-label" for="postal">Postal Code:</label>
                                        <input class="input-xx" type="text" name="postal" id="edit-postal">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="province">Province:</label>
                                        <input class="input-xx" type="text" name="province" id="edit-province">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="municipal">Municipal:</label>
                                        <input class="input-xx" type="text" name="municipal" id="edit-municipal">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="barangay">Barangay:</label>
                                        <input class="input-xx" type="text" name="barangay" id="edit-barangay">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="street">Street:</label>
                                        <input class="input-xx" type="text" name="street" id="edit-street">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fw_OR">OR Number:</label>
                                        <input class="input-xx" type="text" name="OR" id="edit-or">
                                    </div>
                                    <div class="spacing">
                                        <label class="modal-label" for="locator">Locator:</label>
                                        <input class="input-xx" type="text" name="locator" id="edit-locator">
                                    </div>
                                    <div class="spacing">
                                        <label class="modal-label" for="locator">Reason:</label>
                                        <input class="input-xx" type="text" name="locator" id="edit-reason">
                                    </div>
                                </div>
                                <input class="input-xx" type="text" name="uemail" id="edit-uemail" hidden>

                                <input type="hidden" name="form_type" value="fishworkerlicense">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">

                            <!-- <div class="spacing">
                                    <a class="href_nodesign" href="?page=requirements&permittype=fw_permit"><button button type="submit" name="action" class="btn" id="reqButton" value="issue_requirements">Issue Requirements</button></a>
                                </div> -->

                            <div class="spacing m-1">
                                <button type="button" name="action" class="btn btn-secondary" id="updateButton" data-action="update">Update</button>
                            </div>

                            <div class="spacing m-1">
                                <button type="button" name="action" class="btn btn-primary" id="insertButton"
                                    data-action="send_for_approval">For Approval</button>
                            </div>

                            <div class="spacing m-1" id="renewButton">
                                <button type="button" name="action" class="btn btn-primary" data-action="renew">Renew</button>


                                <input type="hidden" name="fw_id" id="edit-id2" placeholder="Enter FF ID" required id="edit-id">
                                <button type="button" class="btn btn-success" onclick="generate('generate_fw_application/generate_app_fw.php','fw_id')">
                                    <i class="bi bi-file-earmark-arrow-down"></i>
                                </button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
            <!------------------------------------------------------------------------view-modal--------------------------------------------------------------->
            <div id="viewModal" class="modal animy">
                <div class="modal-content">
                    <div style="float:right">
                        <div>
                            <span class="viewclose">&times;</span>
                        </div>
                    </div>
                    <div>
                        <div style="margin-inline:10px">
                            <h3 class="modal-head">View Fishworker Details</h3>
                        </div>
                    </div>

                    <div style="margin-inline:10px">
                        <div class="modal-status">Permit Status: <span class=""></span><!--change the span class--></div>
                    </div>

                    <div style="display:flex;" class="space-top">
                        <div style="margin-inline:10px">
                            <input type="hidden" name="id" id="view-id">

                            <div style="margin:auto" class="spacing">
                                <label class="modal-label" for="view-gender">Gender:</label>
                                <input class="input-xx" type="text" id="view-gender" readonly>
                            </div>

                            <div class="spacing">
                                <label class="modal-label" for="view-fname">First Name:</label>
                                <input class="input-xx" type="text" id="view-fname" readonly>
                            </div>

                            <div class="spacing">
                                <label class="modal-label" for="view-mname">Middle Name:</label>
                                <input class="input-xx" type="text" id="view-mname" readonly>
                            </div>

                            <div class="spacing">
                                <label class="modal-label" for="view-lname">Last Name:</label>
                                <input class="input-xx" type="text" id="view-lname" readonly>
                            </div>

                            <div class="spacing">
                                <label class="modal-label" for="view-dob">Date Of Birth:</label>
                                <input class="input-xx" type="date" name="dob" id="view-dob" readonly>
                            </div>

                            <div class="spacing">
                                <label class="modal-label" for="view-contact">Contact No.:</label>
                                <input class="input-xx" type="text" id="view-contact" readonly>
                            </div>

                            <div class="spacing">
                                <label class="modal-label" for="AT">Approval Type:</label>
                                <input class="input-xx" type="text" name="AT" value="Fishery License Permit" readonly>
                            </div>
                        </div>

                        <div style="margin-inline:10px">
                            <div class="spacing">
                                <label class="modal-label" for="view-postal">Postal Code:</label>
                                <input class="input-xx" type="text" id="view-postal" readonly>
                            </div>

                            <div class="spacing">
                                <label class="modal-label" for="view-province">Province:</label>
                                <input class="input-xx" type="text" id="view-province" readonly>
                            </div>

                            <div class="spacing">
                                <label class="modal-label" for="view-municipal">Municipal:</label>
                                <input class="input-xx" type="text" id="view-municipal" readonly>
                            </div>

                            <div class="spacing">
                                <label class="modal-label" for="barangay">Barangay:</label>
                                <input class="input-xx" type="text" name="barangay" id="view-barangay" readonly>
                            </div>

                            <div class="spacing">
                                <label class="modal-label" for="view-street">Street:</label>
                                <input class="input-xx" type="text" id="view-street" readonly>
                            </div>

                            <div class="spacing">
                                <label class="modal-label" for="view-or">OR Number:</label>
                                <input class="input-xx" type="text" id="view-or" readonly>
                            </div>

                            <div class="spacing">
                                <label class="modal-label" for="locator">Locator:</label>
                                <input class="input-xx" type="text" name="locator" id="edit-locator">
                            </div>

                        </div>
                    </div>

                    <div style="display:flex; float:right; padding-top: 1rem">
                        <!-- <div class="spacing">
                                <a class="href_nodesign" href="?page=requirements&permittype=fw_permit"><button type="button" class="btn">Issue Requirements</button></a>
                            </div> -->

                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
        document.querySelectorAll("button[name='action']").forEach(button => {
            button.addEventListener("click", function() {
                // Get the dynamic value from the button's data-action attribute
                const actionValue = this.getAttribute("data-action");

                // Show confirmation alert
                Swal.fire({
                    title: 'Are you sure?',
                    text: `Do you want to proceed with the ${actionValue.replaceAll("_"," ")} action?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: `Yes, ${actionValue.replaceAll("_"," ")}`,
                    cancelButtonText: 'No, cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If confirmed, set the dynamic action value and submit the form
                        var form = document.getElementById("editForm");

                        // Create or reset the hidden action input field
                        var actionButton = document.querySelector("input[name='action']");
                        if (!actionButton) {
                            actionButton = document.createElement("input");
                            actionButton.type = "hidden";
                            actionButton.name = "action"; // This is the name that will be passed to PHP
                            form.appendChild(actionButton); // Append it to the form
                        }
                        actionButton.value = actionValue; // Set the dynamic action value

                        // Submit the form
                        form.submit();
                    } else {
                        // Handle cancel action if needed
                        Swal.fire("Action cancelled", "", "info");
                    }
                });
            });
        });






        <?php
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            $message_type = $_SESSION['message_type'];

            echo "Swal.fire({
                    title: 'Success',
                    text: '$message',
                    icon: '$message_type',
                    confirmButtonText: 'OK',
                    customClass: {
                        popup: 'custom-swal-popup',
                        title: 'custom-swal-title',
                        content: 'custom-swal-content',
                        confirmButton: 'custom-ok-button'
                    }
                });";

            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        }
        ?>
    </script>

    <script>
        function confirmDelete(id, type) {
            Swal.fire({
                title: 'Delete Fishworker Record?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm',
                customClass: {
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    htmlContainer: 'custom-swal-text',
                    content: 'custom-swal-content',
                    confirmButton: 'custom-swal-confirm-button',
                    cancelButton: 'custom-swal-cancel-button'
                }
            }).then((result) => {
                if (result.isConfirmed) {

                    const xhr = new XMLHttpRequest();
                    xhr.open("GET", "functions/delete.php?action=delete&id=" + id + "&type=" + type, true);
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            Swal.fire(
                                'Deleted!',
                                'The record has been deleted.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                'There was a problem deleting the record.',
                                'error'
                            );
                        }
                    };
                    xhr.send();
                }
            });
        }
    </script>

</body>

</html>