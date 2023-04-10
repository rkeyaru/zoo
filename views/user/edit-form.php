<?php

 
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;



 
$form = ActiveForm::begin(["id" => 'useredit']);?>
 
<?= $form->field($model, "firstName"); ?>
<?= $form->field($model, "lastName"); ?>
<?= $form->field($model, "email"); ?>
<?= $form->field($model, "password")->passwordInput(['value' => ""]); ?>
<?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button','onclick' => 'updateUser(this.id)','id' => $model->userId]) ?>
<?php ActiveForm::end();
?>


 
