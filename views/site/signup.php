  <?php

  use app\assets\AppAsset;

  // AppAsset::register($this);

  use yii\bootstrap5\ActiveForm;
  use yii\helpers\Html;

  $form = ActiveForm::begin(['id' => 'signup', 'options' => ['class' => '']]);



  ?>
  <h2 class="mt-3 text-center dispaly-3">Sign up</h2>
  <?= $form->field($model, "firstName"); ?>
  <?= $form->field($model, "lastName"); ?>
  <?= $form->field($model, "email"); ?>
  <?= $form->field($model, "password")->passwordInput(); ?>
  <div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button', 'onclick' => 'signUp()']) ?>
  </div>

  <?php ActiveForm::end();
  ?>