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
                'profile' => 'bi bi-house-fill',
                'permits' => 'bi bi-file-earmark-medical-fill',

                'activity' => 'bi-list-columns-reverse',
               


            ];
            $permits = [
                'fisherfolks' => 'bi bi-circle ',
                'fishworkers' => 'bi bi-circle',
                'fishinggears' => 'bi bi-circle',
                'fishingcages' => 'bi bi-circle',
                'fishingboats' => 'bi bi-circle',


            ];




            $current_page = $_GET['page'] ?? 'dashboard';
            $formattedCurrentPage = str_replace(
                ['fisherfolk-form', 'fishworker-form', 'fishgear_form', 'fishcage-op-form', 'fishingboats_form'],

                ['fisherfolks', 'fishworkers', 'fishinggears', 'fishingcages', 'fishingboats'],
                $current_page
            );
            
            ?>

            <?php foreach ($pages as $page => $icon): ?>
                <?php if ($page === 'permits'):
                    ?>
                    <?php $selectedPermit = array_key_exists($formattedCurrentPage, $permits) ? 'selected' : ''; ?>
                    <?php $selected = array_key_exists($formattedCurrentPage, $permits) ? 'show' : ''; ?>
                    <?php if ($is_verified == 1): ?>
                    <a class="sidebar-item  <?php echo $selectedPermit; ?>" data-bs-toggle="collapse" data-bs-target="#permits">

                        <div class="d-flex align-items-center ">
                            <i class=" <?php echo $icon; ?>"></i>
                            <span class="ms-3 sidebar-item-text collapse w-100  show ">&nbsp;<?php echo ucfirst($page); ?></span>
                            <i class="bi  bi-caret-down-fill " style="font-size:8pt"></i>
                        </div>

                    </a>
                    <div class="collapse <?= $selected ?> m-2  round_sm " style="background-color: #025193;padding:1px 0px"
                        id="permits">
                        <div class="mt-1 mb-1">
                            <?php foreach ($permits as $permit => $icon): 
                                  
                                
                                ?>
                                
                                <?php $selected = ($formattedCurrentPage == $permit) ? 'selected' : ''; 
                                
                                $formattedForm = str_replace(
                                    ['fisherfolks', 'fishworkers', 'fishinggears', 'fishingcages', 'fishingboats'],
                                    ['fisherfolk-form', 'fishworker-form', 'fishgear_form', 'fishcage-op-form', 'fishingboats_form'],
                                    $permit
                                );
                                
                                
                                ?>

                                

                                <a href="index.php?page=<?php echo $formattedForm; ?>"
                                    class="sidebar-item-permit m-1 <?php echo $selected; ?>">
                                    <i class="me-3 small <?php echo $icon; ?>"></i>
                                    <?php
                                    $formatted = str_replace(
                                        ['fisherfolks', 'fishworkers', 'fishinggears', 'fishingcages', 'fishingboats'],
                                        ['Fisherfolk', 'Fishworker', 'Fishing Gears', 'Fish Cage', 'Fishing Vessel'],
                                        $permit
                                    );

                                    ?>
                                    <span class="sidebar-item-text collapse show  "><?= $formatted ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>

                    </div>
                    <?php endif; ?>
                <?php else: ?>
                    <?php $selected = ($current_page == $page) ? 'selected' : ''; ?>
                    <a href="index.php?page=<?php echo $page; ?>" class="sidebar-item d-flex <?php echo $selected; ?>">
                        <i class="me-3 <?php echo $icon; ?>"></i>
                        <span class="sidebar-item-text collapse  show"><?php echo ucfirst($page); ?></span>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Div to show/hide -->


        </div>


    </div>
</div>