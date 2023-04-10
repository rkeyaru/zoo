<?php 
namespace app\models; 
use yii\db\ActiveRecord;
class Zoo extends ActiveRecord { 
public function rules() { 
    return [
        [['name', 'state', 'city', 'area'],'required']
    ];
}
public function attributeLabels()
{
    return [ 
        'name' => "Zoo Name",
        'state' => 'Zoo State',
        'city' => 'Zoo City',
        'area' => 'Area (in km square)',
    ];
}
}
?>