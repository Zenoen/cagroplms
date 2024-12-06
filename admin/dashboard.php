<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="../css/dash1.css">
    <link rel="stylesheet" type="text/css" href="../css/animation.css">
    <link rel="stylesheet" type="text/css" href="../css/sectionhead.css">
    <link rel="stylesheet" type="text/css" href="../css/admin_dash.css">-->
    <script src="../js/admin/admin_dash.js" defer></script>
    <script src="../js/global/prof-drp.js" defer></script>
    <script src="../js/global/menu-dropdown.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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



    <div class="container">
        <!------------------------------------------------------------------------------------------side-nav---------------------------------------------------------------------------->
        <?php
        // include("UI/side-nav.php");
        ?>
        <!---------------------------------------------------------------------------------------------------Dashboard-Contents----------------------------------------------------------------------------------------------------->
        <div class="row">
            <div class="col-md-6 col-sm-12 col-lg-3">
                <div class="space counter-card m-2">
                    <span class="card-count counter">
                        <?php echo $clientCount; ?>
                    </span>
                    <br>
                    <span class="card-txt text-truncate counter-name">
                        Clients
                    </span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-lg-3">
                <div class="space counter-card m-2">
                    <span class="card-count counter">
                        <?php echo $regCount; ?>
                    </span>
                    <br>
                    <span class="card-txt text-truncate counter-name">
                        Registered
                    </span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-lg-3">
                <div class="space counter-card m-2">
                    <span class="card-count counter">
                        <?php echo $penCount; ?>
                    </span>
                    <br>
                    <span class="card-txt text-truncate counter-name">
                        Pending Applications
                    </span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-lg-3">
                <div class="space counter-card m-2">
                    <span class="card-count counter">
                        <?php echo $decCount; ?>
                    </span>
                    <br>
                    <span class="card-txt text-truncate counter-name">
                        Declined Applications
                    </span>
                </div>
            </div>

            <!--
            <div class="col-md-6 col-sm-12 col-lg-3">
                <a class="href_nodesign" href="?page=fisherfolks">

                    <div class="space counter-card m-2 ">

                        <span class="card-count counter">
                            <?php echo $fisherfolksCount; ?>
                        </span>
                        <br>
                        <span class="card-txt text-truncate counter-name">
                            Fisherfolks
                        </span>
                    </div>
                </a>

            </div>
            <div class=" col-md-6 col-sm-12 col-lg-3">
                <a class="href_nodesign" href="?page=fishworkers">
                    <div class="space counter-card m-2">
                        <span class="card-count counter">
                            <?php echo $fishworkerCount; ?>
                        </span>
                        <br>
                        <span class="card-txt text-truncate counter-name">

                            Fishworkers
                        </span>
                    </div>
                </a>

            </div>
            <div class=" col-md-6 col-sm-12 col-lg-3">


                <div class="space counter-card m-2">
                    <span class="card-count counter">
                        <?php echo $fishinggearsCount; ?>
                    </span>
                    <br>
                    <span class="card-txt text-truncate counter-name">
                        Fishing Gear
                    </span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-lg-3">

                <div class="space counter-card m-2">
                    <span class="card-count counter">
                        <?php echo $fishingbpatsCount; ?>
                    </span>
                    <br>
                    <span class="card-txt text-truncate counter-name">
                        Fishing Vessel
                    </span>
                </div>
            </div>
            <div class=" col-md-6 col-sm-12 col-lg-3">

                <div class="space counter-card m-2">
                    <span class="card-count counter">
                        <?php echo $fishcageCount; ?>
                    </span>
                    <br>
                    <span class="card-txt text-truncate counter-name">
                        Fish Cages
                    </span>
                </div>
            </div>
            <div class=" col-md-6 col-sm-12 col-lg-3">

                <div class="space counter-card m-2">
                    <span class="card-count counter">
                        <?php echo $notmotorizedBoatCount; ?>
                    </span>
                    <br>
                    <span class="card-txt text-truncate counter-name">
                        Non-Motorized Gear
                    </span>
                </div>
            </div>
            <div class=" col-md-6 col-sm-12 col-lg-3">

                <div class="space counter-card m-2">
                    <span class="card-count counter">
                        <?php echo $motorizedBoatCount; ?>
                    </span>
                    <br>
                    <span class="card-txt text-truncate counter-name">
                        Motorized Gear
                    </span>
                </div>
            </div>-->
            <div class="row pt-4 ">
                <!-- Fishing Stats Chart (Larger, Left Side) -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Permits Statistics</h5>
                            <canvas id="fishingStatsChart" width="500" height="230"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Status Chart (Smaller, Right Side) -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Permit Status Overview</h5>
                            <canvas id="statusChart" width="300" height="170"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Status Chart (Smaller, Right Side) -->
                <div class="col-md-4">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Fishing Vessels Overview</h5>
                            <canvas id="vesselsChart" width="300" height="170"></canvas>
                        </div>
                    </div>
                </div>
                  <div class="col-md-8">
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Pending Permit Statistics</h5>
                            <canvas id="fishingpendingStatsChart" width="500" height="230"></canvas>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="dash-body d-none">
            <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">

                <!-- <tr>
                    <td>
                        <div class="style-inline" style="display: flex; justify-content: space-between">
                            <div class="animx">
                                <p style="color: #025193; font-weight: bold;" class="dhead">DASHBOARD</p>
                            </div>


                            <div class="profile-menu">
                                <div class="profile-menu-items"><!--notification-->
                <!-- <img src="../img/icons/notif.svg" class="space img-notif selector"> 
                                </div>

                                <div class="profile-menu-items" onclick="toggleDropdown()"><!--profile-menu-->
                <?php
                // if (!empty($userData['u_prof'])) {
                //     echo '<img class="space sechead-prof-img selector" src="../uploads/' . htmlspecialchars($userData['u_prof']) . '" alt="Profile Image">';
                // } else {
                //     echo '<img src="../img/user.png" class="space img-profile selector">';
                // }
                ?>
                <!-- <img src="../img/icons/arrow-down.svg" style="height:20px;width:20px; margin:auto;" 
                                        class="space selector">
                                </div>
                            </div>

                            <div class="dropdown-content-prof" id="dropdown-prof">
                                <div class="prof-divider">
                                    <img src="../img/user.png" class="space img-profile selector">
                                    <div style="display: block; margin: auto">
                                        <p style="color: black; font-size: 15px; font-weight: bold; text-wrap: wrap;"
                                            class="space"><?php echo $userData['lname'] . ', ' . $userData['fname'] ?>
                                        </p>
                                    </div>
                                </div>

                                <a href="profile.php">My Profile</a>
                                <a href="../logout.php">Logout</a>
                            </div>

                        </div>
                    </td>
                </tr> -->

                <!------------------------------------------------------------------------------------------------------dashboard main contents------------------------------------------------------------------------------------------------------->
                <tr>

                    <td>

                    </td>
                </tr>
            </table>

        </div>

    </div>
    </div>
