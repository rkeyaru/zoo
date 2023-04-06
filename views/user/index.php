<?php

use app\models\Users;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use app\assets\AppAsset;
use yii\web\JqueryAsset;
$this->registerJsFile("@web/js/main.js");


?>


<button type="button" class="btn btn-sm  btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="showUserCreate()">
<i class="bi bi-plus" style="font-size:20px;"></i>Add User
</button><br><br>
<div class="modal  fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header  bg-dark">
                <h5 class="modal-title  text-light" id="exampleModalLabel">Add User</h5>
                <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="wrapper" id="modalform">

                </div>

            </div>
           
        </div>
    </div>
</div>

 

<table class="table text-center table-bordered ">
    <thead>
        <tr>
            <th>
                S.No
            </th>
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
                Operation
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        foreach ($array as $val) {
        ?>
            <tr>
                <td>
                    <?php 
                    echo $count;
                    $count = $count + 1;
                    ?>
                </td>
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
                <?= Html::button("<i class='bi bi-pen'></i>", ['onclick' => 'editUser(this.id)', 'class' => 'btn btn-warning btn-sm ', 'id' => "edit" . Html::encode($val->userId)]) ?>

                    <?= Html::button("<i class='bi bi-trash'></i>", ['onclick' => 'deleteUser(this.id)', 'class' => 'btn btn-danger btn-sm', 'id' => "delete" . $val->userId]) ?>
                </td>

            </tr>
            
        <?php
        
        }
      

        ?>
       
    </tbody>
</table>



