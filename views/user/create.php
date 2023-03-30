<?php

use app\models\Users;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin(["id" => 'signup']);



?>
<h2 class="mt-3 text-center dispaly-3">
    Add User
</h2>
<?= $form->field($model, "firstName"); ?>
<?= $form->field($model, "lastName"); ?>
<?= $form->field($model, "email"); ?>
<?= $form->field($model, "password")->passwordInput(); ?>
<div class="form-group">
  <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
</div>

<?php ActiveForm::end();
?>