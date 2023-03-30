<?php

use app\models\Zoo;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap5\Html;    


$form = ActiveForm::begin(['id' => 'edit-form']);

$items = ArrayHelper::map($zoos, 'id', 'name');
?>
<h2 class="text-center">Edit A</h2>

<?= $form->field($model,"name") ?>
<?= $form->field($model,"gender") ?>
<?= $form->field($model,"s_name") ?>
<?= $form->field(new Zoo(), "id")->label("Zoo Name")->dropDownList($items,['options' => [$current => ['Selected' => true]]]) ?>

<div class="form-group">
  <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
</div>

<?php ActiveForm::end();?>