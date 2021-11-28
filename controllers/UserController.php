<?php

namespace app\controllers;
use yii;
class UserController extends \yii\web\Controller
{
    public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionRegister()
    {
        $user = new \app\models\User();
           if ($user->load(Yii::$app->request->post())) {
            if ($user->validate()) {
                $user->save();
                yii::$app->getSession()->setFlash('msg','Registration Successfull Please Login.');
                return $this->redirect('index.php?r=site/login');
            }
        }
    
        return $this->render('register',[
            'user' => $user
        ]);
    }
    }

