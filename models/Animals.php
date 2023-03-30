<?php 
namespace app\models; 
use yii\db\ActiveRecord;
class Animals extends ActiveRecord { 
public static function tableName() { 
    return "Animals";
}
}
?>