<?php

use app\models\Zoo;
use yii\db\Query;
use yii\helpers\Html;





?>
<p>
    <?= Html::a('Add Zoo', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<table class="table table-striped">
    <thead>
        <tr>
            <th>
                ID
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
                area
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
                    <?= $val->id ?> 
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
                    <?= Html::a("Edit",['edit','id' => $val->id],['class' => 'btn btn-sm btn-warning']) ?>
                    <?= Html::a("Delete",['delete','id' => $val->id],['class' => 'btn btn-sm btn-danger']) ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>