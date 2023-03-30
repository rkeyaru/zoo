<?php
 namespace app\controllers;

use app\models\Animals;
use app\models\AnimalZooMap;
use yii\web\Controller;
use app\models\Zoo;
use yii\db\Query;
 class AnimalController extends Controller { 
    public function actionIndex() { 
        $model = new Animals();
        return $this->render('index');
    }
    
   
    public function actionCreate() { 
        $model  = new Animals();

            
        if($this->request->isPost) { 
            $query = new Query();
            $array = $this->request->post('Animals');
            $zoo_id = $this->request->post('Zoo');
            $zoo_id = $zoo_id['id'];
            $model->name  = $array['name'];
            $model->s_name  = $array['s_name'];
            $model->gender = $array['gender'];
            $model->save();
            
            
            // $model->save();
           
            $last_id = $query->select(" LAST_INSERT_ID() as aid")->one();
            $last_id = $last_id['aid'];
            
            
            
            $query->createCommand()->insert('animal_zoo_map',['animal_id' => $last_id , 'zoo_id' => $zoo_id])->execute();

            
            $this->redirect("index");   
            }

        
        return $this->render('create');
    }

    public function actionEdit($id) { 
        
        if($this->request->isPost) { 
           $animals = $this->request->post('Animals'); 
           $zid =   $this->request->post('Zoo')['id'];
           $query = new Query();
           $query->createCommand()->update("Animals", ['name' => $animals['name'],'gender' => $animals['gender'],'s_name' => $animals['s_name']],['id' => $id ])->execute();
           $query->createCommand()->update("animal_zoo_map", ['zoo_id' => $zid],['animal_id' => $id ])->execute();
           
           $this->redirect('index');
    
        }
        $model = Animals::find()->where(['id' => $id])->one();
        $zoos = Zoo::find()->all();
        $current_zoo = AnimalZooMap::find()->where(['animal_id' => $id])->one()->zoo_id;
        
        
        
        
        return $this->render('edit',['model' => $model,'zoos' => $zoos,'current' => $current_zoo]);

    }


    public function actionDelete($id) { 
        
       $query = new Query();
       $query->createCommand()->update("Animals",['active' => '0'] ,['id' => $id])->execute();
       return $this->render('index');

    }
 }
 
?>