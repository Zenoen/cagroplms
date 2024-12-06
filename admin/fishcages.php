<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="../css/dash1.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/animation.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/edit_modal.css">

    <link rel="stylesheet" href="../css/bootstrap/icons/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/customs.css"> -->
    <link rel="stylesheet" href="../includes/sweetalert2.min.css">
    <script src="../includes/sweetalert2.min.js"></script>
    <script src="../js/global/prof-drp.js" defer></script>
    <script src="../js/admin/edit-fishcages.js" defer></script>
    <script src="../js/admin/view-fishcages.js" defer></script>
    <script src="../js/global/search.js" defer></script>
    <script src="../js/admin/button-disabler.js" defer></script>
    <script src="../js/admin/permit_status.js" defer></script>

    <title>Fisherfolks</title>


</head>

<body>
<!-- START -->
<script>

function generateFC(genPath,genId) {

  const idd = document.getElementById("edit-id2").value;

  if (idd.trim() !== "") {
      // Prepare the data to be sent in the POST request as a URL-encoded string
      const data = `${genId}=${encodeURIComponent(idd)}`;
    // alert(data);
      fetch(genPath, {
              method: "POST",
              headers: {
                  'Content-Type': 'application/x-www-form-urlencoded', // Set the content type to URL-encoded
              },
              body: data // Send the encoded data
          })
          .then(response => {
              const contentType = response.headers.get("Content-Type");
              if (contentType && contentType.includes("application/pdf")) {
                  return response.blob();
              }
              return response.json();
          })
          .then(data => {
              if (data instanceof Blob) {
                  const url = URL.createObjectURL(data);
                  window.open(url, "_blank");
              } else {
                  console.log("Success:", data);
                  alert("Form submitted successfully.");
              }
          });
          // .catch(error => {
          //     console.error("Error:", error);
          //     alert("An error occurred while submitting.");
          // });
  } else {
      alert("Please enter a valid  ID.");
  }
};
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
                    <th>Name</th>
                    <th>Address</th>
                    <th>OR Number</th>
                </tr>

                <?php
                $sqlprint = "SELECT * FROM `fishcage` WHERE `u_status`=4;";
                $resultprint = $conn->query($sqlprint);
                if ($resultprint->num_rows > 0) {
                    while ($row = $resultprint->fetch_assoc()) {
                        $name = $row['fc_fname'] . ' ' . $row['fc_mname'] . ' ' . $row['fc_lname'] . ' ' . $row['fc_appell'];
                        $location = $row['fc_street'] . ' ' . $row['fc_brgy'] . ', ' . $row['fc_municipal'] . ', ' . $row['fc_prov'];

                ?>
                        <tr class="border">
                            <td><?= "PCDDN0000-" . $row['id'] ?> </td>

                            <td><?= $name ?> </td>
                            <td><?= $location ?></td>
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
        <!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

        <div class="dash-body">

            <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">

                <tr>
                    <td>
                        <div class="style-inline" style="display: none; justify-content: space-between">
                            <div class="animx">
                                <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ FISHING CAGE</p>
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
                <!----------------------------------------------------table------------------------------------------------------------------------------------------------------------>
                <tr>
                    <td>
                        <center>
                            <div style="margin:auto; float: right" class="space-top">
                                <!-- <button><a>sort</a></button> -->
                            </div>
                            <div class="abc" style="padding-top: 1rem;">
                                <table width="100%" class="sub-table table table-borderless small scrolldown animy" cellspacing="0">
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
                                                ISSUED
                                            </th>
                                            <th class="table-headin">
                                                EXPIRY
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
                                        if ($result_fishcage->num_rows > 0) {

                                            $smsNotifier = new SMSNotifier($conn);
                                            $smsNotifier->sendExpiringNotifications('fishcage', 'id', 'fc_contact', 'Fishing Gear');

                                            while ($row = $result_fishcage->fetch_assoc()) {
                                                $ffid = $row["id"];
                                                $status = $row['u_status'];
                                                $name = $row['fc_fname'] . ' ' . $row['fc_mname'] . ' ' . $row['fc_lname'] . ' ' . $row['fc_appell'];
                                                $location = $row['fc_street'] . ', ' . $row['fc_brgy'];


                                                echo '<tr class="border-bottom">';
                                                echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                                                echo '<td class="nametd">' . htmlspecialchars($name) . '</td>';
                                                echo '<td>' . htmlspecialchars($location) . '</td>';
                                                echo '<td>' . htmlspecialchars('') . '</td>';
                                                echo '<td>' . htmlspecialchars($row['issuance_date']) . '</td>';
                                                echo '<td>' . htmlspecialchars($row['expiration_date']) . '</td>';
                                                echo '<td><!-- Add your actions here -->

                                                <div class="action-icons">
                                            
                                                    <i class="bi bi-pencil-square edit-icon icon-size icon-edit p-0  ps-1 pe-1 btn btn-primary fw-bold" 
                                                    data-id="' . htmlspecialchars($row['id']) .
                                                    '" data-id-type="id" 
                                                    data-fname="' . htmlspecialchars($row['fc_fname']) .
                                                    '" data-mname="' . htmlspecialchars($row['fc_mname']) .
                                                    '" data-lname="' . htmlspecialchars($row['fc_lname']) .
                                                    '" data-appell="' . htmlspecialchars($row['fc_appell']) .
                                                    '" data-postal="' . htmlspecialchars($row['fc_postal']) .
                                                    '" data-province="' . htmlspecialchars($row['fc_prov']) .
                                                    '" data-municipal="' . htmlspecialchars($row['fc_municipal']) .
                                                    '" data-barangay="' . htmlspecialchars($row['fc_brgy']) .
                                                    '" data-street="' . htmlspecialchars($row['fc_street']) .
                                                    '" data-contact="' . htmlspecialchars($row['fc_contact']) .
                                                    '" data-invcategory="' . htmlspecialchars($row['fc_invcategory']) .
                                                    '" data-cagetype="' . htmlspecialchars($row['fc_cagetype']) .
                                                    '" data-culturedspicies="' . htmlspecialchars($row['fc_culturedspicies']) .
                                                    '" data-dimension_size="' . htmlspecialchars($row['fc_dimension_size']) .
                                                    '" data-intendedfor="' . htmlspecialchars($row['fc_intendedfor']) .
                                                    '" data-businessname="' . htmlspecialchars($row['fc_businessname']) .
                                                    '" data-businessadd="' . htmlspecialchars($row['fc_businessadd']) .
                                                    '" data-businessreg="' . htmlspecialchars($row['fc_businessreg']) .
                                                    '" data-capitalinv="' . htmlspecialchars($row['fc_capitalinv']) .
                                                    '" data-source="' . htmlspecialchars($row['fc_source']) .
                                                    '" data-email="' . htmlspecialchars($row['u_email']) .
                                                    '" data-role="' . htmlspecialchars($row['u_role']) .
                                                    '" data-status="' . htmlspecialchars($row['u_status']) .
                                                    '" data-reason="' . htmlspecialchars($row['decline_reason']) .
                                                    '" data-approval_type="' . htmlspecialchars($row['approval_type']) .
                                                    '" style="vertical-align: middle; cursor: pointer;"></i>
                                            
                                                    <i class="bi bi-eye view-icon icon-size icon-view p-0  ps-1 pe-1 btn btn-secondary fw-bold" 
                                                    data-id="' . htmlspecialchars($row['id']) .
                                                    '" data-fname="' . htmlspecialchars($row['fc_fname']) .
                                                    '" data-mname="' . htmlspecialchars($row['fc_mname']) .
                                                    '" data-lname="' . htmlspecialchars($row['fc_lname']) .
                                                    '" data-appell="' . htmlspecialchars($row['fc_appell']) .
                                                    '" data-postal="' . htmlspecialchars($row['fc_postal']) .
                                                    '" data-province="' . htmlspecialchars($row['fc_prov']) .
                                                    '" data-municipal="' . htmlspecialchars($row['fc_municipal']) .
                                                    '" data-barangay="' . htmlspecialchars($row['fc_brgy']) .
                                                    '" data-street="' . htmlspecialchars($row['fc_street']) .
                                                    '" data-contact="' . htmlspecialchars($row['fc_contact']) .
                                                    '" data-invcategory="' . htmlspecialchars($row['fc_invcategory']) .
                                                    '" data-cagetype="' . htmlspecialchars($row['fc_cagetype']) .
                                                    '" data-culturedspicies="' . htmlspecialchars($row['fc_culturedspicies']) .
                                                    '" data-dimension_size="' . htmlspecialchars($row['fc_dimension_size']) .
                                                    '" data-intendedfor="' . htmlspecialchars($row['fc_intendedfor']) .
                                                    '" data-businessname="' . htmlspecialchars($row['fc_businessname']) .
                                                    '" data-businessadd="' . htmlspecialchars($row['fc_businessadd']) .
                                                    '" data-businessreg="' . htmlspecialchars($row['fc_businessreg']) .
                                                    '" data-capitalinv="' . htmlspecialchars($row['fc_capitalinv']) .
                                                    '" data-source="' . htmlspecialchars($row['fc_source']) .
                                                    '" data-email="' . htmlspecialchars($row['u_email']) .
                                                    '" data-role="' . htmlspecialchars($row['u_role']) .
                                                    '" data-status="' . htmlspecialchars($row['u_status']) .
                                                    '" data-reason="' . htmlspecialchars($row['decline_reason']) .

                                                    '" data-approval_type="' . htmlspecialchars($row['approval_type']) .
                                                    '" style="vertical-align: middle; cursor: pointer;"></i>
                                            
                                                    <i class="bi bi-trash delete-icon icon-size icon-delete p-0  ps-1 pe-1 btn btn-danger fw-bold" 
                                                    style="cursor: pointer;" 
                                                    onclick="confirmDelete(' . htmlspecialchars($row['id']) . ', \'fishcage\')"></i>
                                            
                                                    <button hidden class="p-0  ps-1 pe-1 btn btn-success fw-bold generate-pdf-btn" data-id="' . htmlspecialchars($row['id']) . '"><i class="bi bi-file-earmark-arrow-down"></i></button>
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
                                                }elseif ($status == 6) {
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
                <div id="editModal" class="modal animy">
                    <div class="modal-content">
                        <div>
                            <span class="close">&times;</span>
                        </div>
                        <div>
                            <div style="margin-inline:10px">
                                <h3 class="modal-head">Edit Fish Cage Details</h3>
                            </div>
                        </div>

                        <div style="margin-inline:10px">
                            <div class="modal-status">Permit Status: <span class=""></span><!-- change the span class if needed --></div>
                        </div>

                        <form id="editForm" action="functions/update.php" method="post">
                            <div style="max-height:70vh;overflow:auto;">
                                <div style="display:flex;" class="space-top">
                                    <div style="margin-inline:10px">
                                        <input type="hidden" name="id" id="edit-id">

                                        <div style="margin:auto" class="spacing">
                                            <label class="modal-label" for="fc_fname">First Name:</label>
                                            <input class="input-xx" type="text" name="fc_fname" id="edit-fname">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_mname">Middle Name:</label>
                                            <input class="input-xx" type="text" name="fc_mname" id="edit-mname">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_lname">Last Name:</label>
                                            <input class="input-xx" type="text" name="fc_lname" id="edit-lname">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_appell">Appellation:</label>
                                            <input class="input-xx" type="text" name="fc_appell" id="edit-appell">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_contact">Contact No.:</label>
                                            <input class="input-xx" type="text" name="fc_contact" id="edit-contact">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="approval_type">Approval Type:</label>
                                            <input class="input-xx" type="text" name="approval_type" id="edit-approval_type">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_invcategory">Investment Category:</label>
                                            <input class="input-xx" type="text" name="fc_invcategory" id="edit-invcategory">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_cagetype">Cage Type:</label>
                                            <input class="input-xx" type="text" name="fc_cagetype" id="edit-cagetype">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_culturedspicies">Cultured Species:</label>
                                            <input class="input-xx" type="text" name="fc_culturedspicies" id="edit-culturedspicies">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_dimension_size">Dimension Size:</label>
                                            <input class="input-xx" type="text" name="fc_dimension_size" id="edit-dimension_size">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_intendedfor">Intended For:</label>
                                            <input class="input-xx" type="text" name="fc_intendedfor" id="edit-intendedfor">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_businessname">Business Name:</label>
                                            <input class="input-xx" type="text" name="fc_businessname" id="edit-businessname">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_businessadd">Business Address:</label>
                                            <input class="input-xx" type="text" name="fc_businessadd" id="edit-businessadd">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_businessreg">Business Registration:</label>
                                            <input class="input-xx" type="text" name="fc_businessreg" id="edit-businessreg">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_capitalinv">Capital Investment:</label>
                                            <input class="input-xx" type="text" name="fc_capitalinv" id="edit-capitalinv">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_source">Source:</label>
                                            <input class="input-xx" type="text" name="fc_source" id="edit-source">
                                        </div>
                                    </div>

                                    <div style="margin-inline:10px">
                                        <div class="spacing">
                                            <label class="modal-label" for="fc_postal">Postal Code:</label>
                                            <input class="input-xx" type="text" name="fc_postal" id="edit-postal">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_prov">Province:</label>
                                            <input class="input-xx" type="text" name="fc_prov" id="edit-province">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_municipal">Municipal:</label>
                                            <input class="input-xx" type="text" name="fc_municipal" id="edit-municipal">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_brgy">Barangay:</label>
                                            <input class="input-xx" type="text" name="fc_brgy" id="edit-barangay">
                                        </div>

                                        <div class="spacing">
                                            <label class="modal-label" for="fc_street">Street:</label>
                                            <input class="input-xx" type="text" name="fc_street" id="edit-street">
                                        </div>
                                        <div class="spacing">
                                        <label class="modal-label" for="reasin">Reason:</label>
                                        <input class="input-xx" type="text" name="reason" id="edit-reason">
                                    </div>
                                    </div>

                                    <input type="hidden" name="u_email" id="edit-email">
                                    <input type="hidden" name="form_type" value="fishcage">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="spacing m-1">
                                    <button type="button" class="btn btn-secondary" id="updateButton" data-action="update">Update</button>
                                </div>

                                <div class="spacing m-1">
                                <button type="button" name="action" class="btn btn-primary" id="insertButton"
                                data-action="send_for_approval">For Approval</button>
                                    </div>

                                <div class="spacing m-1">
                                    <button type="button" class="btn btn-primary" id="renewButton" data-action="renew">Renew</button>
                                </div>

                                
                                <input type="hidden" name="id" id="edit-id2" placeholder="Enter FF ID" required value="<?php echo $ffid?>">
                                <button type="button" name="gen" class="btn btn-success" onclick="generateFV('generate_fc/generate.php','id')">
                                    <i class="bi bi-file-earmark-arrow-down"></i>
                                </button>
                                 

                            </div>
                        </form>
                    </div>
                </div>





                <!------------------------------------------------------------------------view-modal--------------------------------------------------------------->
                <div id="viewModal" class="modal animy">
                    <div class="modal-content">
                        <div>
                            <span class="close viewclose">&times;</span>
                        </div>
                        <div>
                            <div style="margin-inline:10px">
                                <h3 class="modal-head">View Fish Cage Details</h3>
                            </div>
                        </div>

                        <div style="margin-inline:10px">
                            <div class="modal-status">Permit Status: <span class=""></span><!-- change the span class if needed --></div>
                        </div>


                        <div style="max-height:70vh;overflow:auto;">
                            <div style="display:flex;" class="space-top">
                                <div style="margin-inline:10px">
                                    <input type="hidden" name="id" id="view-id">

                                    <div style="margin:auto" class="spacing">
                                        <label class="modal-label" for="fc_fname">First Name:</label>
                                        <input class="input-xx" type="text" name="fc_fname" id="view-fname">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_mname">Middle Name:</label>
                                        <input class="input-xx" type="text" name="fc_mname" id="view-mname">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_lname">Last Name:</label>
                                        <input class="input-xx" type="text" name="fc_lname" id="view-lname">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_appell">Appellation:</label>
                                        <input class="input-xx" type="text" name="fc_appell" id="view-appell">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_contact">Contact No.:</label>
                                        <input class="input-xx" type="text" name="fc_contact" id="view-contact">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="approval_type">Approval Type:</label>
                                        <input class="input-xx" type="text" name="approval_type" id="view-approval_type">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_invcategory">Investment Category:</label>
                                        <input class="input-xx" type="text" name="fc_invcategory" id="view-invcategory">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_cagetype">Cage Type:</label>
                                        <input class="input-xx" type="text" name="fc_cagetype" id="view-cagetype">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_culturedspicies">Cultured Species:</label>
                                        <input class="input-xx" type="text" name="fc_culturedspicies" id="view-culturedspicies">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_dimension_size">Dimension Size:</label>
                                        <input class="input-xx" type="text" name="fc_dimension_size" id="view-dimension_size">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_intendedfor">Intended For:</label>
                                        <input class="input-xx" type="text" name="fc_intendedfor" id="view-intendedfor">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_businessname">Business Name:</label>
                                        <input class="input-xx" type="text" name="fc_businessname" id="view-businessname">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_businessadd">Business Address:</label>
                                        <input class="input-xx" type="text" name="fc_businessadd" id="view-businessadd">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_businessreg">Business Registration:</label>
                                        <input class="input-xx" type="text" name="fc_businessreg" id="view-businessreg">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_capitalinv">Capital Investment:</label>
                                        <input class="input-xx" type="text" name="fc_capitalinv" id="view-capitalinv">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_source">Source:</label>
                                        <input class="input-xx" type="text" name="fc_source" id="view-source">
                                    </div>
                                </div>

                                <div style="margin-inline:10px">
                                    <div class="spacing">
                                        <label class="modal-label" for="fc_postal">Postal Code:</label>
                                        <input class="input-xx" type="text" name="fc_postal" id="view-postal">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_prov">Province:</label>
                                        <input class="input-xx" type="text" name="fc_prov" id="view-province">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_municipal">Municipal:</label>
                                        <input class="input-xx" type="text" name="fc_municipal" id="view-municipal">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_brgy">Barangay:</label>
                                        <input class="input-xx" type="text" name="fc_brgy" id="view-barangay">
                                    </div>

                                    <div class="spacing">
                                        <label class="modal-label" for="fc_street">Street:</label>
                                        <input class="input-xx" type="text" name="fc_street" id="view-street">
                                    </div>
                                    <div class="spacing">
                                        <label class="modal-label" for="reasin">Reason:</label>
                                        <input class="input-xx" type="text" name="reason" id="view-reason">
                                    </div>
                                </div>

                                <input type="hidden" name="u_email" id="view-email">
                                <input type="hidden" name="form_type" value="fishcage">
                            </div>
                        </div>



                    </div>
                </div>
            </table>



        </div>
    </div>
    <!--ionicons-script-->
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





        function confirmDelete(id, type) {
            Swal.fire({
                title: 'Delete Fish Cage Record?',
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
</body>

</html>