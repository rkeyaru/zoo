<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use yii\db\Query;
 

class UserController extends SessionController
{
    public function beforeAction($action)
    {

        if(parent::GetSession()) {
            if($this->request->isAjax) {
            return true;
            }
         }
         return $this->redirect("site/login");

    }
    // public function init()
    // {
    //     parent::init();
       
    // }
    public function actionIndex()
    {


        $model = new Users();
        $array = Users::find()->where(['active' => '1'])->all();
        return $this->renderAjax('index', ['array' => $array, 'model' => $model]);
    }
    public function actionDelete()
    {




        $id = $this->request->post("id");


        $query = new Query();
        $query->createCommand()->update("users", ['active' => '0'], ['userId' => $id])->execute();
        return "user deleted successfully";
    }








    public function actionCount()
    {
        $val = Users::find()->where(['active' => '1'])->count();
        return "User count:" . $val;
    }
    public function actionCreate()
    {
        $model = new Users();
        if ($this->request->isPost) {
            $array = $this->request->post();
            $model->load($array);
            $hash = $hash = Yii::$app->getSecurity()->generatePasswordHash($array["Users"]["password"]);
            $model->password = $hash;
            $model->save();
            return "User Added successfully";
        }

        return $this->renderAjax("create-form", ['model' => $model]);
    }
    public function actionEdit($id)
    {
        $model  = Users::find()->where(['userId' => $id])->one();

        if ($this->request->isPost) {
            $array = $this->request->post();
            $hash = $hash = Yii::$app->getSecurity()->generatePasswordHash($array["Users"]["password"]);

            
            $model->load($array);

            $model->password = $hash;
            if ($model->save()) {
                return "Updated successfully";
            }
            return "user not updated";
        }




        return $this->renderAjax('edit-form', ['model' => $model]);
    }
}
