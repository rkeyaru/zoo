    <?php

use app\models\Zoo;
use yii\db\Query;
use yii\helpers\Html;





?>
 
<button type="button" class="btn btn-sm  btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="showZooCreate()">
<i class="bi bi-plus" style="font-size:20px;"></i>Add Zoo
</button><br><br>
 
<div class="modal  fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  ">
        <div class="modal-content">
            <div class="modal-header bg-dark  ">
                <h5 class="modal-title  text-light" id="exampleModalLabel">Add Zoo </h5>
                 <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>   
            <div class="modal-body">
                <div class="wrapper" id="modalform">
                    


                </div>

            </div>

        </div>
    </div>
</div>


<table class="table text-center table-bordered">
    <thead>
        <tr>
            <th>
                S.No
            </th>
            <th>
                Name
            </th>
            <th>
                State
            </th>
            <th>
                City
            </th>
            <th>
                Area 
            </th>
            <th>
                Operation
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        $count =1;
        foreach ($array as $val) {
        ?>
            <tr>
                <td>
                    <?php  echo $count;
                    $count += 1;
                     ?> 
                </td>
                <td>
                <?= $val->name ?> 
                </td>
                <td>
                <?= $val->state ?> 
                </td>
                <td> 
                      <?= $val->city ?> 

                </td>
                <td> 
                      <?= $val->area ?> 

                </td>
                <td>
                <?= Html::button("<i class='bi bi-pen'></i>",['onclick' => 'editZoo(this.id)','class' => 'btn btn-warning btn-sm' ,'id' => "edit".$val->id]) ?>
                    <?= Html::button("<i class='bi bi-trash'></i>",['onclick' => 'deleteZoo(this.id)','class' => 'btn btn-danger btn-sm' ,'id' => "delete".$val->id]) ?>
                </td>
            </tr>
        <?php
        }
        die();
        ?>
    </tbody>
</table>