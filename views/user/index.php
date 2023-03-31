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
                    <?= Html::a("Edit", ['edit', 'id' => $val->userId], ['class' => 'btn btn-sm btn-warning']) ?>
                    <?= Html::a("Delete", ['delete','id' => $val->userId], ['class' => 'btn btn-sm btn-danger']) ?> 
                </td>
           
            </tr>
        <?php
        }
die();
        ?>
    </tbody>
</table>