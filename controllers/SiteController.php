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
                $this->redirect('about');
            } else {
                return "Wrong Password or email";
            }
        }
        return $this->render("login", ["model" => $model]);
    }

   
    public function actionLogout()
    {

        $session = Yii::$app->session;
        $session->remove('username');
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

            $model->load($val);
            $password = $val["Users"]["password"];
            $hash = Yii::$app->getSecurity()->generatePasswordHash($password);
            $model->password = $hash;

            if ($model->validate()) {
                $model->save();

                return "User registered successfully";
            } else {

                return "Email already exists";
            }
        }
        return $this->render('signup', ['model' => $model]);
    }
     
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

  
    public function actionAbout()
    {
        if (! isset(Yii::$app->session['username'])) {
            return $this->redirect("error");
        }
        $userCount = Users::find()->where(['active' => '1'])->count();
        $zooCount = Zoo::find()->where(['active' => '1'])->count();
        $animalCount = Animals::find()->where(['active' => '1'])->count();
        return $this->render('about', ['userCount' => $userCount, 'animalCount' => $animalCount, 'zooCount' => $zooCount]);
    }
}