<script>
        const fishingpendingStatsCtx = document.getElementById('fishingpendingStatsChart').getContext('2d');
        const fishingpendingStatsChart = new Chart(fishingpendingStatsCtx, {
            type: 'line', // Bar, Line, Pie, etc.
            data: {
                labels: ['Fisherfolks', 'Fishworkers', 'Fishing Gear', 'Fish Cages', 'Fishing Vessels'],
                datasets: [{
                    label: '# of Pending Permits',
                    data: [<?php echo $fisherpendingfolksCount; ?>, <?php echo $fishpendingworkerCount; ?>, <?php echo $fishingpendinggearsCount; ?>, <?php echo $fishpendingcageCount; ?>, <?php echo $fishingpendingbpatsCount;?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        const fishingStatsCtx = document.getElementById('fishingStatsChart').getContext('2d');
        const fishingStatsChart = new Chart(fishingStatsCtx, {
            type: 'bar', // Bar, Line, Pie, etc.
            data: {
                labels: ['Fisherfolks', 'Fishworkers', 'Fishing Gear', 'Fish Cages', 'Fishing Vessels'],
                datasets: [{
                    label: '# of Client Permits',
                    data: [<?php echo $fisherfolksCount; ?>, <?php echo $fishworkerCount; ?>, <?php echo $fishinggearsCount; ?>, <?php echo $fishcageCount; ?>, <?php echo $motorizedBoatCount+$notmotorizedBoatCount;?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        const statusCtx = document.getElementById('statusChart').getContext('2d');
        const statusChart = new Chart(statusCtx, {
            type: 'pie', // Changed from 'doughnut' to 'pie'
            data: {
                labels: ['Pending', 'Approved', 'Declined', 'Expired'],
                datasets: [{
                    data: [<?php echo $penCount; ?>, <?php echo $regCount; ?>, <?php echo $decCount; ?>, <?php echo $expCount; ?>],
                    backgroundColor: ['#FFCE56', '#36A2EB', '#FF6384', '#9966FF']
                }]
            }
        });
    </script>
<script>
        const vesselCtx = document.getElementById('vesselsChart').getContext('2d');
        const vesselChart = new Chart(vesselCtx, {
            type: 'doughnut', // Changed from 'doughnut' to 'pie'
            data: {
                labels: ['Motorized', 'Non-Motorized'],
                datasets: [{
                    data: [<?php echo $motorizedBoatCount; ?>, <?php echo $botmotorizedBoatCount; ?>],
                    backgroundColor: ['#FFCE56', '#36A2EB']
                }]
            }
        });
    </script>
    <script>
        const yearlyStatsCtx = document.getElementById('yearlyStatsChart').getContext('2d');

        // PHP-provided data
        const years = <?php echo $yearsJson; ?>; // Years
        const counts = <?php echo $countsJson; ?>; // Registration counts

        const yearlyStatsChart = new Chart(yearlyStatsCtx, {
            type: 'line', // Change to 'line' for a spike-style chart
            data: {
                labels: years,
                datasets: [{
                    label: '# of Registrations',
                    data: counts,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: true, // Adds area below the line
                    tension: 0.4 // Makes the line smooth
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Year'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Registrations'
                        }
                    }
                }
            }
        });
    </script>

</body>


</html>