<?php 
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
$this->registerJsFile('@web/js/main.js');
$form = ActiveForm::begin(['id' => 'login']);

?>
  <h2 class="mt-3 text-center dispaly-3">Log in</h2>
 
  <?= $form->field($model, "email"); ?>
  <?= $form->field($model, "password")->passwordInput(); ?>
  <div class="form-group">
      <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button','onclick' => "authUser()"]) ?>
  </div>

  <?php ActiveForm::end();
    ?>    