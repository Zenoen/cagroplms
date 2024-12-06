<?php
// $sql = "UPDATE `notifications` SET not_status = 1 AND not_for='admin'";

// if ($conn->query($sql) === TRUE) {
   
// } else {
// }
?>


<div class="container">
    <table width="100%" class="sub-table scrolldown animy small  table-borderless" cellspacing="0">
        <thead class="headert bg-primary text-white">
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
        </thead>
        <tbody class="table-con" id="dataTable">

            <?php
            if ($result_notifications->num_rows > 0) {

                while ($row = $result_notifications->fetch_assoc()) { ?>
                    <tr class="border-bottom  <?= ($row["not_status"] == 0) ? "bg-off-white fw-bold" : ""; ?>">
                        <td class="p-2"><?= $row["not_id"] ?></td>
                        <td><?= $row["not_title"] ?></td>
                        <td><?= $row["not_desc"] ?></td>
                        <td><?= $row["not_date"] ?></td>
                    <tr>
                <?php }
            }
                ?>

    </table>
</div>