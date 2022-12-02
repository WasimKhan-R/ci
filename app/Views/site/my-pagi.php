<?php

use App\Controllers\index;
?>
<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Number</th>
    </thead>
    <tbody>
        <?php
        if (count($users) > 0) {
            foreach ($users as $index => $key) {
        ?>
                <tr>
                    <td><?= $key['id'] ?></td>
                    <td><?= $key['name'] ?></td>
                    <td><?= $key['age'] ?></td>
                    <td><?= $key['phone'] ?></td>
                </tr>
        <?php 
        }
        } ?>

    </tbody>

</table>

<?= $pager->links(); ?>