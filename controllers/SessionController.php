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
    return $this->redirect("/zoo/site/error");
  }
 
  public function DestroySession() { 
    $session = Yii::$app->session;
    $session->remove('username');
    $session->remove('role');
    $session->destroy();
    
 
  } 
  public function GetSession() { 
   $session = Yii::$app->session;
    if($session->get('username')) {
      if($session->get('role') == 'admin') {
        return true;
      }
    }
  return false;
    // print_r($session);
  }
 
}
