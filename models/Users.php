<?php 
namespace app\models; 
use yii\db\ActiveRecord;
class Users extends ActiveRecord { 
public function rules()
{
    return [
        [['firstName','lastName','email','password'],'required'],
        ['email','email'],
    ];

}

public function validatePassword($password)
{
    return $this->password === $password;
}

}
?>