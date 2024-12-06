<nav class="navbar navbar-expand-md navbar-light sticky-top bg-transparent" id="nav">
    <div class="d-flex w-100 align-items-center">
        <!-- <div id="opnbtn"></div> -->
        <button class="btn ms-2" id="opnbtn" type="button" onclick="toggleNav()">
            <i class="bi fs-5 bi-list"></i>
        </button>
        <a href="#" class="navbar-brand me-2">
            <div class="d-flex align-items-center pe-3 rounded-pill">
                <!-- <img src="./img/logo small.png" class="me-sm-3 me-lg-2 ms-sm-0 border rounded-circle p-1" width="30" alt=""> -->
                <!-- <h6 class="mt-1 fs-5 m-1 w-50"><span class="text-purple fw-bold text-truncate">CAGRO PLMS   -->

                <!-- </h6> -->
                <?php
                $formatted = str_replace(
                    ['fisherfolks', 'fishworkers', 'fishinggears', 'fishingcages', 'fishingboats'],
                    ['Permit • Fisherfolks', 'Permit • Fishworkers', 'Permit • Fishing Gears', 'Permit • Fish Cage', 'Permit • Fishing Vessel'],
                    $_GET['page']
                );
                ?>
                <!-- <span class="ps-sm-5 h4 ps-1 pt-1 text-capitalize" style="color:#024072"><?= $formatted ?></span> -->
            </div>
        </a>




        <div class="d-flex w-100  justify-content-end align-items-center">

            <?php
            $notifCounter = $conn->query("SELECT COUNT(*) AS total FROM `notifications` WHERE not_status = 0 AND not_for='admin'");
            $notifCounter = $notifCounter->fetch_assoc()['total'] ?? 0;
            $notifCounter =  ($notifCounter == 0) ? '' : $notifCounter;
            ?>

            <!-- User Icon -->
            <div class="dropdown pe-3 ">
                <button
                    class="btn text-dark float-end ps-2 bg-white pe-2 p-1 rounded-pill border align-items-center d-flex toggle"
                    type="button" id="userDropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    &nbsp; <small><?php echo $userData['fname'] ?></small>&nbsp;<i class="bi bi-person-fill"></i>&nbsp;
                </button>
                <ul class="dropdown-menu round_md dropdown-menu-end round me-2" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item small" href="../logout.php">Logout</a></li>
                </ul>
                <button
                    class="btn text-dark float-end ps-2 me-2 bg-white pe-2 p-1 rounded-pill border align-items-center "
                    type="button" id="userDropdown" data-bs-toggle="dropdown" aria-haspopup="true">
                    <i class="bi bi-bell<?= ($notifCounter == "") ? "" : "-fill"; ?>"></i> <span class="badge bg-danger rounded-circle small"><?= $notifCounter ?></span>
                </button>
                <ul class="dropdown-menu round_md dropdown-menu-end round  shadow    small" aria-labelledby="userDropdown" style="min-width:320px;">
                    <div class="d-flex align-items-center border-bottom">
                        <div class="w-100 px-sm-3  p-2">
                            <h5 class="m-0 p-0">Notifications</h5>
                        </div>
                        <div class=" w-100 px-sm-3 text-end p-2 ">
                            <a href="?page=notifications">
                                <button class="btn p-0 px-2 py-1 text-primary rounded-pill border "><small>See All</small></button>
                            </a>
                        </div>
                        <!-- <div>

                            <span class="w-100 fs-6 p-2"></span>
                        </div> -->
                    </div>

                    <div class="overflow-auto" style="max-height: 500px;">
                        <?php
                        // SELECT COUNT(*) AS total FROM `notifications` WHERE not_status = 0;

                        $sql = "SELECT * FROM notifications WHERE  not_for='admin' ORDER BY  not_id DESC LIMIT 10  ";
                        $notif = $conn->query($sql);
                        if ($notif->num_rows > 0) {
                            while ($row = $notif->fetch_assoc()) {
                        ?>
                                <li>
                                    <?php
                                    $page = str_replace(
                                        ["fishcage", "fisherfolks", "fishingboats", "fishinggears", "fishworkerlicense"],
                                        ["fishcages", "fisherfolks", "fishingvessels", "fishinggears", "fishworkers"],
                                        $row["row_type"]
                                    )
                                    ?>
                                    <a class="dropdown-item small p-2   border-bottom pe-3 <?= ($row["not_status"] == 0) ? "bg-off-white fw-bold " : ""; ?>  ps-0" href="?page=<?= $page ?>&notifid=<?= $row["not_id"] ?>">
                                        <div class="d-flex gap-2 ">
                                            <div class="d-flex align-items-center  ps-2  ">
                                                <div class=" ">
                                                    <span
                                                        class="btn   text-dark float-end ps-3 pe-3 p round_sm  align-items-center ">

                                                        <i class="bi bi-bell<?= ($row["not_status"] == 0) ? "-fill" : ""; ?> h5 "></i>

                                                    </span>
                                                </div>
                                            </div>
                                            <div class="w-100 ">
                                                <div class="row  ">
                                                    <div class="col-6 ">
                                                        <span class="fs-6 p-0 m-0"><small><?= $row["not_title"] ?></small> </span>
                                                    </div>
                                                    <div class="col-6 text-end ">
                                                        <span class=" p-0 m-0">
                                                            <small> <small>
                                                                    <?php
                                                                    date_default_timezone_set('Asia/Manila');
                                                                    // Get the current time and the not_date from the database
                                                                    $now = new DateTime();
                                                                    $not_date = new DateTime($row["not_date"]);

                                                                    // If not_date is in the future, calculate the difference from now
                                                                    $interval = $now->diff($not_date);

                                                                    // Handle different time intervals
                                                                    if ($interval->y > 0) {
                                                                        echo $interval->y . ' year' . ($interval->y > 1 ? 's' : '') . ' ago';
                                                                    } elseif ($interval->m > 0) {
                                                                        echo $interval->m . ' month' . ($interval->m > 1 ? 's' : '') . ' ago';
                                                                    } elseif ($interval->d > 0) {
                                                                        echo $interval->d . ' day' . ($interval->d > 1 ? 's' : '') . ' ago';
                                                                    } elseif ($interval->h > 0) {
                                                                        echo $interval->h . ' hour' . ($interval->h > 1 ? 's' : '') . ' ago';
                                                                    } elseif ($interval->i > 0) {
                                                                        echo $interval->i . ' min' . ($interval->i > 1 ? 's' : '') . ' ago';
                                                                    } else {
                                                                        echo 'Just now';
                                                                    }
                                                                    ?>
                                                                </small>
                                                            </small>
                                                        </span>

                                                    </div>
                                                </div>
                                                <p class="text-wrap p-0 m-0 w-100 pb-2" style="line-height: 15px;"> <small><?= $row["not_desc"] ?></small> </p>
                                            </div>
                                        </div>

                                    </a>
                                </li>

                        <?php }
                        }
                        ?>
                    </div>

                </ul>
            </div>
        </div>
    </div>
</nav>