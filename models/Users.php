<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Users extends ActiveRecord
{
     
    public function rules()
    {

        return [
            [['firstName', 'lastName', 'email', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'unique'],
          

        ];
    }
 
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
}
