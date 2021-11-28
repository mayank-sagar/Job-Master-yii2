<?php

namespace app\controllers;
use yii\data\Pagination;
use app\models\Job;
use app\models\Category;
use Yii;
use yii\filters\AccessControl;
use app\behaviors\OnlyOwnerCanChange;
class JobController extends \yii\web\Controller
{

     /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            
            'access' => [
                'class' => AccessControl::class,
                'only' => ['create','edit','delete'],
                'rules' => [
                    [
                        'actions' => ['create','edit','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            OnlyOwnerCanChange::class
        ];
    }

    
    public function actionCreate()
    {
        $job = new \app\models\Job();
        $categories = Category::find()
        ->select(['name','id'])
        ->indexBy('id')
        ->column();
        $type = [
            'part_time' => 'Part Time',
            'full_time' => 'Full Time',
        ];
        $salaryRange = [
            'Below $5000' => 'Below $5000',
            '$5000 to $10000' => '$5000 to $10000',
            '$10000 to 20000' => '$10000 to 20000',
            '$20000 to $50000' => '$20000 to $50000',
            'Above $50000' => 'Above $50000'
        ];
        if ($job->load(Yii::$app->request->post())) {
            if ($job->validate()) {
                $job->save();
                Yii::$app->getSession()->setFlash('msg','Job created successfully');
                return $this->redirect('index.php?r=job');
            }
        }
        $job->is_published = 1;
        return $this->render('create', [
            'job' => $job,
            'categories' => $categories,
            'type' => $type,
            'salaryRange' => $salaryRange
        ]);

    }

    public function actionDelete($id)
    {

        $job = Job::findOne($id);

        if(!$job) {
            throw new \yii\web\NotFoundHttpException("Job not found.");
        }

        $job->delete();
        Yii::$app->getSession()->setFlash('msg','Job deleted successfully');
        return $this->redirect('index.php?r=job');
    }

    public function actionEdit($id)
    {

        $job = Job::findOne($id);

        if(!$job) {
            throw new \yii\web\NotFoundHttpException("Job not found.");
        }

        $categories = Category::find()
        ->select(['name','id'])
        ->indexBy('id')
        ->column();
        $type = [
            'part_time' => 'Part Time',
            'full_time' => 'Full Time',
        ];
        $salaryRange = [
            'Below $5000' => 'Below $5000',
            '$5000 to $10000' => '$5000 to $10000',
            '$10000 to 20000' => '$10000 to 20000',
            '$20000 to $50000' => '$20000 to $50000',
            'Above $50000' => 'Above $50000'
        ];
        if ($job->load(Yii::$app->request->post())) {
            if ($job->validate()) {
                $job->save();
                Yii::$app->getSession()->setFlash('msg','Job updated successfully');
                return $this->redirect('index.php?r=job');
            }
        };
        return $this->render('edit', [
            'job' => $job,
            'categories' => $categories,
            'type' => $type,
            'salaryRange' => $salaryRange
        ]);
    }

    public function actionDetail($id = 0) 
    {

        $isCreator = false;
        $job = null;
        if($id) {
            $job = Job::findOne($id);
        }

        if(!$job) {
            throw new \yii\web\NotFoundHttpException("Job not found.");
        }


        if(\yii::$app->user && \yii::$app->user->identity && \yii::$app->user->identity->id) {
            $isCreator  = $job->user_id === \yii::$app->user->identity->id || \yii::$app->user->identity->role === "admin";
        }

        return $this->render('detail',[
            'job' => $job,
            'isCreator' => $isCreator
        ]);
    }

    public function actionIndex($category = '')
    {

        $jobQuery = Job::find();

        if($category) { 
            $categoryRow = Category::find()->where(['slug' => $category])->one();
            if($categoryRow) {
                $jobQuery = $jobQuery->where(['category_id' => $categoryRow->id]);
            } else {
                $jobQuery = $jobQuery->where(['1' => '2']);
            }
        }

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $jobQuery->count()
        ]);

        $jobs = $jobQuery->orderBy('created_at DESC')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

        return $this->render('index',[
            'jobs' =>$jobs,
            'pagination' => $pagination
        ]);
    }

}
