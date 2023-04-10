<?php 
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin(['options' => ['class' => 'container p-5 m-5','id' => 'login']]);

?>
  <h2 class="mt-3 text-center dispaly-3">Log in</h2>
 
  <?= $form->field($model, "email"); ?>
  <?= $form->field($model, "password")->passwordInput(); ?>
  <div class="form-group">
      <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button','onclick' => "authUser()"]) ?>
  </div>

  <?php ActiveForm::end();
    ?>    