<?php

 
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;



 
$form = ActiveForm::begin(["id" => 'useradd']);?>

<?= $form->field($model, "firstName"); ?>
<?= $form->field($model, "lastName"); ?>
<?= $form->field($model, "email"); ?>
<?= $form->field($model, "password")->passwordInput(); ?>
<?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button','onclick' => 'addUser()']) ?>
<?php ActiveForm::end();
?>


 
