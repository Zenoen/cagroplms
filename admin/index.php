<?php
include("../conn.php");
include("functions/admin_session.php");
include("../class/SMSNotifier.php");
include("../class/LicenseSMSNotifier.php");


if (isset($_GET['notifid'])) {
    $notifId = intval($_GET['notifid']);
    $notifPage = $_GET['page'];

    $sql = "UPDATE `notifications` SET not_status = 1 WHERE row_type = ? AND not_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("si", $notifPage, $notifId);
        $stmt->execute();
        $stmt->close();
    } else {
        error_log("Failed to prepare SQL statement: " . $conn->error);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'includes/cdn.php' ?>

    <title><?= ucfirst($_GET['page']) ?> | PLMS</title>
    <style>

    </style>
</head>

<body class="overflow-auto">

    <?php
    include 'includes/sidebar.php'
    ?>
    <?php
    $formattedPage = str_replace(
        ['fisherfolks', 'fishworkers', 'fishinggears', 'fishingcages', 'fishingboats'],
        ['Fisher Folks', 'Fish Workers', 'Fishing Gears', 'Fishing Cages', 'Fishing Boats'],
        $_GET['page']
    );
    ?>
    <div id="main" class="   p-sm-1  ">
        <?php
        include 'includes/navbar.php'
        ?>
        <h3 class="ps-sm-5 ps-3 text-capitalize" style="color:#024072"><?=$formattedPage ?></h3>
        <br>
        <?php
        $page = $_GET['page'] ?? '';

        $allowedpages = ['dashboard', 'clients', 'fisherfolks', 'fishworkers', 'fishingvessels', 'fishcages', 'fishinggears', 'licensing', 'Activity', 'requirements', 'notifications'];

        if (in_array($page, $allowedpages)) {
            include "$page.php";
        } else {
            // include "404.php";

        }



        ?>


    </div>

</body>
<script>
    // $(document).ready(function () {
    //     // Target all select inside modal
    //     $(".modal").on('shown.bs.modal', function () {
    //         $(this).find("select").select2({
    //             dropdownParent: $(this),
    //             theme: 'bootstrap-5',
    //             placeholder: function () {
    //                 return $(this).data('placeholder');
    //             }
    //         });
    //     });
    //     // Target all select
    //     $('select').select2({
    //         theme: "bootstrap-5",
    //         // width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    //         placeholder: $(this).data('placeholder'),
    //     });
    // });
</script>

</html>