  <?php

  use app\assets\AppAsset;
use app\models\UploadForm;
use app\models\UploadImageForm;
  // AppAsset::register($this);

  use yii\bootstrap5\ActiveForm;
  use yii\helpers\Html;

  $form = ActiveForm::begin(['options' => ['class' => 'container p-5 m-5','id' => 'signup', 'enctype' =>
  'multipart/form-data']]);


  ?>
 
 
 

  <h2 class="mt-3 text-center dispaly-3">Sign up</h2>
  <?= $form->field($model, "firstName"); ?>
  <?= $form->field($model, "lastName"); ?>
  <?= $form->field($model, "email"); ?>
  <?= $form->field($model, "password")->passwordInput(); ?>
  <?= $form->field(new UploadForm(), 'imageFile')->fileInput() ?>
 
  <div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button', 'onclick' => 'signUp()']) ?>
  </div>

  <?php ActiveForm::end();
  ?>