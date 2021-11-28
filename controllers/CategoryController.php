<?php

namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Category;

class CategoryController extends \yii\web\Controller
{

         /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['create'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    public function actionCreate()
    {

    if(Yii::$app->user->identity->role !== 'admin') {
        throw new \yii\web\NotFoundHttpException("Create category not found.");
    }

    $category = new Category();

    if ($category->load(Yii::$app->request->post())) {
        if ($category->validate()) {
            $category->save();
            Yii::$app->getSession()->setFlash('msg','Category created successfully');
            return $this->redirect('index.php?r=category');
        }
    }

    return $this->render('create', [
        'model' =>  $category
    ]);
    }

    public function actionIndex()
    {
        $isAdmin = false;

        if(Yii::$app->user && Yii::$app->user->identity && Yii::$app->user->identity->role === 'admin')  {
            $isAdmin = true;
        }
        $query = Category::find();
        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count()
        ]);
        $categories = $query->orderBy('name')
                             ->offset($pagination->offset)
                             ->limit($pagination->limit)
                             ->all();
        return $this->render('index',[
            'categories' => $categories ,
            'pagination' =>  $pagination,
            'isAdmin' => $isAdmin 
        ]);
    }

}
