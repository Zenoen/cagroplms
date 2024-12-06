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
    
    <title>Activity Log</title>

    
</head>

<body>

<?php
    // include("../conn.php");
    // include("functions/client_session.php");
?>

<div class = "container">

        <!-----------------------------------------------------------side-nav---------------------------------------------------------------------------->
<div class="menu d-none">
    <table class="menu-container" border="0">
        <tr> <!--cagro logo-->
            <td>
            <div style="padding-top:1rem;display:flex;justify-content:left;margin-bottom:30px;align-items:center;margin-left:15px;">
                <span style="margin-left:10px;margin-right:20px;color:white;font-size:20px;font-weight:bold;line-height:20px">CAGRO <br> PLMS</span>
               
                <img src="../img/logo-blue.png" class="selector " width="35%">
                    </div>
            </td>
        </tr>
        <tr class="menu-row">
            <td class="menu-btn">
                <a href="index.php" class="non-style-link-menu non-style-link-menu-active">
                    <div><p class="menu-text"><i class="bi bi-person-fill"></i>&emsp;Profile</p></div>
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
                        <p style="cursor:default;"><i class="bi bi-file-earmark-text-fill"></i>&emsp;Permits <i class="bi bi-lock-fill"></i></p>
                    </div>
                <?php endif; ?>
            </td>
        </tr>

        <tr class="menu-row">
            <td class="menu-btn menu-active">
                <a href="activity.php" class="non-style-link-menu"><div><p class="menu-text"><i class="bi bi-file-text-fill"></i>&emsp;Activity Log</p></div></a>
            </td>
        </tr>
        
    </table>
</div>

                
        <!-------------------------------------------------------------Dashboard-Contents--------------------------------------------------------->

            <div class = "bg-white">
                <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0;">
                        <tr>
                            <td colspan="3" class="nav">
                            <div class="style-inline" style="display: none; justify-content: space-between">
                                    <div class="animx">
                                        <p style="color: #3E897B; font-weight: bold;" class="dhead">CAGRO ◌ ACTIVITY LOG</p>
                                    </div>
                                    

                                    <div class="profile-menu">

                                        <div class="profile-menu-items" onclick="toggleDropdown()"><!--profile-menu-->
                                            <?php 
                                                if (!empty($userData['u_profile']))
                                                {
                                                    echo '<img class="space img-profile selector" src="../uploads/' . htmlspecialchars($userData['u_profile']) . '" alt="Profile Image">';
                                                }
                                                else
                                                {
                                                    echo '<img src="../img/user.png" class="space img-profile selector">';
                                                }
                                            ?>
                                            <img src="../img/icons/arrow-down.svg" style="height:20px;width:20px; margin:auto;" class="space selector">
                                        </div>
                                    </div>

                                    <div class="dropdown-content-prof" id="dropdown-prof">
                                        <div class="prof-divider">
                                            <?php 
                                                if (!empty($userData['u_profile']))
                                                {
                                                    echo '<img class="space img-profile selector" src="../uploads/' . htmlspecialchars($userData['u_profile']) . '" alt="Profile Image">';
                                                }
                                                else
                                                {
                                                    echo '<img src="../img/user.png" class="space img-profile selector">';
                                                }
                                            ?>
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

                        <tr >
                            <td colspan="2" style="padding-left: 2%;">
                            <input type="search" name="search" class="form-control input-text header-searchbar" placeholder="Search">
                            </td>                         
                        </tr>

                        <!---------------------------------------------------tabs--------------------------------------------->
                        <tr>
                            <!-- <td colspan="2">
                                <button class="sort-butt"><a>SORT</a></button>
                            </td> -->
                        
                        </tr>

                        <tr>
                            <td colspan="4">
                                <center>
                                    <div class="abc scroll">
                                        <table width="100%" class="table table-borderless sub-table scrolldown animy" cellspacing="0">
                                            <thead class="headert border-bottom bg-primary text-white">
                                                <tr>
                                                    <th class="table-headin">ID</th>
                                                    <th class="table-headin">USERNAME</th>
                                                    <th class="table-headin">ACTION</th>
                                                    <th class="table-headin">DATE</th>
                                                </tr>
                                            </thead>

                                            <tbody class="table-con">
                                                <?php 
                                                if ($activityLogsResult->num_rows > 0) {
                                                    while ($row = $activityLogsResult->fetch_assoc()) {
                                                        echo "<tr class='border-bottom'>
                                                                <td>" . htmlspecialchars($row['id']) . "</td>
                                                                <td>" . htmlspecialchars($row['user_email']) . "</td>
                                                                <td>" . htmlspecialchars($row['action']) . "</td>
                                                                <td>" . htmlspecialchars($row['formatted_datetime']) . "</td>
                                                            </tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='4'>No activity logs found.</td></tr>";
                                                }
                                                ?> 
                                            </tbody>
                                        </table>
                                    </div>
                                </center>
                            </td>
                        </tr>

                </table>

           </div>

        </div>
    </div>

</body>
</html>