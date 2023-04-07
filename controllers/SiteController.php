<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Users;
use app\models\Zoo;
use app\models\Animals;





class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */


    /**
     * {@inheritdoc}
     */

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

 
    public function actionLogin()
    {

        if (isset(Yii::$app->session['username'])) {
            if(Yii::$app->session['role'] == 'admin') { 
                return $this->redirect("dashboard");
            }
            return $this->redirect("index");
        }

        $model = new Users();
        if ($this->request->isPost) {

            $user  = $this->request->post('Users');
           
           
            $id = Users::findOne(['email' => $user['email']]);


            if (!isset($id)) {
                return "Wrong email or password.";
            }

       
            if ($id->validatePassword($user['password'])) {
             
                Yii::$app->session['username'] = $user['email'];
                Yii::$app->session['role']  = $id->role;
                $this->redirect('dashboard');
            } 
            else {
                return "Wrong Password or email";
            }
        }
        return $this->render("login", ["model" => $model]);
    }

   
    public function actionLogout()
    {

        $session = Yii::$app->session;
        $session->remove('username');
        $session->remove('role');
        $session->destroy();
        return $this->redirect("index");

    }
    public function actionSignup()
    {
        if (isset(Yii::$app->session['username'])) {
            return $this->redirect("index");
        }
        $model = new Users();
        if ($this->request->isPost) {
            $val = $this->request->post();
            $temp = Users::find()->where(['email' => $val['Users']['email']])->one();
            $model->load($val);
            $password = $val["Users"]["password"];
            foreach($val['Users'] as $i) { 
                if(trim($i) == "") {
                return "Fill all entities";
                }
            }
            $hash = Yii::$app->getSecurity()->generatePasswordHash($password);
            $model->password = $hash;
            if($temp) { 
               return "Email already exists" ;
            }
            if ($model->validate()) {
                $model->save();

                return "User registered successfully";
            } 
            
            return "Invalid Details";
            
      
        }
        return $this->render('signup', ['model' => $model]);
    }
     
 
  
    public function actionDashboard()
    {
        if (! isset(Yii::$app->session['username'])) {
            return $this->redirect("/zoo/site/login");
        }
        if(Yii::$app->session['role'] != 'admin') { 
          return $this->redirect("/zoo/site/index");
        }
        $userCount = Users::find()->where(['active' => '1'])->count();
        $zooCount = Zoo::find()->where(['active' => '1'])->count();
        $animalCount = Animals::find()->where(['active' => '1'])->count();
        return $this->render('dashboard', ['userCount' => $userCount, 'animalCount' => $animalCount, 'zooCount' => $zooCount]);
    }
    public function actionStaffLogin() { 

        $model = new Users();
        if($this->request->isPost) { 
            print_r($this->request->post());
            return "hi";
        }
        return $this->render('stafflogin', ['model' => $model]);
    }
    public function actionAbout() { 
        return $this->render('about');
    }
}
