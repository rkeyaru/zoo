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
use linslin\yii2\curl;
use yii\bootstrap5\Html;
use yii\console\widgets\Table;

use yii\widgets\DetailView;



class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
  
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
     

        $model = new Users();
        if($this->request->isPost) { 
            
            $user  = $this->request->post('Users');
            
            echo $user['email']."<br>";
            echo $user['password']."<br>";
            $id = Users::findOne(['email' => $user['email']]);
            if($id->validatePassword($user['password'])) { 
                echo "Password Matched";
            } else { 
                echo "Invalid Password";
            }
            
            $this->redirect('/zoo/user/index'); 

        }
        return $this->render("login",["model" => $model]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionSignup() { 
        $model = new Users();
        if($this->request->isPost) { 
            $val = $this->request->post();
            $model->load($val);
    
            if($model->validate()) {
            $model->save();
            $this->redirect("/user/index");
            
        }
        }
        return $this->render('signup', ['model' => $model]);
    }
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
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

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() { 
        return $this->render('about');
    }
    
    
}
