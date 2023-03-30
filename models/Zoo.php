<?php 
namespace app\models; 
use yii\db\ActiveRecord;
class Zoo extends ActiveRecord { 
public function rules() { 
    return [
        [['name', 'state', 'city', 'area'],'required']
    ];
}
}
?>