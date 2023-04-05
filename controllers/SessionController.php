<?php

namespace app\controllers;

use ParentIterator;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;




class SessionController extends Controller
{
  public function init() { 
    parent::init();
    if($this->GetSession()) { 
      return true;
    }
    return $this->redirect("/zoo/site/index");
  }
  public function SetSession($username) { 
    $session  = Yii::$app->session;
    $session['username'] = $username;
    echo "Session set to " . $session['username'];
  }
  public function DestroySession() { 
    $session = Yii::$app->session;
    $session->remove('username');
    $session->destroy();
    
 
  } 
  public function GetSession() { 
   $session = Yii::$app->session;
    if(Yii::$app->session->get('username')) { 
        return true;
    }
  return false;
    // print_r($session);
  }
 
}
