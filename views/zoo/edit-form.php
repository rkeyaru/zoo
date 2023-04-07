<?php

use app\models\Zoo;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin(['id'  => 'zooedit']);



?>
 
<?= $form->field($model, "name"); ?>
<?= $form->field($model, "state"); ?>
<?= $form->field($model, "city"); ?>
<?= $form->field($model, "area")->textInput(['type' => 'number']);  ?>
<div class="form-group">
  <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button','onclick' => 'updateZoo(this.id)','id'  => $model->id]) ?>
</div>


<?php ActiveForm::end();
?>