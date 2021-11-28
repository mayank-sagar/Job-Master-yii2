<?php

namespace app\behaviors;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\Web\Application;
use yii;
use app\models\Job;

class OnlyOwnerCanChange  extends Behavior {
    
    public function events()
    {
        return [
            Application::EVENT_BEFORE_ACTION => 'beforeAction'
        ];
    }

    public function beforeAction($action)
    {
        $action = $action->action->id;
        if(!empty(yii::$app->request->queryParams['id']) && ($action === "edit" || $action === "delete")) {
            
            if(yii::$app->user->identity->role == "admin") {
                return;
            }

            $id = (int)yii::$app->request->queryParams['id'];
            $loggedInUserId = yii::$app->user->identity->id;
            $job = Job::findOne([
                'id' => $id,
                'user_id' =>  $loggedInUserId
            ]);
            if(!$job) {
                throw new \yii\web\NotFoundHttpException("Job not found.");
            }
        }

    }
}
?>