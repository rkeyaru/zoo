<?php
 namespace app\controllers;
 use app\models\Users;
 use yii\db\Query;
 use yii\web\Controller;
use linslin\yii2\curl;

use app\models\Zoo;
 
 class UserController extends Controller { 
    public function actionIndex() { 
        $model = new Users();
        $array = Users::find()->where(['active' => '1'])->all();
        return $this->render('index',['array' => $array]);
    }
    public function actionDelete($id) { 
        
            
         
          
            $query = new Query();
            $query->createCommand()->update("users", ['active' => 0] ,['userId' => $id] )->execute();
            
            
            $array = Users::find()->where(['active' => '1'])->all();
           return $this->render('index',['array' => $array]);
            
        

        
    }
    public function actionCreate() { 
        
        $model  = new Users();

            
        if($this->request->isPost) { 
            $array = $this->request->post();
            $model->load($array);
            if($model->validate()) { 
                $model->save();
                return $this->redirect(['user/index']);
            }
            return "Failure in creating user";
            }

        
        return $this->render('create',['model' => $model]);
    }
    public function actionEdit($id) { 
        
        if($this->request->isPost) { 
            $array = $this->request->post();
            $user  = $array['Users'];

            
          $query = new Query();
           $query->createCommand()->update("users", ['firstName' => $user['firstName'],'lastName' => $user['lastName'],'email' => $user['email'],'password' => $user['password']],['userId' => $id] )->execute();
            
            return $this->redirect('index');
        }
 
        
        // if($this->request->isPost) { 
        //     $array = $this->request->post();
        //     $model->load($array);
        //     if($model->validate()) { 
        //         $model->save();
        //         return $this->redirect(['user/index']);
        //     }
        //     return "Failure in creating user";
        //     }

        $model  = Users::find()->where(['userId' => $id])->one();
        return $this->render('edit',['model' => $model]);
    }
 }
