<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
$form = ActiveForm::begin(['id' => 'editform']);

?>
<h2 class="text-center">Update Zoo</h2>
<?= $form->field($model,"name") ?>
<?= $form->field($model,"state") ?>
<?= $form->field($model,"city") ?>
<?= $form->field($model,"area") ?>
<?= Html::submitButton("Update",['class' => 'btn btn-sm btn-success']) ?>
<?php ActiveForm::end();?>