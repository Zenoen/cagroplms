<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="../css/dash1.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/animation.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/edit_modal.css">
     <link rel="stylesheet" type="text/css" href="../css/customs.css">
    <link rel="stylesheet" href="../css/bootstrap/icons/font/bootstrap-icons.css"> 
    <link rel="stylesheet" href="../includes/sweetalert2.min.css">
    <script src="../includes/sweetalert2.min.js"></script>
    <script src="../js/global/prof-drp.js" defer></script>
    <script src="../js/admin/edit.js" defer></script>
    <script src="../js/admin/view.js" defer></script>
    <script src="../js/global/search.js" defer></script>
    <script src="../js/admin/button-disabler.js" defer></script>
    <script src="../js/admin/permit_status.js" defer></script>

    <title>Client Accounts</title>
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

            <tr >
                <td>
                    <div class="style-inline" style="display: none; justify-content: space-between">
                        <div class="animx">
                            <p style="color: #084d87; font-weight: bold;" class="dhead">CLIENT ACCOUNTS</p>
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
                                <img src="../img/icons/arrow-down.svg" style="height:20px;width:20px; margin:auto;"
                                    class="space selector">
                            </div>

                        </div>

                        <div class="dropdown-content-prof" id="dropdown-prof">
                            <div class="prof-divider">
                                <img src="../img/user.png" class="space img-profile selector">
                                <div style="display: block; margin: auto">
                                    <p style="color: black; font-size: 15px; font-weight: bold; text-wrap: wrap;"
                                        class="space"><?php echo $userData['lname'] . ', ' . $userData['fname'] ?></p>
                                </div>
                            </div>

                            <a href="profile.php">My Profile</a>
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

            <!---------------------------------------------------------------------------------------------------table------------------------------------------------------------------------------------------------>
            <tr>
                <td>
                    <center>
                        <div style="margin:auto; float: right" class="space-top">
                            <!-- <button><a>sort</a></button> -->
                        </div>

                        <div class="abc" style="padding-top: 1rem;">
                            <table width="100%" class="small sub-table scrolldown animy table table-borderless" cellspacing="0">
                                <thead class="headert bg-primary text-white ">
                                    <tr>
                                        <th class="table-headin">
                                            ID
                                        </th>

                                        <th class="table-headin">
                                            NAME
                                        </th>

                                        <th class="table-headin">
                                            EMAIL
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
                                    if ($result_clients->num_rows > 0) {
                                        while ($row = $result_clients->fetch_assoc()) {

                                            $ffid = $row["u_id"];
                                            $name = $row['u_fname'] . ' ' . $row['u_lname'];
                                            $email = $row['u_email'];

                                            $status = $row['verified'];

                                            echo '<tr class="border-bottom">';
                                            echo '<td>' . htmlspecialchars($row['u_id']) . '</td>';
                                            echo '<td class="nametd">' . htmlspecialchars($name) . '</td>';
                                            echo '<td>' . htmlspecialchars($email) . '</td>';

                                            echo '<td>
                                                
                                                    <div class="action-icons small">
                                                        <!-- Verify Button -->
                                                        <i class="bi bi-check-circle p-0  ps-1 pe-1 btn btn-primary fw-bold verify-button"             
                                                            data-id="' . htmlspecialchars($row['u_id']) . '" 
                                                            data-name="' . htmlspecialchars($name) . '"
                                                        style="cursor: pointer;"></i>

                                                        <!-- View Button -->
                                                        <i class="bi bi-eye view-icon icon-size icon-view p-0 ps-1 pe-1  btn btn-secondary fw-bold"
                                                            data-id="' . htmlspecialchars($row['u_id']) . '"
                                                            data-fname="' . htmlspecialchars($row['u_fname']) . '"
                                                        style="cursor: pointer;"></i>
                                                        
                                                        <!-- Delete Button -->
                                                        <i class="bi bi-trash delete-icon icon-size icon-delete p-0 ps-1 pe-1 btn btn-danger fw-bold" 
                                                        style="cursor: pointer;" 
                                                        onclick="confirmDelete(' . htmlspecialchars($row['u_id']) . ', \'client\')"></i>

                                                    </div>
                                                </td>';

                                            echo '<td>';
                                            //status
                                            if ($status == 1) {
                                                echo '<span class="stats-complete">Verified</span>';

                                            } else {
                                                echo '<span class="stats-pending">Pending</span>';
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

            <!-------------------------------------------------------------------------------------------------view-modal-------------------------------------------------------------------------------------------------------------------->

            <div id="viewModal" class="modal animy">
                <div class="modal-content">
                    <div style="float:right">
                        <div>
                            <span class="viewclose">&times;</span>
                        </div>
                    </div>

                    <div>
                        <div style="margin-inline:10px">
                            <h3 class="modal-head">View Client Details</h3>
                        </div>
                    </div>

                    <div style="margin-inline:10px">
                        <div class="modal-status">Permit Status: <span class=""></span><!--change the span class-->
                        </div>
                    </div>


                    <div class="space-top">
                        <div style="margin-inline:10px">
                            <input type="hidden" name="id" id="data-id">

                            <div class="spacing">
                                <label class="modal-label" for="view-fname">First Name:</label>
                                <input class="input-xx" type="text" id="data-fname" readonly>
                            </div>

                            <div class="spacing">
                                <label class="modal-label" for="view-mname">Middle Name:</label>
                                <input class="input-xx" type="text" id="view-mname" readonly>
                            </div>

                            <div class="spacing">
                                <label class="modal-label" for="view-lname">Email:</label>
                                <input class="input-xx" type="text" id="view-lname" readonly>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-------------------------------------------------------------------------------------------------scripts-------------------------------------------------------------------------------------------------------------------->
    <script>
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

    <script src="functions/js/verify.js" defer></script>

    <script>
        function confirmDelete(id, type) {
            Swal.fire({
                title: 'Delete Fisherfolk Record?',
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
                    xhr.onload = function () {
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