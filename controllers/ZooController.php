<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Zoo;
use yii\db\Query;
use Yii;



class ZooController extends SessionController
{
    public function init()
    {
        parent::init();
    }



    public function actionIndex()
    {
        if (!isset(Yii::$app->session['username'])) {
            return $this->redirect('/zoo/site/error');
        }
        $array = Zoo::find()->where(['active' => '1'])->all();

        return $this->renderAjax('index', ['array' => $array]);
    }
    public function actionCount()
    {
        $val = Zoo::find()->where(['active' => '1'])->count();
        return "Zoo count:" . $val;
    }
    public function actionDelete()
    {
        $id = $this->request->post('id');

        $query = new Query();
        $query->createCommand()->update("zoo", ['active' => '0'], ['id' => $id])->execute();
        $array = Zoo::find()->where(['active' => '1'])->all();
    }
    public function actionCreate()
    {
        $model  = new Zoo();


        if ($this->request->isPost) {

            $array = $this->request->post();

            $model->load($array);
            $model->save();
            return "zoo added successfully";
        }


        return $this->renderAjax('_form', ["model" => $model]);
    }

    public function actionEdit($id)
    {
        $model = Zoo::find($id)->where(['id' => $id])->one();


        if ($this->request->isPost) {
            $array = $this->request->post();
            $model->load($array);
            $model->save();
            return "zoo updated successfully";
        }



        return $this->renderAjax('_editform', ['model' => $model]);
    }
}
