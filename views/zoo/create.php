<?php

use app\models\Zoo;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin(["id" => 'zoo']);
$model = new Zoo();


?>
<h2 class="mt-3 text-center dispaly-3">
    Add Zoo
</h2>
<?= $form->field($model, "name"); ?>
<?= $form->field($model, "state"); ?>
<?= $form->field($model, "city"); ?>
<?= $form->field($model, "area")->textInput(['type' => 'number']);  ?>
<div class="form-group">
  <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
</div>


<?php ActiveForm::end();
?>