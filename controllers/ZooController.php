<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Zoo;
use yii\db\Query;



class ZooController extends Controller
{
    public function actionIndex()
    {
        
        $array = Zoo::find()->where(['active' => '1'])->all();
        return $this->render('index',['array' => $array]);
    }
    public function actionDelete($id)
    {
        
        $query = new Query();
        $query->createCommand()->update("zoo", ['active' => 0], ['id' => $id])->execute();
        $array = Zoo::find()->where(['active' => '1'])->all();
        return $this->render('index',['array' => $array]);
    }
    public function actionCreate()
    {
        $model  = new Zoo();


        if ($this->request->isPost) {
            $array = $this->request->post();
            $model->load($array);
            if ($model->validate()) {
                $model->save();
                return $this->redirect(['index']);
            }
            return "Failure in creating user"; 
        }


        return $this->render('create');
    }
   
    public function actionEdit($id)
    {
        $model  = new Zoo();


        if ($this->request->isPost) {
            $user = $this->request->post("Zoo");
            $query = new Query();
            $query->createCommand()->update("zoo", ['name' => $user['name'],'state' => $user['state'],'city' => $user['city'],'area' => $user['area']],['id' => $id] )->execute();
            return $this->redirect(['index']);
        }

        $model = Zoo::find($id)->where(['id' => $id])->one();
        
        return $this->render('edit', ['model' => $model]); 
    }
}
