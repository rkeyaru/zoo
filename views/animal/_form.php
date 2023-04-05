<?php

use app\models\Animals;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use app\models\Zoo;
use yii\helpers\ArrayHelper;

$form = ActiveForm::begin(["id" => 'animaladd']);



 


?>
<h2 class="mt-3 text-center dispaly-3">
    Add Animal
</h2>
<?= $form->field($model, "name"); ?>
<?= 

$form->field($model, "gender")->radioList(['Male' =>"Male", 'Female' =>"Female"]); 
?>
<?= $form->field($model, "s_name")->label("Scientific Name"); ?>
<?= $form->field($zoo, "id")->label("Zoo Name")->dropDownList($items) ?>

 


<div class="form-group">
  <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button' ,'onclick' => 'addAnimal()']) ?>
</div>

<?php ActiveForm::end();
?>