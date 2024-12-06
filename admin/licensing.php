<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="../css/dash1.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/animation.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/edit_modal.css">

    <link rel="stylesheet" type="text/css" href="../css/modal_license.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/customs.css"> -->
    <link rel="stylesheet" href="../css/bootstrap/icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../includes/sweetalert2.min.css">
    <script src="../includes/sweetalert2.min.js"></script>
    <script src="../js/global/prof-drp.js" defer></script>
    <script src="../js/admin/search.js" defer></script>
    <script src="../js/admin/edit-license.js" defer></script>
    <script src="../js/admin/view-license.js" defer></script>

    <title>Licensing</title>


</head>

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
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
                    <tr>
                        <td>
                            <div class="style-inline" style="display: none; justify-content: space-between">
                                <div class="animx">
                                    <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ LICENSING</p>
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
                                        <img src="../img/sus.jpg" class="space img-profile">
                                        <div style="display: block; margin: auto">
                                            <p style="color: black; font-size: 15px; font-weight: bold" class="space">
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

                    <tr>
                        <td class="style-inline">
                            <input type="search" name="search" id="searchInput" class="form-control input-text header-searchbar"
                                placeholder="Search" onkeyup="searchTable()">
                        </td>
                    </tr>

                    <!----------------------------------------------------table-------------------------------------------------------------------------->
                    <tr>
                        <td>
                            <center>
                                <div style="margin:auto; float: right" class="space-top">
                                    <!-- <button><a>sort</a></button> -->
                                </div>
                                <div class="abc" style="padding-top: 1rem;">
                                    <table width="100%" class="sub-table scrolldown animy small  table-borderless" cellspacing="0">
                                        <thead class="headert bg-primary text-white">
                                            <tr>
                                                <th class="table-headin">
                                                    ID
                                                </th>
                                                <th class="table-headin">
                                                    GENDER
                                                </th>
                                                <th class="table-headin">
                                                    NAME
                                                </th>
                                                <th class="table-headin">
                                                    BIRTHDAY
                                                </th>
                                                <th class="table-headin">
                                                    ADDRESS
                                                </th>
                                                <th class="table-headin">
                                                    RESTRICTIONS
                                                </th>
                                                <th class="table-headin">
                                                    TYPE
                                                </th>
                                                <th class="table-headin">
                                                    ISSUED
                                                </th>
                                                <th class="table-headin">
                                                    EXPIRY
                                                </th>
                                                <th class="table-headin">
                                                    STATUS
                                                </th>
                                                <th class="table-headin">
                                                    ACTIONS
                                                </th>
                                                <!-- <th class="table-headin">
                                                    GENERATE
                                                </th> -->
                                            </tr>
                                        </thead>

                                        <tbody class="table-con" id="dataTable">

                                            <?php
                                            if ($result_licensing->num_rows > 0) {



                                                while ($row = $result_licensing->fetch_assoc()) {


                                                    $emailNotifier = new LicenseSMSNotifier($conn);
                                                    $emailNotifier->sendNotificationsByEmail($row["client_id"], $row['u_email'], $row['expiration_date']);



                                                    $ffid = $row["client_id"];
                                                    $name = $row['client_fname'] . ' ' . $row['client_mname'] . ' ' . $row['client_lname'];
                                                    $location = $row['client_street'] . ', ' . $row['client_brgy'] . ', ' . $row['client_municipal'] . ', ' . $row['client_municipal'];
                                                    $license_status = $row['license_status'];
                                                    echo '<tr class="border-bottom">';
                                                    echo '<td>' . htmlspecialchars($row['client_id']) . '</td>';
                                                    echo '<td>' . htmlspecialchars($row['client_gender']) . '</td>';
                                                    echo '<td>' . htmlspecialchars($name) . '</td>';
                                                    echo '<td>' . htmlspecialchars($row['client_dob']) . '</td>';
                                                    echo '<td>' . htmlspecialchars($location) . '</td>';
                                                    echo '<td>' . htmlspecialchars('') . '</td>';
                                                    echo '<td>' . htmlspecialchars($row['approval_type']) . '</td>';
                                                    echo '<td>' . htmlspecialchars($row['issuance_date']) . '</td>';
                                                    echo '<td>' . htmlspecialchars($row['expiration_date']) . '</td>';
                                                    echo '<td>';

                                                    if ($license_status == 1) {
                                                        echo '<span class="stats-complete">Licensed</span>';
                                                    } elseif ($license_status == 2) {
                                                        echo '<span class="stats-expiry">Expiry Notice</span>';
                                                    } else {
                                                        echo '<span class="stats-pending">Unlicense</span>';
                                                    }
                                                    echo '</td>';

                                                    echo '<td><!-- Add your actions here -->

    <div class="action-icons">

        <i class="bi bi-pencil-square edit-icon icon-size icon-edit p-0 ps-1 pe-1 btn btn-primary fw-bold" 
        data-id="' . htmlspecialchars($row['client_id']) .
                                                        '" data-id-type="client_id" 
        data-fname="' . htmlspecialchars($row['client_fname']) .
                                                        '" data-mname="' . htmlspecialchars($row['client_mname']) .
                                                        '" data-lname="' . htmlspecialchars($row['client_lname']) .
                                                        '" data-gender="' . htmlspecialchars($row['client_gender']) .
                                                        '" data-dob="' . htmlspecialchars($row['client_dob']) .
                                                        '" data-province="' . htmlspecialchars($row['client_prov']) .
                                                        '" data-municipal="' . htmlspecialchars($row['client_municipal']) .
                                                        '" data-street="' . htmlspecialchars($row['client_street']) .
                                                        '" data-barangay="' . htmlspecialchars($row['client_brgy']) .
                                                        '" data-or="' . htmlspecialchars($row['client_OR']) .
                                                        '" data-approval_type="' . htmlspecialchars($row['approval_type']) .
                                                        '" data-email="' . htmlspecialchars($row['u_email']) .
                                                        '" data-issuance_date="' . htmlspecialchars($row['issuance_date']) .
                                                        '" data-expiration_date="' . htmlspecialchars($row['expiration_date']) .
                                                        '" data-license_status="' . htmlspecialchars($row['license_status']) .
                                                        '" style="vertical-align: middle; cursor: pointer;"></i>

        <i class="bi bi-eye view-icon icon-size icon-view p-0 ps-1 pe-1 btn btn-secondary fw-bold" 
        data-id="' . htmlspecialchars($row['client_id']) .
                                                        '" data-fname="' . htmlspecialchars($row['client_fname']) .
                                                        '" data-mname="' . htmlspecialchars($row['client_mname']) .
                                                        '" data-lname="' . htmlspecialchars($row['client_lname']) .
                                                        '" data-gender="' . htmlspecialchars($row['client_gender']) .
                                                        '" data-dob="' . htmlspecialchars($row['client_dob']) .
                                                        '" data-province="' . htmlspecialchars($row['client_prov']) .
                                                        '" data-municipal="' . htmlspecialchars($row['client_municipal']) .
                                                        '" data-street="' . htmlspecialchars($row['client_street']) .
                                                        '" data-barangay="' . htmlspecialchars($row['client_brgy']) .
                                                        '" data-or="' . htmlspecialchars($row['client_OR']) .
                                                        '" data-approval_type="' . htmlspecialchars($row['approval_type']) .
                                                        '" data-email="' . htmlspecialchars($row['u_email']) .
                                                        '" data-issuance_date="' . htmlspecialchars($row['issuance_date']) .
                                                        '" data-expiration_date="' . htmlspecialchars($row['expiration_date']) .
                                                        '" data-license_status="' . htmlspecialchars($row['license_status']) .
                                                        '" style="vertical-align: middle; cursor: pointer;"></i>

        <i class="bi bi-trash delete-icon icon-size icon-delete p-0 ps-1 pe-1 btn btn-danger fw-bold" 
        style="cursor: pointer;" 
        onclick="confirmDelete(' . htmlspecialchars($row['client_id']) . ', \'licensing\')"></i>

        <button class="gen-license-btn p-0 ps-1 pe-1 btn btn-success fw-bold" data-id="' . htmlspecialchars($row['client_id']) . '">
            <i class="bi bi-file-earmark-arrow-down"></i>
        </button>

    </div>

</td>';


                                                    // echo '<td><!-- status -->
                                                    //         <button class="gen-license-btn btn-primary" data-id="' . htmlspecialchars($row['client_id']) . '"><i class="bi bi-file-earmark-arrow-down"></i></button>
                                                    //     </td>';
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
                    <div id="editModal" class="modal animy">
                        <div class="modal-content">
                            <div>
                                <span class="close">&times;</span>
                            </div>
                            <div>
                                <div style="margin-inline:10px">
                                    <h3 class="modal-head">Edit Licensing Details</h3>
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
                                                <label class="modal-label" for="approval_type">Approval Type:</label>
                                                <input class="input-xx" type="text" name="approval_type" id="edit-approval_type" value="">
                                            </div>

                                            <div class="spacing">
                                                <label class="modal-label" for="uemail">Email:</label>
                                                <input class="input-xx" type="email" name="uemail" id="edit-email">
                                            </div>



                                        </div>

                                        <div style="margin-inline:10px">



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
                                                <label class="modal-label" for="OR">OR Number:</label>
                                                <input class="input-xx" type="text" name="OR" id="edit-OR">
                                            </div>


                                            <input type="hidden" name="form_type" value="licensing">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">

                                    <div class="spacing">
                                        <button type="button" name="action" class="btn btn-secondary" id="updateButton" data-action="update">Update</button>
                                    </div>


                                    <div class="spacing">
                                        <button type="button" name="action" class="btn btn-primary" id="renewButton" data-action="renew">Renew</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div id="viewModal" class="modal animy">
                        <div class="modal-content">
                            <div>
                                <span class="viewclose">&times;</span>
                            </div>
                            <div>
                                <div style="margin-inline:10px">
                                    <h3 class="modal-head">View Licensing Details</h3>
                                </div>
                            </div>

                            <div style="margin-inline:10px">
                                <div class="modal-status">Permit Status: <span id="view-status"></span></div>
                            </div>

                            <form id="viewForm" action="functions/view.php" method="post">
                                <div>
                                    <div style="display:flex;" class="space-top">

                                        <div style="margin-inline:10px">
                                            <input type="hidden" name="id" id="view-id">

                                            <div style="margin:auto" class="spacing">
                                                <label class="modal-label" for="fname">First Name:</label>
                                                <input class="input-xx" type="text" name="fname" id="view-fname" disabled>
                                            </div>

                                            <div class="spacing">
                                                <label class="modal-label" for="mname">Middle Name:</label>
                                                <input class="input-xx" type="text" name="mname" id="view-mname" disabled>
                                            </div>

                                            <div class="spacing">
                                                <label class="modal-label" for="lname">Last Name:</label>
                                                <input class="input-xx" type="text" name="lname" id="view-lname" disabled>
                                            </div>

                                            <div class="spacing">
                                                <label class="modal-label" for="approval_type">Approval Type:</label>
                                                <input class="input-xx" type="text" name="approval_type" id="view-approval_type" disabled>
                                            </div>

                                            <div class="spacing">
                                                <label class="modal-label" for="uemail">Email:</label>
                                                <input class="input-xx" type="email" name="uemail" id="view-email" disabled>
                                            </div>

                                        </div>

                                        <div style="margin-inline:10px">



                                            <div class="spacing">
                                                <label class="modal-label" for="province">Province:</label>
                                                <input class="input-xx" type="text" name="province" id="view-province" disabled>
                                            </div>

                                            <div class="spacing">
                                                <label class="modal-label" for="municipal">Municipal:</label>
                                                <input class="input-xx" type="text" name="municipal" id="view-municipal" disabled>
                                            </div>

                                            <div class="spacing">
                                                <label class="modal-label" for="barangay">Barangay:</label>
                                                <input class="input-xx" type="text" name="barangay" id="view-barangay" disabled>
                                            </div>

                                            <div class="spacing">
                                                <label class="modal-label" for="street">Street:</label>
                                                <input class="input-xx" type="text" name="street" id="view-street" disabled>
                                            </div>

                                            <div class="spacing">
                                                <label class="modal-label" for="OR">OR Number:</label>
                                                <input class="input-xx" type="text" name="OR" id="view-OR" disabled>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div id="bbmodal" class="modal">
                        <div class="modal-content">

                            <div>
                                <span class="close bbclose">&times;</span>
                            </div>

                            <h2 class="modal-heading">RESTRICTIONS</h2>
                            <!-- <form id="restrictionsForm" action="license/license_ff.php" method="POST"> -->
                            <form id="restrictionsForm" action="generate_license/generate_license_fw.php" method="POST">
                                <div style="display:block;">
                                    <div class="fg-fields-check-slim">
                                        <label class="check-box">(1) SUBSISTENCE
                                            <input type="checkbox" class="cbox" name="restrictions[]" value="1">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="check-box">(2) FISHWORKER
                                            <input type="checkbox" class="cbox" name="restrictions[]" value="2">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="check-box">(3) COMMERCIAL
                                            <input type="checkbox" class="cbox" name="restrictions[]" value="3">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="check-box">(4) TRAPS AND WEIR
                                            <input type="checkbox" class="cbox" name="restrictions[]" value="4">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="check-box">(5) AQUACULTURE
                                            <input type="checkbox" class="cbox" name="restrictions[]" value="5">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="check-box">(6) MARICULTURE
                                            <input type="checkbox" class="cbox" name="restrictions[]" value="6">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="check-box">(7) RECREATIONAL/SPORTS FISHING
                                            <input type="checkbox" class="cbox" name="restrictions[]" value="7">
                                            <span class="checkmark"></span>
                                        </label>

                                        <label class="check-box">(8) EXPERIMENT AND RESEARCH
                                            <input type="checkbox" class="cbox" name="restrictions[]" value="8">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <button type="submit"
                                        style="margin:auto; width:100%; cursor: pointer; background-color: #58A773;"
                                        class="cox buttonskie">
                                        CONTINUE TO GENERATE LICENSE
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </table>

            </div>

        </div>
    </div>
    <!--ionicons-script-->


    <script>
        document.querySelectorAll("button[name='action']").forEach(button => {
            button.addEventListener("click", function() {
                // Get the dynamic value from the button's data-action attribute
                const actionValue = this.getAttribute("data-action");

                // Show confirmation alert
                Swal.fire({
                    title: 'Are you sure?',
                    text: `Do you want to proceed with the ${actionValue} action?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: `Yes, ${actionValue}`,
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

        function confirmDelete(id, type) {
            Swal.fire({
                title: 'Delete License Record?',
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


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = document.getElementById("bbmodal");
            var closeButton = document.querySelector(".bbclose"); // Correctly selecting the close button
            var form = document.getElementById("restrictionsForm");
            var hiddenInput = document.createElement("input");
            hiddenInput.type = "hidden";
            hiddenInput.name = "user_id";
            form.appendChild(hiddenInput);

            // Event listener for the "Generate" buttons
            var generateButtons = document.querySelectorAll(".gen-license-btn");
            generateButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    var userId = this.getAttribute("data-id");
                    hiddenInput.value = userId; // Set the user ID in the hidden input
                    modal.style.display = "flex";
                    modal.classList.add("active");
                });
            });

            // Fixing the close button event listener
            closeButton.onclick = function() {
                modal.style.display = "none";
                modal.classList.remove("active");
            };

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                    modal.classList.remove("active");
                }
            };
        });
    </script>

</body>

</html>