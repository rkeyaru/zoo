<?php

use app\models\Animals;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use app\models\Zoo;
use yii\helpers\ArrayHelper;

$form = ActiveForm::begin(["id" => 'signup']);
$model = new Animals();
$zoo = new Zoo();
$items = ArrayHelper::map(Zoo::find()->where(['active' => '1'] )->all(), 'id', 'name');
 


?>
<h2 class="mt-3 text-center dispaly-3">
    Add Animal
</h2>
<?= $form->field($model, "name"); ?>
<?= $form->field($model, "gender"); ?>
<?= $form->field($model, "s_name")->label("Scientific Name"); ?>
<?= $form->field($zoo, "id")->label("Zoo Name")->dropDownList($items) ?>

 


<div class="form-group">
  <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
</div>

<?php ActiveForm::end();
?>