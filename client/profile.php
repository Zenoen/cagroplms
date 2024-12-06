<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="../css/dash1.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/animation.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/sectionhead.css">
    <link rel="stylesheet" type="text/css" href="../css/client.css">
    <link rel="stylesheet" href="../css/bootstrap/icons/font/bootstrap-icons.css">
    <script src="../js/global/prof-drp.js" defer></script>
    <script src="../js/client/client_statusUpdater.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <title>Dashboard</title>

    <style>
        .counter {
            font-size: 40px;
            font-weight: 600;
            color: white;
        }

        .counter-card {

            padding: 30px;

            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        /* Targeting the nth child of .col-md-6 instead */
        .col-md-6:nth-child(1) .counter-card {
            background-color: #4e85b3;
        }

        .col-md-6:nth-child(2) .counter-card {
            background-color: #3574a9;
        }

        .col-md-6:nth-child(3) .counter-card {
            background-color: #025193;
        }

        .col-md-6:nth-child(4) .counter-card {
            background-color: #024984;
        }

        .col-md-6:nth-child(5) .counter-card {
            background-color: #013967;
        }

        .col-md-6:nth-child(6) .counter-card {
            background-color: #01294a;
        }

        .col-md-6:nth-child(7) .counter-card {
            background-color: #01182c;
        }

        .counter-name {
            font-size: 17px;

            color: white;
        }
    </style>
</head>

<body>

    <?php
    // include("../conn.php");
    // include("functions/client_session.php");
    ?>



    <div class="container">
        <!-----------------------------------------------------------side-nav---------------------------------------------------------------------------->
        <div class="menu d-none">
            <table class="menu-container" border="0">
                <tr> <!--cagro logo-->
                    <td>
                        <div
                            style="padding-top:1rem;display:flex;justify-content:left;margin-bottom:30px;align-items:center;margin-left:15px;">
                            <span
                                style="margin-left:10px;margin-right:20px;color:white;font-size:20px;font-weight:bold;line-height:20px">CAGRO
                                <br> PLMS</span>

                            <img src="../img/logo-blue.png" class="selector " width="35%">
                        </div>
                    </td>
                </tr>

                <tr class="menu-row">
                    <td class="menu-btn menu-active">
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active">
                            <div>
                                <p class="menu-text"><i class="bi bi-person-fill"></i>&emsp;Profile</p>
                            </div>
                        </a>
                    </td>
                </tr>

                <tr class="menu-row">
                    <td class="menu-btn">
                        <?php if ($is_verified == 1): ?>
                            <div class="dropdown menu-text non-style-link-menu">
                                <p style="cursor:default;"><i class="bi bi-file-earmark-text-fill"></i>&emsp;Permits</p>
                                <div class="dropdown-content">
                                    <a class="ref" href="fisherfolk-form.php">Fisherfolk Permit</a>
                                    <a class="ref" href="fishworker-form.php">Fishworker Permit</a>
                                    <a class="ref" href="fishcage-op-form.php">Fishcage Operator Permit</a>
                                    <a class="ref" href="fishgear_form.php">Fishing Gear Permit</a>
                                    <a class="ref" href="fishingboats_form.php">Fishing Vessel Permit</a>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="dropdown menu-text non-style-link-menu">
                                <p style="cursor:default;">><i class="bi bi-file-earmark-text-fill"></i>&emsp;Permits <i
                                        class="bi bi-lock-fill"></i></p>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>

                <tr class="menu-row">
                    <td class="menu-btn">
                        <a href="activity.php" class="non-style-link-menu">
                            <div>
                                <p class="menu-text"><i class="bi bi-file-text-fill"></i>&emsp;Activity Log</p>
                            </div>
                        </a>
                    </td>
                </tr>

            </table>
        </div>


        <!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->



        <div class="row">
            <div class="col-md-6 col-sm-12 col-lg-6">
                <div class="d-flex m-2  round_sm  bg-white p-3">
                    <div class="">
                        <?php
                        if (!empty($userData['u_profile'])) {
                            echo '<img class=" rounded-circle" width="150rem"  height="150rem" src="../uploads/' . htmlspecialchars($userData['u_profile']) . '" alt="Profile Image">';
                        } else {
                            echo '<img src="../img/user.png" class=" rounded-circle" width="150rem" height="150rem" >';
                        }
                        ?>
                    </div>
                    <div class="ms-3 " style="display:block;padding-inline: 1rem;">
                        <br>
                        <p class="client-name">
                            <?php echo htmlspecialchars($userData['fname'] . ' ' . $userData['lname']); ?>
                        </p>
                        <p class="client-contact">
                            <?php echo htmlspecialchars($userData['email']); ?><br>
                            <?php echo htmlspecialchars($userData['contact']); ?>
                        </p>



                        <?php if ($is_verified == 1): ?>
                            <p class="text-white p-1 rounded bg-primary text-center">Verified <i class="bi bi-check-circle-fill"></i></p>
                        <?php else: ?>
                            <p class="text-white p-1 rounded bg-danger text-center">Not Verified</p>
                            <button class="btn btn-primary" onclick="sendOTP();">Verify</button>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if ($result_lstatus && $result_lstatus->num_rows > 0) { ?>

                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="d-flex m-2 border round_sm shadow-sm text-white p-3" style="background-color: #024072;">
                        <div class="w-100">

                            <h5 class="">License Status</h5>


                            <?php
                            $count = 1;
                            while ($row = $result_lstatus->fetch_assoc()) {
                                $status = $row['license_status'];

                            ?>

                                <div class=" round_sm p-3 mb-2" style="background-color: #0001294a;">


                                    <?php
                                    if ($status == 1) {
                                        echo '<span class="bg-white p-1 ps-2 pe-2 rounded fw-bold text-success">Licensed</span>';
                                    } elseif ($status == 2) {
                                        echo '<span class="bg-white p-1 ps-2 pe-2 rounded fw-bold text-danger">Expiry Notice</span>';
                                    } else {
                                        echo '<span class="bg-white p-1 ps-2 pe-2 rounded fw-bold text-secondary">Unlicense</span>';
                                    }

                                    ?>

                                    <br>

                                    <?php

                                    if ($row['issuance_date'] != '') { ?>
                                        <br>
                                        <small>
                                            <span><b>Issue Date: </b>
                                                <?= date('Y-m-d', strtotime($row['issuance_date'])); ?>
                                            </span>
                                            <br>
                                            <span><b>Expiry Date: </b>
                                                <?= $row['expiration_date'] ?>
                                            </span> <br>
                                        </small>
                                    <?php }
                                    ?>
                                </div>


                            <?php
                            }

                            ?>


                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-6 col-sm-12 col-lg-4">
                    <div class="d-flex m-2 border round_sm shadow-sm  p-3 text-white" style="background-color: #024072;">
                        <div style="display:block;padding-inline: 1rem;">
                            <h5 class="">Licensed ID Status</h5>
                            <?php

                            while ($row = $result_lstatus->fetch_assoc()) {
                                $status = $row['license_status'];
                            ?>
                                <div class=" round_sm p-3 mb-2" style="background-color: #01294a;">


                                    <?php
                                    if ($license_status == 1) {
                                        echo '<span class="stats-complete">Licensed</span>';
                                    } elseif ($license_status == 2) {
                                        echo '<span class="stats-pending">Expiry Notice</span>';
                                    } elseif ($license_status == 6) {
                                        echo '<span class="stats-pending">Decline</span>';
                                    }

                                    ?>
                                    <br>
                                    <br>
                                    <?php

                                    if ($row['issuance_date'] != '') { ?>

                                        <span><b>Issue Date: </b>
                                            <?= date('Y-m-d', strtotime($row['issuance_date'])); ?>
                                        </span>
                                        <br>
                                        <span><b>Expiry Date: </b>
                                            <?= $row['expiration_date'] ?>
                                        </span>

                                    <?php } ?>
                                </div>

                            <?php }

                            ?>
                        </div>
                    </div>
                </div> -->
            <?php } ?>
        </div>
        <br>

        <?php if ($result_fisherfolks && $result_fisherfolks->num_rows > 0 || $result_fisherworkers && $result_fisherworkers->num_rows > 0 || $result_fishinggears && $result_fishinggears->num_rows > 0) { ?>
            <h5>Permits</h4>
            <?php } else { ?>
                <h5>Permits</h4>
                    <div class="col">
                        <div class="d-flex m-2 border round_sm shadow-sm bg-white p-5 justify-content-center">
                            <span>No Request Submitted</span>
                        </div>
                    </div>
                <?php } ?>
                <div class="row">



                    <?php if ($result_fisherfolks && $result_fisherfolks->num_rows > 0) { ?>
                        <div class="col-md-6 col-sm-12 col-lg-4">
                            <div class="d-flex m-2 border round_sm shadow-sm bg-white p-3">
                                <div class="w-100">

                                    <h5 class="">Fisherfolks</h5>

                                    <form action="genreq.php?permit_type=ff_permit" class="w-100" method="post">
                                        <button class="btn  btn-secondary w-100 p-3 round_sm" type="submit" name="apply">
                                            <i class="bi bi-cloud-arrow-down-fill "></i> <small> Requirements</small></button>
                                        </button>
                                    </form>

                                    <br>
                                    <?php
                                    $count = 1;
                                    while ($row = $result_fisherfolks->fetch_assoc()) {
                                        $reason = $row['decline_reason'];
                                        $id = $row['ff_id'];
                                        $status = $row['u_status'];
                                    ?>

                                        <div class="border round_sm p-3 mb-2 " style="background-color: #eee;">


                                            <?php
                                            if ($status == 1) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-pending">Submitted</span>
                                                <form action="../admin/generate_ff_application/generate_app_form.php" method="post">
                                                
                                                <button class="btn  btn-secondary ms-3 mt-1 py-1   round_sm" type="submit" name="apply">
                                                <input type="hidden" name="ff_id" value="' . $id . '">
                                                    <i class="bi bi-cloud-arrow-down-fill "></i> <small>Application Form</small></button>
                                                </button>
                                                 </form>';
                                            } elseif ($status == 2) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-pending">Requirements Issued</span><form action="../admin/generate_ff_application/generate_app_form.php" method="post">
                                                
                                                    <button class="btn  btn-secondary ms-3 mt-1 py-1   round_sm" type="submit" name="apply">
                                                    <input type="hidden" name="ff_id" value="' . $id . '">
                                                        <i class="bi bi-cloud-arrow-down-fill "></i> <small>Application Form</small></button>
                                                    </button>
                                                </form>
                                                ';
                                            } elseif ($status == 3) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-pending">Awating Approval</span><form action="../admin/generate_ff_application/generate_app_form.php" method="post">
                                                
                                                <button class="btn  btn-secondary ms-3 mt-1 py-1   round_sm" type="submit" name="apply">
                                                <input type="hidden" name="ff_id" value="' . $id . '">
                                                    <i class="bi bi-cloud-arrow-down-fill "></i> <small>Application Form</small></button>
                                                </button>
                                                   </form>';
                                            } elseif ($status == 4) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-complete">Registered</span><form action="../admin/generate_ff_application/generate_app_form.php" method="post">
                                                
                                                <button class="btn  btn-secondary ms-3 mt-1 py-1   round_sm" type="submit" name="apply">
                                                <input type="hidden" name="ff_id" value="' . $id . '">
                                                    <i class="bi bi-cloud-arrow-down-fill "></i> <small>Application Form</small></button>
                                                </button>
                                                    </form> ';
                                            } elseif ($status == 5) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-expiry">Expiry Notice </span>
                                                                <form action="../admin/generate_ff_application/generate_app_form.php" method="post">
                                                                
                                                        <button class="btn  btn-secondary ms-3 mt-1 py-1   round_sm" type="submit" name="apply">
                                                        <input type="hidden" name="ff_id" value="' . $id . '">
                                                            <i class="bi bi-cloud-arrow-down-fill "></i> <small>Application Form</small></button>
                                                        </button>
                                                    </form>
                                                ';
                                            } elseif ($status == 6) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-expiry">Decline</span><br>
                                                    <p class="m-2 ms-3 small mb-0 text-danger">' . $reason . '</p>

                                                 ';
                                            } ?>


                                            <?php

                                            if ($row['issuance_date'] != '') { ?>
                                                <br>
                                                <small>
                                                    <span><b>Issue Date: </b>
                                                        <?= date('Y-m-d', strtotime($row['issuance_date'])); ?>
                                                    </span>
                                                    <br>
                                                    <span><b>Expiry Date: </b>
                                                        <?= $row['expiration_date'] ?>
                                                    </span> <br>
                                                </small>
                                            <?php }
                                            ?>
                                        </div>


                                    <?php
                                        $count++;
                                    }

                                    ?>


                                </div>
                            </div>
                        </div>
                    <?php } ?>


                    <?php if ($result_fishingboats && $result_fishingboats->num_rows > 0) { ?>
                        <div class="col-md-6 col-sm-12 col-lg-4">
                            <div class="d-flex m-2 border round_sm shadow-sm bg-white p-3">
                                <div class="w-100">

                                    <h5 class="">Fishing Boats</h5>

                                    <form action="genreq.php?permit_type=fv_permit" method="post">
                                        <button class="btn  btn-secondary w-100 p-3 round_sm" type="submit" name="apply">
                                            <i class="bi bi-cloud-arrow-down-fill "></i> <small>Download Requirements</small></button>
                                        </button>
                                    </form>
                                    <br>
                                    <?php
                                    $count = 1;
                                    while ($row = $result_fishingboats->fetch_assoc()) {

                                        $status = $row['u_status'];
                                    ?>

                                        <div class="border round_sm p-3 mb-2" style="background-color: #eee;">


                                            <?php
                                            if ($status == 1) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-pending">Submitted</span><br>
                                    ';
                                            } elseif ($status == 2) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-pending">Requirements Issued</span><br>
                                    ';
                                            } elseif ($status == 3) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-pending">Awating Approval</span><br>
                                    ';
                                            } elseif ($status == 4) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-complete">Registered</span><br>
                                    ';
                                            } elseif ($status == 5) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-expiry">Expiry Notice</span><br>
                                   ';
                                            } ?>


                                            <?php

                                            if ($row['issuance_date'] != '') { ?>
                                                <br>
                                                <small>
                                                    <span><b>Issue Date: </b>
                                                        <?= date('Y-m-d', strtotime($row['issuance_date'])); ?>
                                                    </span>
                                                    <br>
                                                    <span><b>Expiry Date: </b>
                                                        <?= $row['expiration_date'] ?>
                                                    </span> <br>
                                                </small>
                                            <?php }
                                            ?>
                                        </div>


                                    <?php
                                        $count++;
                                    }

                                    ?>


                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($result_fishcage && $result_fishcage->num_rows > 0) { ?>
                        <div class="col-md-6 col-sm-12 col-lg-4">
                            <div class="d-flex m-2 border round_sm shadow-sm bg-white p-3">
                                <div class="w-100">

                                    <h5 class="">FishCage</h5>

                                    <form action="genreq.php?permit_type=fv_permit" method="post">
                                        <button class="btn  btn-secondary w-100 p-3 round_sm" type="submit" name="apply">
                                            <i class="bi bi-cloud-arrow-down-fill "></i> <small>Download Requirements</small></button>
                                        </button>
                                    </form>
                                    <br>
                                    <?php
                                    $count = 1;
                                    while ($row = $result_fishcage->fetch_assoc()) {

                                        $status = $row['u_status'];
                                    ?>

                                        <div class="border round_sm p-3 mb-2" style="background-color: #eee;">


                                            <?php
                                            if ($status == 1) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-pending">Submitted</span><br>
                                    ';
                                            } elseif ($status == 2) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-pending">Requirements Issued</span><br>
                                    ';
                                            } elseif ($status == 3) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-pending">Awating Approval</span><br>
                                    ';
                                            } elseif ($status == 4) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-complete">Registered</span><br>
                                    ';
                                            } elseif ($status == 5) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-expiry">Expiry Notice</span><br>
                                   ';
                                            } ?>


                                            <?php

                                            if ($row['issuance_date'] != '') { ?>
                                                <br>
                                                <small>
                                                    <span><b>Issue Date: </b>
                                                        <?= date('Y-m-d', strtotime($row['issuance_date'])); ?>
                                                    </span>
                                                    <br>
                                                    <span><b>Expiry Date: </b>
                                                        <?= $row['expiration_date'] ?>
                                                    </span> <br>
                                                </small>
                                            <?php }
                                            ?>
                                        </div>


                                    <?php
                                        $count++;
                                    }

                                    ?>


                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($result_fisherworkers && $result_fisherworkers->num_rows > 0) { ?>
                        <div class="col-md-6 col-sm-12 col-lg-4">
                            <div class="d-flex m-2 border round_sm shadow-sm bg-white p-3">
                                <div class="w-100">

                                    <h5 class="">Fishing Worker</h5>

                                    <form action="genreq.php?permit_type=fw_permit" method="post">
                                        <button class="btn  btn-secondary w-100 p-3 round_sm" type="submit" name="apply">
                                            <i class="bi bi-cloud-arrow-down-fill"></i> <small>Download Requirements</small></button>
                                        </button>
                                    </form>
                                    <br>
                                    <?php
                                    $count = 1;
                                    while ($row = $result_fisherworkers->fetch_assoc()) {
                                        $reason = $row['decline_reason'];
                                        $id = $row['fw_id'];
                                        $status = $row['u_status'];
                                    ?>

                                        <div class="border round_sm p-3 mb-2 " style="background-color: #eee;">


                                            <?php
                                            if ($status == 1) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-pending">Submitted</span>
                                                <form action="../admin/generate_fw_application/generate_app_form.php" method="post">
                                                
                                                <button class="btn  btn-secondary ms-3 mt-1 py-1   round_sm" type="submit" name="apply">
                                                <input type="hidden" name="fw_id" value="' . $id . '">
                                                    <i class="bi bi-cloud-arrow-down-fill "></i> <small>Application Form</small></button>
                                                </button>
                                                 </form>';
                                            } elseif ($status == 2) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-pending">Requirements Issued</span><form action="../admin/generate_fw_application/generate_app_form.php" method="post">
                                                
                                                    <button class="btn  btn-secondary ms-3 mt-1 py-1   round_sm" type="submit" name="apply">
                                                    <input type="hidden" name="fw_id" value="' . $id . '">
                                                        <i class="bi bi-cloud-arrow-down-fill "></i> <small>Application Form</small></button>
                                                    </button>
                                                </form>
                                                ';
                                            } elseif ($status == 3) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-pending">Awating Approval</span><form action="../admin/generate_fw_application/generate_app_form.php" method="post">
                                                
                                                <button class="btn  btn-secondary ms-3 mt-1 py-1   round_sm" type="submit" name="apply">
                                                <input type="hidden" name="fw_id" value="' . $id . '">
                                                    <i class="bi bi-cloud-arrow-down-fill "></i> <small>Application Form</small></button>
                                                </button>
                                                   </form>';
                                            } elseif ($status == 4) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-complete">Registered</span><form action="../admin/generate_fw_application/generate_app_form.php" method="post">
                                                
                                                <button class="btn  btn-secondary ms-3 mt-1 py-1   round_sm" type="submit" name="apply">
                                                <input type="hidden" name="fw_id" value="' . $id . '">
                                                    <i class="bi bi-cloud-arrow-down-fill "></i> <small>Application Form</small></button>
                                                </button>
                                                    </form> ';
                                            } elseif ($status == 5) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-expiry">Expiry Notice </span>
                                                                <form action="../admin/generate_fw_application/generate_app_form.php" method="post">
                                                                
                                                        <button class="btn  btn-secondary ms-3 mt-1 py-1   round_sm" type="submit" name="apply">
                                                        <input type="hidden" name="fw_id" value="' . $id . '">
                                                            <i class="bi bi-cloud-arrow-down-fill "></i> <small>Application Form</small></button>
                                                        </button>
                                                    </form>
                                                ';
                                            } elseif ($status == 6) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-expiry">Decline</span><br>
                                                    <p class="m-2 ms-3 small mb-0 text-danger">' . $reason . '</p>

                                                 ';
                                            } ?>


                                            <?php

                                            if ($row['issuance_date'] != '') { ?>
                                                <br>
                                                <small>
                                                    <span><b>Issue Date: </b>
                                                        <?= date('Y-m-d', strtotime($row['issuance_date'])); ?>
                                                    </span>
                                                    <br>
                                                    <span><b>Expiry Date: </b>
                                                        <?= $row['expiration_date'] ?>
                                                    </span> <br>
                                                </small>
                                            <?php }
                                            ?>
                                        </div>


                                    <?php
                                        $count++;
                                    }

                                    ?>


                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($result_fishinggears && $result_fishinggears->num_rows > 0) { ?>
                        <div class="col-md-6 col-sm-12 col-lg-4">
                            <div class="d-flex m-2 border round_sm shadow-sm bg-white p-3">
                                <div class="w-100">

                                    <h5 class="">Fishing Gear</h5>

                                    <form action="genreq.php?permit_type=fw_permit" method="post">
                                        <button class="btn  btn-secondary w-100 p-3 round_sm" type="submit" name="apply">
                                            <i class="bi bi-cloud-arrow-down-fill"></i> <small>Download Requirements</small></button>
                                        </button>
                                    </form>
                                    <br>
                                    <?php
                                    $count = 1;
                                    while ($row = $result_fishinggears->fetch_assoc()) {
                                        $reason = $row['decline_reason'];
                                        $id = $row['fg_id'];
                                        $status = $row['u_status'];
                                    ?>

                                        <div class="border round_sm p-3 mb-2 " style="background-color: #eee;">


                                            <?php
                                            if ($status == 1) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-pending">Submitted</span>
                                                <form action="../admin/generate_permit/fishing_gear/generate_gear_permit.php" method="post">
                                                
                                                <button class="btn  btn-secondary ms-3 mt-1 py-1   round_sm" type="submit" name="apply">
                                                <input type="hidden" name="fg_id" value="' . $id . '">
                                                    <i class="bi bi-cloud-arrow-down-fill "></i> <small>Application Form</small></button>
                                                </button>
                                                 </form>';
                                            } elseif ($status == 2) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-pending">Requirements Issued</span>
                                                <form action="../admin/generate_permit/fishing_gear/generate_gear_permit.php" method="post">
                                                
                                                    <button class="btn  btn-secondary ms-3 mt-1 py-1   round_sm" type="submit" name="apply">
                                                    <input type="hidden" name="fg_id" value="' . $id . '">
                                                        <i class="bi bi-cloud-arrow-down-fill "></i> <small>Application Form</small></button>
                                                    </button>
                                                </form>
                                                ';
                                            } elseif ($status == 3) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-pending">Awating Approval</span>
                                               <form action="../admin/generate_permit/fishing_gear/generate_gear_permit.php" method="post">
                                                
                                                <button class="btn  btn-secondary ms-3 mt-1 py-1   round_sm" type="submit" name="apply">
                                                <input type="hidden" name="fg_id" value="' . $id . '">
                                                    <i class="bi bi-cloud-arrow-down-fill "></i> <small>Application Form</small></button>
                                                </button>
                                                   </form>';
                                            } elseif ($status == 4) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-complete">Registered</span>
                                              <form action="../admin/generate_permit/fishing_gear/generate_gear_permit.php" method="post">
                                                
                                                <button class="btn  btn-secondary ms-3 mt-1 py-1   round_sm" type="submit" name="apply">
                                                <input type="hidden" name="fg_id" value="' . $id . '">
                                                    <i class="bi bi-cloud-arrow-down-fill "></i> <small>Application Form</small></button>
                                                </button>
                                                    </form> ';
                                            } elseif ($status == 5) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-expiry">Expiry Notice </span>
                                                            <form action="../admin/generate_permit/fishing_gear/generate_gear_permit.php" method="post">
                                                                
                                                        <button class="btn  btn-secondary ms-3 mt-1 py-1   round_sm" type="submit" name="apply">
                                                        <input type="hidden" name="fg_id" value="' . $id . '">
                                                            <i class="bi bi-cloud-arrow-down-fill "></i> <small>Application Form</small></button>
                                                        </button>
                                                    </form>
                                                ';
                                            } elseif ($status == 6) {
                                                echo '<span class="h4 ">' . $count . ' </span><span class="stats-expiry">Decline</span><br>
                                                    <p class="m-2 ms-3 small mb-0 text-danger">' . $reason . '</p>

                                                 ';
                                            } ?>


                                            <?php

                                            if ($row['issuance_date'] != '') { ?>
                                                <br>
                                                <small>
                                                    <span><b>Issue Date: </b>
                                                        <?= date('Y-m-d', strtotime($row['issuance_date'])); ?>
                                                    </span>
                                                    <br>
                                                    <span><b>Expiry Date: </b>
                                                        <?= $row['expiration_date'] ?>
                                                    </span> <br>
                                                </small>
                                            <?php }
                                            ?>
                                        </div>


                                    <?php
                                        $count++;
                                    }

                                    ?>


                                </div>
                            </div>
                        </div>
                    <?php } ?>





                </div>



                <div class="bg-white">

                    <tr class="d-none">
                        <td>
                            <div class="style-inline" style="display: none; justify-content: space-between">
                                <div class="animx">
                                    <p style="color: #3E897B; font-weight: bold; text-transform: uppercase;" class="dhead">
                                        Client ◌ Profile</p>
                                </div>

                                <div class="profile-menu">
                                    <div class="profile-menu-items"><!--notification-->
                                        <img src="../img/icons/notif.svg" class="space img-notif selector">
                                    </div>

                                    <div class="profile-menu-items" onclick="toggleDropdown()"><!--profile-menu-->
                                        <?php
                                        if (!empty($userData['u_profile'])) {
                                            echo '<img class="space img-profile selector" src="../uploads/' . htmlspecialchars($userData['uprof']) . '" alt="Profile Image">';
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
                                        <?php
                                        if (!empty($userData['u_profile'])) {
                                            echo '<img class="space img-profile selector" src="../uploads/' . htmlspecialchars($userData['u_profile']) . '" alt="Profile Image">';
                                        } else {
                                            echo '<img src="../img/user.png" class="space img-profile selector">';
                                        }
                                        ?>

                                        <div style="display: block; margin: auto">
                                            <p style="color: black; font-size: 15px; font-weight: bold; text-wrap: wrap;"
                                                class="space"><?php echo $userData['lname'] . ', ' . $userData['fname'] ?></p>
                                            <p style="color: black; font-size: 12px; text-wrap: wrap;" class="space">
                                                <?php echo $userData['email'] ?>
                                            </p>
                                        </div>
                                    </div>

                                    <a href="#">My Profile</a>
                                    <a href="../logout.php">Logout</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="style-inline d-none">
                                <div class="client-cards space-top space-bot" style="float:left">
                                    <div style="display:flex; padding-inline: 1rem;" class="animx">
                                        <?php
                                        if (!empty($userData['u_profile'])) {
                                            echo '<img class="selector client-profile"  src="../uploads/' . htmlspecialchars($userData['u_profile']) . '" alt="Profile Image">';
                                        } else {
                                            echo '<img class="selector client-profile"  src="../img/user.png" alt="Default Profile Image">';
                                        }
                                        ?>

                                        <div style="display:block;padding-inline: 1rem;">
                                            <p class="client-name">
                                                <?php echo htmlspecialchars($userData['fname'] . ' ' . $userData['lname']); ?>
                                            </p>
                                            <p class="client-contact"><?php echo htmlspecialchars($userData['email']); ?></p>
                                            <?php if ($is_verified == 1): ?>
                                                <p class="client-role">Verified <i class="bi bi-check-circle-fill"></i></p>
                                            <?php else: ?>
                                                <p class="client-role">Not Verified</p>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                                <?php if ($result_fisherfolks && $result_fisherfolks->num_rows > 0) { ?>
                                    <div class="client-cards space-top space-bot" style="float:left">
                                        <div style="display:flex; padding-inline: 1rem;" class="animx">


                                            <div style="display:block;padding-inline: 1rem;">
                                                <h4 class="client-name">Permit Status</h4>
                                                <?php

                                                while ($row = $result_fisherfolks->fetch_assoc()) {
                                                    $status = $row['u_status'];

                                                    if ($status == 1) {
                                                        echo '<span class="stats-pending">Submitted</span>';
                                                    } elseif ($status == 2) {
                                                        echo '<span class="stats-pending">Requirements Issued</span>';
                                                    } elseif ($status == 3) {
                                                        echo '<span class="stats-pending">Awating Approval</span>';
                                                    } elseif ($status == 4) {
                                                        echo '<span class="stats-complete">Registered</span>';
                                                    } elseif ($status == 5) {
                                                        echo '<span class="stats-expiry">Expiry Notice</span>';
                                                    } ?>
                                                    <br>
                                                    <br>
                                                    <span><b>Issue Date: </b>
                                                        <?= date('Y-m-d', strtotime($row['issuance_date'])); ?></span>
                                                    <br>
                                                    <span><b>Expiry Date: </b><?= $row['expiration_date'] ?></span>

                                                <?php }

                                                ?>

                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if ($result_lstatus && $result_lstatus->num_rows > 0) { ?>
                                    <div class="client-cards space-top space-bot" style="float:left">
                                        <div style="display:flex; padding-inline: 1rem;" class="animx">


                                            <div style="display:block;padding-inline: 1rem;">
                                                <h4 class="client-name">Licensed ID Status</h4>
                                                <?php

                                                while ($row = $result_lstatus->fetch_assoc()) {
                                                    $status = $row['license_status'];
                                                    if ($status == 1) {
                                                        echo '<span class="stats-complete">Licensed</span>';
                                                    } elseif ($status == 2) {
                                                        echo '<span class="stats-pending">Expiry Notice</span>';
                                                    } else {
                                                        echo '<span class="stats-expiry">Unlicense</span>';
                                                    }
                                                ?>

                                                    <br>
                                                    <br>
                                                    <span><b>Issue Date: </b> <?= $row['issuance_date'] ?></span>
                                                    <br>
                                                    <span><b>Expiry Date: </b> <?= $row['expiration_date'] ?></span>
                                                <?php
                                                }

                                                ?>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div style="display:flex;" class="style-inline animx">


                            </div>
                        </td>
                    </tr>

                </div>
    </div>

    <script>
        function sendOTP() {

            // Get the contact number from $userData['u_contact'] (PHP part will inject it here)
            let contactNumber = '<?php echo $userData['contact']; ?>';
            let id = '<?php echo $userData['userID']; ?>';

            // Show SweetAlert confirm dialog to send OTP
            Swal.fire({
                title: 'Send OTP?',
                text: `We will send the OTP to ${contactNumber}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, send OTP!',
                cancelButtonText: 'No, cancel',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    // AJAX request to send OTP
                    fetch('functions/send_otp.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: `contactNumber=${contactNumber}&id=${id}`,
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Show success message from server response
                            Swal.fire({
                                title: 'OTP Sent!',
                                text: data.message,
                                icon: 'success',
                            }).then(() => {
                                // Show OTP input dialog for user to enter OTP
                                let otpVerificationDialog = function() {
                                    Swal.fire({
                                        title: 'Enter OTP',
                                        input: 'text',
                                        inputLabel: 'Please enter the OTP you received',
                                        inputPlaceholder: 'Enter OTP',
                                        showCancelButton: true,
                                        confirmButtonText: 'Verify OTP',
                                        cancelButtonText: 'Cancel',
                                        allowOutsideClick: false,
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            let enteredOTP = result.value;

                                            // AJAX request to verify OTP
                                            fetch('functions/verify_otp.php', {
                                                    method: 'POST',
                                                    headers: {
                                                        'Content-Type': 'application/x-www-form-urlencoded',
                                                    },
                                                    body: `contactNumber=${contactNumber}&enteredOTP=${enteredOTP}&id=${id}`,
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    // Show verification result message
                                                    // console.log("success="+data.success);
                                                    if (data.success == true) {
                                                        Swal.fire({
                                                            title: 'Success',
                                                            text: data.message,
                                                            icon: 'success',
                                                        }).then(() => {
                                                            // Reload the page after the success dialog is closed
                                                            window.location.reload();
                                                        });
                                                    } else {
                                                        Swal.fire({
                                                            title: 'Error',
                                                            text: data.message,
                                                            icon: 'error',
                                                        }).then(() => {
                                                            // Show the dialog again for re-entry of OTP
                                                            otpVerificationDialog();
                                                        });
                                                    }
                                                });
                                        } else {
                                            // If user cancels, close the dialog
                                            Swal.close();
                                        }
                                    });
                                };
                                // Initial call to the OTP verification dialog
                                otpVerificationDialog();
                            });
                        });
                }
            });
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dropdown = document.querySelector('.dropdown');
            dropdown.addEventListener('mouseover', function() {
                var content = this.querySelector('.dropdown-content');
                content.style.display = 'block';
            });

            dropdown.addEventListener('mouseout', function() {
                var content = this.querySelector('.dropdown-content');
                content.style.display = 'none';
            });
        });
    </script>

</body>

</html>