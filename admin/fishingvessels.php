<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="../css/dash1.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/animation.css"> -->
    <link rel="stylesheet" href="../css/bootstrap/icons/font/bootstrap-icons.css">

    <!-- <link rel="stylesheet" type="text/css" href="../css/customs.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/edit_modal.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/customs.css"> -->
    <link rel="stylesheet" href="../css/bootstrap/icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../includes/sweetalert2.min.css">
    <script src="../includes/sweetalert2.min.js"></script>
    <script src="../js/global/prof-drp.js" defer></script>
    <script src="../js/admin/edit-fishingboats.js" defer></script>
    <script src="../js/admin/view-fishingboats.js" defer></script>
    <!-- <script src="../js/admin/view.js" defer></script> -->
    <script src="../js/global/search.js" defer></script>
    <script src="../js/admin/button-disabler.js" defer></script>
    <script src="../js/admin/permit_status.js" defer></script>
    <title>Fishing Vessel</title>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const viewIcons = document.querySelectorAll('.view-icon'); // Change to your view icon class
            const viewModal = document.getElementById('viewModal'); // Change to your modal ID
            const closeViewModal = viewModal.querySelector('.close'); // Change if you have a different close button
            const expirationDateSpan = document.querySelector('.expiration-date'); // If you have this element
            const viewForm = document.getElementById('viewForm'); // Change to your modal form ID if needed

            viewIcons.forEach(icon => {
                icon.addEventListener('click', function() {
                    // Set the modal fields with the appropriate data from the icon's attributes using getAttribute
                    document.getElementById('view-id').value = this.getAttribute('data-id');
                    document.getElementById('view-fb_opfname').value = this.getAttribute('data-fb_opfname');
                    document.getElementById('view-fb_opmname').value = this.getAttribute('data-fb_opmname');
                    document.getElementById('view-fb_oplname').value = this.getAttribute('data-fb_oplname');
                    document.getElementById('view-fb_opappel').value = this.getAttribute('data-fb_opappel');
                    document.getElementById('view-fb_postal').value = this.getAttribute('data-fb_postal');
                    document.getElementById('view-fb_opprov').value = this.getAttribute('data-fb_opprov');
                    document.getElementById('view-fb_opmunicipal').value = this.getAttribute('data-fb_opmunicipal');
                    document.getElementById('view-fb_opbarangay').value = this.getAttribute('data-fb_opbarangay');
                    document.getElementById('view-fb_opstreet').value = this.getAttribute('data-fb_opstreet');
                    document.getElementById('view-fb_homeport').value = this.getAttribute('data-fb_homeport');
                    document.getElementById('view-fb_vesselname').value = this.getAttribute('data-fb_vesselname');
                    document.getElementById('view-fb_vesseltype').value = this.getAttribute('data-fb_vesseltype');
                    document.getElementById('view-fb_placebuilt').value = this.getAttribute('data-fb_placebuilt');
                    document.getElementById('view-fb_yearbuilt').value = this.getAttribute('data-fb_yearbuilt');
                    document.getElementById('view-fb_materialbuilt').value = this.getAttribute('data-fb_materialbuilt');
                    document.getElementById('view-fb_RL').value = this.getAttribute('data-fb_RL');
                    document.getElementById('view-fb_RB').value = this.getAttribute('data-fb_RB');
                    document.getElementById('view-fb_RD').value = this.getAttribute('data-fb_RD');
                    document.getElementById('view-fb_TL').value = this.getAttribute('data-fb_TL');
                    document.getElementById('view-fb_TB').value = this.getAttribute('data-fb_TB');
                    document.getElementById('view-fb_TD').value = this.getAttribute('data-fb_TD');
                    document.getElementById('view-fb_GT').value = this.getAttribute('data-fb_GT');
                    document.getElementById('view-fb_NT').value = this.getAttribute('data-fb_NT');
                    document.getElementById('view-fb_enginemake').value = this.getAttribute('data-fb_enginemake');
                    document.getElementById('view-fb_serial').value = this.getAttribute('data-fb_serial');
                    document.getElementById('view-fb_horsepower').value = this.getAttribute('data-fb_horsepower');
                    document.getElementById('view-u_email').value = this.getAttribute('data-u_email');
                    const status = parseInt(this.getAttribute('data-u_status')); // Get the status as an integer

                    // Create the status message using a switch statement
                    let statusMessage;

                    switch (status) {
                        case 1:
                            statusMessage = '<span class="stats-pending">Pending</span>';
                            break;
                        case 2:
                            statusMessage = '<span class="stats-pending">Requirements Issued</span>';
                            break;
                        case 3:
                            statusMessage = '<span class="stats-pending">Awaiting Approval</span>';


                            break;
                        case 4:
                            statusMessage = '<span class="stats-complete">Registered</span>';
                            break;
                        case 5:
                            statusMessage = '<span class="stats-expiry">Expiry Notice</span>';
                            break;
                        default:
                            statusMessage = '<span class="stats-unknown">Unknown Status</span>';
                    }

                    // Set the innerHTML of the view-u_status element
                    document.getElementById('view-u_status').innerHTML = statusMessage;
                    // If you have an expiration date span, update it
                    expirationDateSpan.textContent = this.getAttribute('data-expiration_date');

                    // Show the modal
                    viewModal.style.display = 'block';
                    // alert('test');

                });
            });

            // Close the modal when the close button is clicked
            closeViewModal.addEventListener('click', function() {


                viewModal.style.display = 'none';
            });

            // Close the modal if user clicks outside the modal content
            window.onclick = function(event) {
                if (event.target == viewModal) {
                    viewModal.style.display = 'none';
                }
            }
        });

        // JavaScript to handle edit modal and fill the form with the correct data
        document.addEventListener('DOMContentLoaded', function() {
            const editIcons = document.querySelectorAll('.edit-icon');
            const editModal = document.getElementById('editModal');
            const closeModal = document.querySelector('.close');
            const expirationDateSpan = document.querySelector('.expiration-date');
            const editForm = document.getElementById('editForm');

            editIcons.forEach(icon => {
                icon.addEventListener('click', function() {

                    // Set the modal fields with the appropriate data from the icon's attributes using getAttribute
                    document.getElementById('edit-id').value = this.getAttribute('data-id');
                    document.getElementById('edit-fb_opfname').value = this.getAttribute('data-fb_opfname');
                    document.getElementById('edit-fb_opmname').value = this.getAttribute('data-fb_opmname');
                    document.getElementById('edit-fb_oplname').value = this.getAttribute('data-fb_oplname');
                    document.getElementById('edit-fb_opappel').value = this.getAttribute('data-fb_opappel');
                    document.getElementById('edit-fb_postal').value = this.getAttribute('data-fb_postal');
                    document.getElementById('edit-fb_opprov').value = this.getAttribute('data-fb_opprov');
                    document.getElementById('edit-fb_opmunicipal').value = this.getAttribute('data-fb_opmunicipal');
                    document.getElementById('edit-fb_opbarangay').value = this.getAttribute('data-fb_opbarangay');
                    document.getElementById('edit-fb_opstreet').value = this.getAttribute('data-fb_opstreet');
                    document.getElementById('edit-fb_homeport').value = this.getAttribute('data-fb_homeport');
                    document.getElementById('edit-fb_vesselname').value = this.getAttribute('data-fb_vesselname');
                    document.getElementById('edit-fb_vesseltype').value = this.getAttribute('data-fb_vesseltype');
                    document.getElementById('edit-fb_placebuilt').value = this.getAttribute('data-fb_placebuilt');
                    document.getElementById('edit-fb_yearbuilt').value = this.getAttribute('data-fb_yearbuilt');
                    document.getElementById('edit-fb_materialbuilt').value = this.getAttribute('data-fb_materialbuilt');
                    document.getElementById('edit-fb_RL').value = this.getAttribute('data-fb_RL');
                    document.getElementById('edit-fb_RB').value = this.getAttribute('data-fb_RB');
                    document.getElementById('edit-fb_RD').value = this.getAttribute('data-fb_RD');
                    document.getElementById('edit-fb_TL').value = this.getAttribute('data-fb_TL');
                    document.getElementById('edit-fb_TB').value = this.getAttribute('data-fb_TB');
                    document.getElementById('edit-fb_TD').value = this.getAttribute('data-fb_TD');
                    document.getElementById('edit-fb_GT').value = this.getAttribute('data-fb_GT');
                    document.getElementById('edit-fb_NT').value = this.getAttribute('data-fb_NT');
                    document.getElementById('edit-fb_enginemake').value = this.getAttribute('data-fb_enginemake');
                    document.getElementById('edit-fb_serial').value = this.getAttribute('data-fb_serial');
                    document.getElementById('edit-fb_horsepower').value = this.getAttribute('data-fb_horsepower');
                    document.getElementById('edit-u_email').value = this.getAttribute('data-u_email');
                    // document.getElementById('edit-u_status').innerText = this.getAttribute('data-u_status');
                    const status = parseInt(this.getAttribute('data-u_status')); // Get the status as an integer
                    document.getElementById('insertButton').style.display = 'none';
                    // alert('awd');
                    // Create the status message using a switch statement
                    let statusMessage;

                    switch (status) {
                        case 1:
                            statusMessage = '<span class="stats-pending">Pending</span>';
                            document.getElementById('insertButton').style.display = 'block';

                            break;
                        case 2:
                            statusMessage = '<span class="stats-pending">Requirements Issued</span>';
                            document.getElementById('insertButton').style.display = 'block';

                            break;
                        case 3:
                            statusMessage = '<span class="stats-pending">Awaiting Approval</span>';
                            break;
                        case 4:
                            statusMessage = '<span class="stats-complete">Registered</span>';

                            break;
                        case 5:
                            statusMessage = '<span class="stats-expiry">Expiry Notice</span>';
                            break;
                        default:
                            statusMessage = '<span class="stats-unknown">Unknown Status</span>';
                    }

                    // Set the innerHTML of the view-u_status element
                    document.getElementById('edit-u_status').innerHTML = statusMessage;
                    expirationDateSpan.textContent = this.getAttribute('data-expiration_date');

                    // Show the modal
                    editModal.style.display = 'block';
                });
            });

            // Close the modal when the close button is clicked
            closeModal.addEventListener('click', function() {
                editModal.style.display = 'none';
            });

            // Close the modal if user clicks outside the modal content
            window.onclick = function(event) {
                if (event.target == editModal) {
                    editModal.style.display = 'none';
                }
            }
        });
    </script> -->

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
                    <th>Boat Permit</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Boat Name</th>
                    <th>Engine Make</th>
                    <th>Serial</th>
                    <th>Gear Used</th>
                    <th>OR Number</th>
                </tr>

                <?php
                $sqlprint = "SELECT * FROM `fishingboats` WHERE `u_status`=4 AND  fb_vesseltype='".$_GET['vesseltype']."'";
                $resultprint = $conn->query($sqlprint);
                if ($resultprint->num_rows > 0) {
                    while ($row = $resultprint->fetch_assoc()) {
                        $name = $row['fb_opfname'] . ' ' . $row['fb_opmname'] . ' ' . $row['fb_oplname'] . ' ' . $row['fb_opappel'];
                        $location = $row['fb_opstreet'] . ' ' . $row['fb_opbarangay'] . ', ' . $row['fb_opmunicipal'] . ', ' . $row['fb_opprov'];
                        $boatname = $row['fb_vesselname'];
                        $engine = $row['fb_enginemake'];
                        $serial = $row['fb_serial'];
                        $gear = $row['hooklines'];

                ?>
                        <tr class="border">
                            <td><?= "PCDDN0000" . $row['id'] ."A" ?> </td>

                            <td><?= $name ?> </td>
                            <td><?= $location ?></td>
                            <td><?= $boatname ?></td>
                            <td><?= $engine ?></td>
                            <td><?= $serial ?></td>
                            <td><?= $gear ?></td>
                            <td><?= htmlspecialchars(isset($row['OR']))??"0" ?></td>
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
        <!-------------------------------------------------------------Dashboard-Contents---------------------------------------------------------------->

        <div class="dash-body">

            <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">

                <tr>
                    <td>
                        <div class="style-inline" style="display: none; justify-content: space-between">
                            <div class="animx">
                                <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ FISHING VESSEL</p>
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

                                <a href="#profile">My Profile</a>
                                <a href="#settings">Settings</a>
                                <a href="../logout.php">Logout</a>
                            </div>

                        </div>
                    </td>
                </tr>
                <div class="text-end pb-2">
                    <button type="button" class="btn btn-primary " onclick="printContent('printout')">
                        <i class="bi bi-printer-fill me-3"></i>Print Report&emsp;
                    </button>
                </div>

                <tr>
                    <td class="style-inline">
                        <input type="search" name="search" id="searchInput" class="form-control input-text header-searchbar" placeholder="Search" onkeyup="searchTable()">
                    </td>
                </tr>

                <!----------------------------------------------------table-------------------------------------------------------------------------->
                <tr>
                    <td colspan="4">
                        <center>
                            <div style="margin:auto; float: right" class="space-top">
                                <!-- <button><a>sort</a></button> -->
                            </div>

                            <div class="abc" style="padding-top: 1rem;">
                                <table width="100%" class="sub-table scrolldown animy table table-borderless small" cellspacing="0">
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
                                                BOAT NAME
                                            </th>
                                            <th class="table-headin">
                                                VESSEL TYPE
                                            </th>
                             
                                            <th class="table-headin">
                                                ENGINE MAKE
                                            </th>
                                            <th class="table-headin">
                                                SERIAL NO.
                                            </th>
                                            <th class="table-headin">
                                                HP
                                            </th>
                                            <th class="table-headin">
                                                OR NUMBER
                                            </th>
                                            <th class="table-headin">
                                                ACTIONS
                                            </th>
                                            <th class="table-headin">
                                                STATUS
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="table-con" id="dataTable">
                                        <?php
                                        $sql1 = "SELECT * FROM fishingboats WHERE fb_vesseltype='".$_GET['vesseltype']."' ORDER BY id DESC" ;
                                        $result_fishingvessels = $conn->query($sql1);
                                        if ($result_fishingvessels->num_rows > 0) {
                                            $smsNotifier = new SMSNotifier($conn);
                                            $smsNotifier->sendExpiringNotifications('fishingboats', 'id', 'fb_contact', 'Fishing Gear');

                                            while ($row = $result_fishingvessels->fetch_assoc()) {
                                               
                                                $name = $row['fb_opfname'] . ' ' . $row['fb_opmname'] . ' ' . $row['fb_oplname'];
                                                $location = $row['fb_opstreet'] . ', ' . $row['fb_opbarangay'];
                                                $status = $row['u_status'];
                                                echo '<tr class="border-bottom">';
                                                echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                                                echo '<td class="nametd">' . htmlspecialchars($name) . '</td>';
                                                echo '<td>' . htmlspecialchars($location) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fb_vesselname']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fb_vesseltype']) . '</td>';
                                         
                                                echo '<td>' . htmlspecialchars($row['fb_enginemake']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fb_serial']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fb_NT']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['fb_horsepower']) . '</td>';
                                            

                                                echo '<td><!-- Add your actions here -->
                                                    <div class="action-icons">
<!-- Edit Button -->
<i class="bi bi-pencil-square edit-icon icon-size icon-edit p-0 ps-1 pe-1 btn btn-primary fw-bold"
    data-id="' . htmlspecialchars($row['id']) . '"
    data-id-type="id"
    data-fb_opfname="' . htmlspecialchars($row['fb_opfname']) . '"
    data-fb_opmname="' . htmlspecialchars($row['fb_opmname']) . '"
    data-fb_contact="' . htmlspecialchars($row['fb_contact']) . '"
    data-fb_oplname="' . htmlspecialchars($row['fb_oplname']) . '"
    data-fb_opappel="' . htmlspecialchars($row['fb_opappel']) . '"
    data-fb_postal="' . htmlspecialchars($row['fb_postal']) . '"
    data-fb_opprov="' . htmlspecialchars($row['fb_opprov']) . '"
    data-fb_opmunicipal="' . htmlspecialchars($row['fb_opmunicipal']) . '"
    data-fb_opbarangay="' . htmlspecialchars($row['fb_opbarangay']) . '"
    data-fb_opstreet="' . htmlspecialchars($row['fb_opstreet']) . '"
    data-fb_homeport="' . htmlspecialchars($row['fb_homeport']) . '"
    data-fb_vesselname="' . htmlspecialchars($row['fb_vesselname']) . '"
    data-fb_vesseltype="' . htmlspecialchars($row['fb_vesseltype']) . '"
    data-fb_placebuilt="' . htmlspecialchars($row['fb_placebuilt']) . '"
    data-fb_yearbuilt="' . htmlspecialchars($row['fb_yearbuilt']) . '"
    data-fb_materialbuilt="' . htmlspecialchars($row['fb_materialbuilt']) . '"
    data-fb_RL="' . htmlspecialchars($row['fb_RL']) . '"
    data-fb_RB="' . htmlspecialchars($row['fb_RB']) . '"
    data-fb_RD="' . htmlspecialchars($row['fb_RD']) . '"
    data-fb_TL="' . htmlspecialchars($row['fb_TL']) . '"
    data-fb_TB="' . htmlspecialchars($row['fb_TB']) . '"
    data-fb_TD="' . htmlspecialchars($row['fb_TD']) . '"
    data-fb_GT="' . htmlspecialchars($row['fb_GT']) . '"
    data-fb_NT="' . htmlspecialchars($row['fb_NT']) . '"
    data-fb_enginemake="' . htmlspecialchars($row['fb_enginemake']) . '"
    data-fb_serial="' . htmlspecialchars($row['fb_serial']) . '"
    data-fb_horsepower="' . htmlspecialchars($row['fb_horsepower']) . '"
    data-u_email="' . htmlspecialchars($row['u_email']) . '"
    data-status="' . htmlspecialchars($row['u_status']) . '"
    data-approval_type="' . htmlspecialchars($row['approval_type']) . '"
    data-issuance_date="' . htmlspecialchars($row['issuance_date']) . '"
    data-reason="' . htmlspecialchars($row['decline_reason']) . '"
    data-expiration_date="' . htmlspecialchars($row['expiration_date']) . '"

    style="cursor: pointer;"></i>
<!-- View Button -->
<i class="bi bi-eye view-icon icon-size icon-view p-0 ps-1 pe-1 btn btn-secondary fw-bold " 
    data-id="' . htmlspecialchars($row['id']) . '"
    data-id-type="id" 
    data-fb_opfname="' . htmlspecialchars($row['fb_opfname']) . '" 
    data-fb_opmname="' . htmlspecialchars($row['fb_opmname']) . '" 
    data-fb_contact="' . htmlspecialchars($row['fb_contact']) . '"
    data-fb_oplname="' . htmlspecialchars($row['fb_oplname']) . '" 
    data-fb_opappel="' . htmlspecialchars($row['fb_opappel']) . '" 
    data-fb_postal="' . htmlspecialchars($row['fb_postal']) . '" 
    data-fb_opprov="' . htmlspecialchars($row['fb_opprov']) . '" 
    data-fb_opmunicipal="' . htmlspecialchars($row['fb_opmunicipal']) . '" 
    data-fb_opbarangay="' . htmlspecialchars($row['fb_opbarangay']) . '" 
    data-fb_opstreet="' . htmlspecialchars($row['fb_opstreet']) . '" 
    data-fb_homeport="' . htmlspecialchars($row['fb_homeport']) . '" 
    data-fb_vesselname="' . htmlspecialchars($row['fb_vesselname']) . '" 
    data-fb_vesseltype="' . htmlspecialchars($row['fb_vesseltype']) . '" 
    data-fb_placebuilt="' . htmlspecialchars($row['fb_placebuilt']) . '" 
    data-fb_yearbuilt="' . htmlspecialchars($row['fb_yearbuilt']) . '" 
    data-fb_materialbuilt="' . htmlspecialchars($row['fb_materialbuilt']) . '" 
    data-fb_RL="' . htmlspecialchars($row['fb_RL']) . '" 
    data-fb_RB="' . htmlspecialchars($row['fb_RB']) . '" 
    data-fb_RD="' . htmlspecialchars($row['fb_RD']) . '" 
    data-fb_TL="' . htmlspecialchars($row['fb_TL']) . '" 
    data-fb_TB="' . htmlspecialchars($row['fb_TB']) . '" 
    data-fb_TD="' . htmlspecialchars($row['fb_TD']) . '" 
    data-fb_GT="' . htmlspecialchars($row['fb_GT']) . '" 
    data-fb_NT="' . htmlspecialchars($row['fb_NT']) . '" 
    data-reason="' . htmlspecialchars($row['decline_reason']) . '"

    data-fb_enginemake="' . htmlspecialchars($row['fb_enginemake']) . '" 
    data-fb_serial="' . htmlspecialchars($row['fb_serial']) . '" 
    data-fb_horsepower="' . htmlspecialchars($row['fb_horsepower']) . '" 
    data-status="' . htmlspecialchars($row['u_status']) . '"
    data-view-only="true" 
    style="cursor: pointer;"></i>

                                                        <i class="bi bi-trash delete-icon icon-size icon-delete p-0 ps-1 pe-1 btn btn-danger fw-bold" 
                                                        style="cursor: pointer;" 
                                                        onclick="confirmDelete(' . htmlspecialchars($row['id']) . ', \'fishingboat\')"></i>

                                                    </div>
                                                
                                                </td>';
                                                echo '<td>';
                                                if ($status == 1) {
                                                    echo '<span class="stats-pending">Pending</span>';
                                                } elseif ($status == 2) {
                                                    echo '<span class="stats-pending">Requirements Issued</span>';
                                                } elseif ($status == 3) {
                                                    echo '<span class="stats-pending">Awaiting Approval</span>';
                                                } elseif ($status == 4) {
                                                    echo '<span class="stats-complete">Registered</span>';
                                                } elseif ($status == 5) {
                                                    echo '<span class="stats-expiry">Expiry Notice</span>';
                                                }elseif ($status == 6) {
                                                    echo '<span class="stats-expiry">Declined</span>';
                                                }
                                                echo '</td>';

                                                echo '</tr>';
                                            }
                                        } else {
                                            echo '<tr><td colspan="20">No records found</td></tr>';
                                        }

                                        ?>

                                    </tbody>

                                </table>
                            </div>
                        </center>
                    </td>
                </tr>
                <!------------------------------------------------------------------------------------------------------------------edit-modal--------------------------------------------------------------------------------------------------->
                <div id="editModal" class="modal animy">
                    <div class="modal-content">
                        <div>
                            <span class="close">&times;</span>
                        </div>
                        <div>
                            <div style="margin-inline:10px">
                                <h3 class="modal-head">Edit Fishing Boat Details</h3>
                            </div>
                        </div>

                        <div style="margin-inline:10px">
                            <div class="modal-status">Permit Status: <span id="edit-u_status"></span></div>
                        </div>

                        <form id="editForm" action="functions/update.php" method="post">
                            <div style="max-height:70vh;overflow:auto;">
                                <div style="display:flex;" class="space-top">
                                    <div style="margin-inline:10px">
                                        <input type="hidden" name="id" id="edit-id">
                                        <input type="hidden" name="form_type" value="fishingboats">
                                        <!-- Personal Information -->
                                        <div class="spacing">
                                            <label class="modal-label" for="fb_opfname">First Name:</label>
                                            <input class="input-xx" type="text" name="fb_opfname" id="edit-fb_opfname">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_opmname">Middle Name:</label>
                                            <input class="input-xx" type="text" name="fb_opmname" id="edit-fb_opmname">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_oplname">Last Name:</label>
                                            <input class="input-xx" type="text" name="fb_oplname" id="edit-fb_oplname">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_opappel">Appellation:</label>
                                            <input class="input-xx" type="text" name="fb_opappel" id="edit-fb_opappel">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_contact">Contact No.:</label>
                                            <input class="input-xx" type="text" name="fb_contact" id="edit-fb_contact">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="approval_type">Approval Type:</label>
                                            <input class="input-xx" type="text" name="approval_type" id="edit-approval_type">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_postal">Postal:</label>
                                            <input class="input-xx" type="text" name="fb_postal" id="edit-fb_postal">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_opprov">Province:</label>
                                            <input class="input-xx" type="text" name="fb_opprov" id="edit-fb_opprov">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_opmunicipal">Municipal:</label>
                                            <input class="input-xx" type="text" name="fb_opmunicipal" id="edit-fb_opmunicipal">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_opbarangay">Baranggay:</label>
                                            <input class="input-xx" type="text" name="fb_opbarangay" id="edit-fb_opbarangay">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_opstreet">Street:</label>
                                            <input class="input-xx" type="text" name="fb_opstreet" id="edit-fb_opstreet">
                                        </div>
                                        <!-- Boat Information -->
                                        <div class="spacing">
                                            <label class="modal-label" for="fb_homeport">Home Port:</label>
                                            <input class="input-xx" type="text" name="fb_homeport" id="edit-fb_homeport">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_vesselname">Vessel Name:</label>
                                            <input class="input-xx" type="text" name="fb_vesselname" id="edit-fb_vesselname">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_vesseltype">Vessel Type:</label>
                                            <input class="input-xx" type="text" name="fb_vesseltype" id="edit-fb_vesseltype">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_placebuilt">Place Built:</label>
                                            <input class="input-xx" type="text" name="fb_placebuilt" id="edit-fb_placebuilt">
                                        </div>
                                        </div>
                                        <div style="margin-inline:10px">
                                        <div class="spacing">
                                            <label class="modal-label" for="fb_yearbuilt">Year Built:</label>
                                            <input class="input-xx" type="text" name="fb_yearbuilt" id="edit-fb_yearbuilt">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_materialbuilt">Material Built:</label>
                                            <input class="input-xx" type="text" name="fb_materialbuilt" id="edit-fb_materialbuilt">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_RL">Registered Length:</label>
                                            <input class="input-xx" type="text" name="fb_RL" id="edit-fb_RL">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_RB">Registered Breadth:</label>
                                            <input class="input-xx" type="text" name="fb_RB" id="edit-fb_RB">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_RD">Registered Depth:</label>
                                            <input class="input-xx" type="text" name="fb_RD" id="edit-fb_RD">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_TL">Total Length:</label>
                                            <input class="input-xx" type="text" name="fb_TL" id="edit-fb_TL">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_TB">Total Breadth:</label>
                                            <input class="input-xx" type="text" name="fb_TB" id="edit-fb_TB">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_TD">Total Depth:</label>
                                            <input class="input-xx" type="text" name="fb_TD" id="edit-fb_TD">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_GT">Gross Tonnage:</label>
                                            <input class="input-xx" type="text" name="fb_GT" id="edit-fb_GT">
                                        </div>
                                    </div>
                                    <div style="margin-inline:10px">
                                        <div class="spacing">
                                            <label class="modal-label" for="fb_NT">Net Tonnage:</label>
                                            <input class="input-xx" type="text" name="fb_NT" id="edit-fb_NT">
                                        </div>

                                        <!-- Engine Information -->
                                        <div class="spacing">
                                            <label class="modal-label" for="fb_enginemake">Engine Make:</label>
                                            <input class="input-xx" type="text" name="fb_enginemake" id="edit-fb_enginemake">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_serial">Engine Serial Number:</label>
                                            <input class="input-xx" type="text" name="fb_serial" id="edit-fb_serial">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_horsepower">Horsepower:</label>
                                            <input class="input-xx" type="text" name="fb_horsepower" id="edit-fb_horsepower">
                                        </div>

                                        <!-- User Information -->
                                        <div class="spacing hidden">
                                            <label class="modal-label" for="u_email">User Email:</label>
                                            <input class="input-xx" type="text" name="u_email" id="edit-u_email">
                                        </div>

                                      

                                       

                                        <div class="spacing">
                                            <label class="modal-label" for="reason">Reason:</label>
                                            <input class="input-xx" type="text" name="reason" id="edit-reason">
                                        </div>

                                      

                                    </div>
                                </div>

                                
                            </div>
                            <div style="display:flex;justify-content:end;">
                                    <div class="spacing">
                                        <button type="button" class="btn btn-secondary" id="updateButton" data-action="update">Update</button>
                                    </div>

                                    <div class="spacing">
                                    <button type="button" name="action" class="btn btn-primary" id="insertButton"
                                    data-action="send_for_approval">For Approval</button>
                                    </div>

                                    <div class="spacing">
                                        <button type="button" class="btn btn-primary" id="renewButton" data-action="renew">Renew</button>
                                    </div>

                                    <input type="text" name="id" id="edit-id2" placeholder="Enter FF ID" required style="width:4%">
                                    <button type="button" name="gen" class="btn btn-success" onclick="generateFV('generate_fvm/generate.php','id')">
                                        <i class="bi bi-file-earmark-arrow-down"></i>
                                    </button>
                                 

                                </div>
                        </form>
                    </div>
                </div>




                <!-------------------------------------------------------------------------------------------------view-modal-------------------------------------------------------------------------------------------------------------------->


                <div id="viewModal" class="modal animy">
                    <div class="modal-content">
                        <div>
                            <span class="close">&times;</span>
                        </div>
                        <div>
                            <div style="margin-inline:10px">
                                <h3 class="modal-head">view Fishing Boat Details</h3>
                            </div>
                        </div>

                        <div style="margin-inline:10px">
                            <div class="modal-status">Permit Status: <span id="view-u_status"></span></div>
                        </div>

                        <form id="viewForm" action="functions/update.php" method="post">
                            <div style="max-height:70vh;overflow:auto;">
                                <div style="display:flex;" class="space-top">
                                    <div style="margin-inline:10px">
                                        <input type="hidden" name="id" id="view-id">

                                        <!-- Personal Information -->
                                        <div class="spacing">
                                            <label class="modal-label" for="fb_opfname">First Name:</label>
                                            <input class="input-xx" type="text" name="fb_opfname" id="view-fb_opfname">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_opmname">Middle Name:</label>
                                            <input class="input-xx" type="text" name="fb_opmname" id="view-fb_opmname">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_oplname">Last Name:</label>
                                            <input class="input-xx" type="text" name="fb_oplname" id="view-fb_oplname">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_opappel">Appellation:</label>
                                            <input class="input-xx" type="text" name="fb_opappel" id="view-fb_opappel">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_contact">Contact No.:</label>
                                            <input class="input-xx" type="text" name="fb_contact" id="view-fb_contact">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="approval_type">Approval Type:</label>
                                            <input class="input-xx" type="text" name="approval_type" id="view-approval_type">
                                        </div>

                                        <!-- Boat Information -->
                                        <div class="spacing">
                                            <label class="modal-label" for="fb_homeport">Home Port:</label>
                                            <input class="input-xx" type="text" name="fb_homeport" id="view-fb_homeport">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_vesselname">Vessel Name:</label>
                                            <input class="input-xx" type="text" name="fb_vesselname" id="view-fb_vesselname">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_vesseltype">Vessel Type:</label>
                                            <input class="input-xx" type="text" name="fb_vesseltype" id="view-fb_vesseltype">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_placebuilt">Place Built:</label>
                                            <input class="input-xx" type="text" name="fb_placebuilt" id="view-fb_placebuilt">
                                        </div>
                                        </div>
                                        <div style="margin-inline:10px">
                                        <div class="spacing">
                                            <label class="modal-label" for="fb_yearbuilt">Year Built:</label>
                                            <input class="input-xx" type="text" name="fb_yearbuilt" id="view-fb_yearbuilt">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_materialbuilt">Material Built:</label>
                                            <input class="input-xx" type="text" name="fb_materialbuilt" id="view-fb_materialbuilt">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_RL">Registered Length:</label>
                                            <input class="input-xx" type="text" name="fb_RL" id="view-fb_RL">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_RB">Registered Breadth:</label>
                                            <input class="input-xx" type="text" name="fb_RB" id="view-fb_RB">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_RD">Registered Depth:</label>
                                            <input class="input-xx" type="text" name="fb_RD" id="view-fb_RD">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_TL">Total Length:</label>
                                            <input class="input-xx" type="text" name="fb_TL" id="view-fb_TL">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_TB">Total Breadth:</label>
                                            <input class="input-xx" type="text" name="fb_TB" id="view-fb_TB">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_TD">Total Depth:</label>
                                            <input class="input-xx" type="text" name="fb_TD" id="view-fb_TD">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_GT">Gross Tonnage:</label>
                                            <input class="input-xx" type="text" name="fb_GT" id="view-fb_GT">
                                        </div>
                                    </div>
                                    <div style="margin-inline:10px">
                                        <div class="spacing">
                                            <label class="modal-label" for="fb_NT">Net Tonnage:</label>
                                            <input class="input-xx" type="text" name="fb_NT" id="view-fb_NT">
                                        </div>

                                        <!-- Engine Information -->
                                        <div class="spacing">
                                            <label class="modal-label" for="fb_enginemake">Engine Make:</label>
                                            <input class="input-xx" type="text" name="fb_enginemake" id="view-fb_enginemake">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_serial">Engine Serial Number:</label>
                                            <input class="input-xx" type="text" name="fb_serial" id="view-fb_serial">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fb_horsepower">Horsepower:</label>
                                            <input class="input-xx" type="text" name="fb_horsepower" id="view-fb_horsepower">
                                        </div>

                                        <!-- User Information -->
                                        <div class="spacing hidden">
                                            <label class="modal-label" for="u_email">User Email:</label>
                                            <input class="input-xx" type="text" name="u_email" id="view-u_email">
                                        </div>

                                      

                                       

                                        <div class="spacing">
                                            <label class="modal-label" for="reason">Reason:</label>
                                            <input class="input-xx" type="text" name="reason" id="view-reason">
                                        </div>

                                      

                                    </div>
                                </div>

                                
                            </div>
                            
                        </form>
                    </div>
                </div>


            </table>



        </div>
    </div>
    <script>
       document.querySelectorAll("button[type='button']").forEach(button => {
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
                    html: '$message',
                    icon: '$message_type',
                    confirmButtonText: 'OK',
                  
                });";

            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        }
        ?>

    </script>

    <script>
        function confirmDelete(id, type) {
            Swal.fire({
                title: 'Delete Fishing Vessel Record?',
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