<?php

use app\models\Users;
use yii\helpers\Html;

 


?>
<p>
    <?= Html::a('Create User', ['create'], ['class' => 'mt-2 btn btn-success']) ?>
</p>
<table class="table table-striped">
    <thead>
        <tr>
            <th>
                First Name
            </th>
            <th>
                Last Name
            </th>
            <th>
                Email
            </th>
            <th>
                Password
            </th>
            <th>
                Operation
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($array as $val) {
        ?>
            <tr>
                <td>
                    <?= $val->firstName ?>
                </td>
                <td>
                    <?= $val->lastName ?>
                </td>
                <td>
                    <?= $val->email ?>
                </td>
                <td>
                    <?= $val->password ?>
                </td>
                <td>
                    <!-- <a href="edit?id=<?= $val->userId ?>"  class="btn btn-warning btn-sm" onclick="" > -->
        
                    </a>
                    <a href="edit?id=<?= $val->userId ?>" class="btn btn-warning btn-sm">
                        Edit
                    </a>
                    <a href="delete?id=<?= $val->userId ?>" class="btn btn-danger btn-sm">
                        Delete
                    </a>
                    
                </td>
            </tr>
        <?php
        }

        ?>
    </tbody>
</table>