<?php

use app\models\Zoo;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap5\Html;    


$form = ActiveForm::begin(['id' => 'animaledit']);

$items = ArrayHelper::map($zoos, 'id', 'name');
?>
 

<?= $form->field($model,"name") ?>
<?= 
$form->field($model, "gender")->radioList(['Male' =>"Male", 'Female' =>"Female"]); 

?>
<?= 
$form->field($model,"s_name")->label("Scientific Name")

 ?>
<?= $form->field(new Zoo(), "id")->label("Zoo Name")->dropDownList($items,['options' => [$current => ['Selected' => true]]]) ?>

<div class="form-group">
  <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button','onclick' => 'updateAnimal(this.id)','id' => $model->id]) ?>
</div>

<?php ActiveForm::end();?>