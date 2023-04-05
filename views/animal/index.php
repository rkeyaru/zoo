<?php

use app\models\Animals;
use yii\db\Query;
use yii\helpers\Html;



$query = new Query();
$array = $query->select("a.id as aid,a.name as aname,a.s_name,a.gender  ,z.name as zname,z.id as zid")->from(" Animals as a")->join("INNER JOIN", "animal_zoo_map as map", "map.animal_id= a.id")->join("INNER JOIN", "zoo as z", "map.zoo_id = z.id")->where(["a.active" => '1'])->all();

?>


<button type="button" class="btn btn-sm  btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="showAnimalCreate()">
    <i class="fa-regular fa-plus"></i> Add Animal
</button><br><br>
<div class="modal  fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header  bg-dark">
                <h5 class="modal-title  text-light" id="exampleModalLabel">Add User</h5>
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
                Animal Name
            </th>
            <th>
                gender
            </th>
            <th>
                Scientific Name
            </th>
            <th>
                Zoo Name
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
                    <?php echo $count;
                    $count += 1;
                     ?>
                </td>
                <td>
                    <?= $val['aname'] ?>
                </td>
                <td>
                    <?= $val['gender'] ?>
                </td>
                <td>
                    <?= $val['s_name'] ?>
                </td>
                <td>
                    <?= $val['zname'] ?>
                </td>
                <td>
                <?= Html::button("<i class='bi bi-pen'></i>", ['onclick' => 'editAnimal(this.id)', 'class' => 'btn btn-warning btn-sm', 'id' => "edit" . $val['aid']]) ?>
                    <?= Html::button("<i class='bi bi-trash'></i>", ['onclick' => 'deleteAnimal(this.id)', 'class' => 'btn btn-danger btn-sm', 'id' => "delete" . $val['aid']]) ?>
                </td>
            </tr>
        <?php


        }



        ?>
    </tbody>
</table>