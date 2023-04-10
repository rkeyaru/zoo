<?php 
namespace app\models; 
use yii\db\ActiveRecord;
class Animals extends ActiveRecord { 
    public function rules() { 
        return [
            [['name','s_name','gender'],'required']
        ];
    }

    
public static function tableName() { 
    return "Animals";
}
}
?>