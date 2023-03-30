<?php 
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;


$form = ActiveForm::begin(['id' => 'update-form']);
?>
<h2 class="text-center">Update User</h2>
<?= $form->field($model,"firstName") ?>
<?= $form->field($model,"lastName") ?>
<?= $form->field($model,"email") ?>
<?= $form->field($model,"password") ?>
<?= Html::submitButton('Submit',['class' => 'btn btn-success btn-sm']) ?>
<?php ActiveForm::end();?>