<?php 
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin(['id' => 'login']);

?>
  <h2 class="mt-3 text-center dispaly-3">Log in</h2>
 
  <?= $form->field($model, "email"); ?>
  <?= $form->field($model, "password")->passwordInput(); ?>
  <?= $form->field($model, "role")->dropDownList(['admin' =>  'admin','sadmin' => 'super admin']); ?>
  <div class="form-group">
      <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button','onclick' => 'authStaff()']) ?>
  </div>

  <?php ActiveForm::end();
    ?>    