<div id="mySidebar" class=" sidebar mt-0 ">
    <div class="inner-sidebar">
        <div id="sidebarlogo" class=" d-flex  align-items-center ps-2 pt-2 pb-1  ">
            <button class="btn  me-2  text-white " style="display: none;" id="closebtn" type="button"
                onclick="toggleNav()"><i class="bi h5 bi-list"></i>

            </button>


            <!-- <span class="h5 text-truncate pt-1 fw-bold sidebar-item-text">CAGRO PLMS</span> -->

        </div>

        <div class="round_sm"
            style="padding:1rem 0rem;display:flex;justify-content:left;margin-bottom:30px;align-items:center;margin:10px;">
            <span
                style="margin-left:20px;margin-right:20px;color:white;font-size:25px;font-weight:bold;line-height:23px">CAGRO
                <br> PLMS</span>

            <img src="../img/logo-trans.png" class="selector " width="30%">
        </div>
        <div class="mt-4 pt-2">
            <?php

            //sidebar items



            $pages = [
                'dashboard' => 'bi bi-house-fill',
                // 'clients' => 'bi-person-fill', 
                'fishers' => 'bi bi-file-earmark-medical-fill',
                'fishinggears' => 'bi bi-gear-fill',
                'fishcages' => 'bi bi-box-seam-fill',
                'vessels' => 'bi bi-gear-wide-connected',
                'licensing' => 'bi bi-credit-card-2-front-fill',
                'notifications' => 'bi-bell-fill',
                'requirements' => 'bi bi-list-check',


            ];
            $vessels = [

                'Motorized' => 'bi bi-circle ',
                'Non-Motorized' => 'bi bi-circle ',


            ];


            $fishers = [
                'fisherfolks' => 'bi bi-circle',
                'fishworkers' => 'bi bi-circle',



            ];



            $current_page = $_GET['page'] ?? 'dashboard';
            $current_type = $_GET['vesseltype'] ?? '';
          
            ?>

            <?php foreach ($pages as $page => $icon): ?>

                <?php if ($page === 'fishers'):
                ?>
                    <?php $selectedMainMenu = array_key_exists($current_page, $pages) || array_key_exists($current_type, $vessels) ? 'selected' : ''; ?>
                    <?php $selectedMain = array_key_exists($current_page, $pages) | array_key_exists($current_type, $vessels) ? 'show' : '';
                    
                  ?>

                    <a class="sidebar-item  <?php echo $selectedMainMenu; ?>" data-bs-toggle="collapse" data-bs-target="#mainmenu">
                        <div class="d-flex align-items-center ">
                            <i class=" <?php echo $icon; ?>"></i>
                            <span class="ms-3 sidebar-item-text collapse w-100 show ">Permits</span>
                            <i class="bi  bi-caret-down-fill " style="font-size:8pt"></i>
                        </div>
                    </a>
                    <div class="collapse <?= $selectedMain ?>  m-2  round_sm " style="background-color: #025193;padding:1px 0px"
                        id="mainmenu">
                        <?php $selectedPermit = array_key_exists($current_page, $fishers) ? 'selected selectedSub' : ''; ?>
                        <?php $selected = array_key_exists($current_page, $fishers) ? 'show' : ''; ?>

                        <a class="sidebar-item mt-2 <?php echo $selectedPermit; ?>" data-bs-toggle="collapse" data-bs-target="#permits">

                            <div class="d-flex align-items-center ">
                                <i class=" <?php echo $icon; ?>"></i>
                                <span class="ms-3 sidebar-item-text collapse w-100 show ">Fishers</span>
                                <i class="bi  bi-caret-down-fill " style="font-size:8pt"></i>
                            </div>

                        </a>
                        <div class="collapse <?= $selected ?> m-2 ms-4    round_sm " style="background-color: #03467e;padding:1px 0px"
                            id="permits">
                            <div class="mt-1 mb-1">
                                <?php foreach ($fishers as $permit => $icon): ?>

                                    <?php $selected = ($current_page == $permit) ? 'selected' : ''; ?>
                                    <a href="index.php?page=<?php echo $permit; ?>"
                                        class="sidebar-item-permit m-1 <?php echo $selected; ?>">
                                        <i class="me-3 <?php echo $icon; ?>"></i>
                                        <?php
                                        $formatted = str_replace(
                                            ['fisherfolks', 'fishworkers', 'fishinggears', 'fishcages', 'fishingboats'],
                                            ['Fisher Folks', 'Fish Workers', 'Fishing Gears', 'Fishing Cages', 'Fishing Boats'],
                                            $permit
                                        );

                                        ?>
                                        <span class="sidebar-item-text collapse  show "><?= $formatted ?></span>
                                    </a>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    <?php elseif ($page === 'vessels'):
                    ?>
                        <?php $selectedPermit = array_key_exists($current_type, $vessels) ? 'selected selectedSub' : '';
                        ?>
                        <?php $selected = array_key_exists($current_type, $vessels) ? 'show' : ''; ?>

                        <a class="sidebar-item  <?php echo $selectedPermit; ?>" data-bs-toggle="collapse" data-bs-target="#vessels">

                            <div class="d-flex align-items-center ">
                                <i class=" <?php echo $icon; ?>"></i>
                                <span class="ms-3 sidebar-item-text collapse w-100 show ">Fishing Vessels</span>
                                <i class="bi  bi-caret-down-fill " style="font-size:8pt"></i>
                            </div>

                        </a>
                        <div class="collapse <?= $selected ?> m-2 ms-4 round_sm " style="background-color: #03467e;padding:1px 0px"
                            id="vessels">
                            <div class="mt-1 mb-1">
                                <?php foreach ($vessels as $permit => $icon): ?>

                                    <?php $selected = ($current_type == $permit) ? 'selected' : ''; ?>
                                    <a href="index.php?page=fishingvessels&vesseltype=<?php echo $permit; ?>"
                                        class="sidebar-item-permit m-1 <?php echo $selected; ?>">
                                        <i class="me-3 <?php echo $icon; ?>"></i>
                                        <?php
                                        $formatted = str_replace(
                                            ['fisherfolks', 'fishworkers', 'fishinggears', 'fishcages', 'fishingboats'],
                                            ['Fisher Folks', 'Fish Workers', 'Fishing Gears', 'Fishing Cages', 'Fishing Boats'],
                                            $permit
                                        );

                                        ?>
                                        <span class="sidebar-item-text collapse  show "><?= $formatted ?></span>
                                    </a>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    </div>

                <?php else: ?>
                    <?php $selected = ($current_page == $page) ? 'selected' : '';
                    $formatted = str_replace(
                        ['fisherfolks', 'fishworkers', 'fishinggears', 'fishcages', 'fishingboats'],
                        ['Fisher Folks', 'Fish Workers', 'Fishing Gears', 'Fish Cages', 'Fishing Boats'],
                        $page
                    );
                    ?>
                    <a href="index.php?page=<?php echo $page; ?>" class="sidebar-item d-flex <?php echo $selected; ?>">
                        <i class="me-3 <?php echo $icon; ?>"></i>
                        <span class="sidebar-item-text collapse  show "><?php echo ucfirst($formatted); ?></span>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Div to show/hide -->


        </div>
    </div>


</div>