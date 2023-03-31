<?php

use yii\db\Query;
use yii\helpers\Html;



$query = new Query();
$array = $query->select("a.id as aid,a.name as aname,a.s_name,a.gender  ,z.name as zname,z.id as zid")->from(" Animals as a")->join("INNER JOIN", "animal_zoo_map as map", "map.animal_id= a.id")->join("INNER JOIN", "zoo as z", "map.zoo_id = z.id")->where(["a.active" => '1',"z.active" => '1'])->all();

?>

<p>
    <?= Html::a('Add Animal', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<table class="table border table-striped">
    <thead>
        <tr>
            <th>
                ID
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
        foreach ($array as $val) {
        ?>

            <tr>
                <td>
                    <?= $val['aid'] ?>
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
                    <?= Html::a("Edit", ['edit', 'id' => $val['aid']], ['class' => 'btn btn-sm btn-warning']) ?>
                    <?= Html::a("Delete", ['delete','id' => $val['aid']], ['class' => 'btn btn-sm btn-danger']) ?>
                </td>
            </tr>
        <?php

die();
        }
        ?>
    </tbody>
</table>