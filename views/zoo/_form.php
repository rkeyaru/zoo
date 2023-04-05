<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
$form = ActiveForm::begin(['id' => 'zooadd']);

?>
<h2 class="text-center">Add Zoo</h2>
<?= $form->field($model,"name") ?>
<?=

 $form->field($model,"state")
 ?>
<?= $form->field($model,"city") ?>
<?= $form->field($model, "area")->textInput(['type' => 'number']);  ?>
<?= Html::submitButton("Add Zoo",['class' => 'btn btn-sm btn-success','onclick' => "addZoo()"]) ?>
<?php ActiveForm::end();?>