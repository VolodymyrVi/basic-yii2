<?php

namespace app\controllers;

use app\models\Category;
use PHPUnit\Util\Test;
use Yii;
use app\models\TestForm;
class PostController extends AppController
{
    public $layout = 'basic';

    public function beforeAction($action)
    {
        if ( $action->id == 'index')
        {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        if (Yii::$app->request->isAjax) {
            debug(Yii::$app->request->post());
            return 'test';
        }
        $model = new TestForm();
        if ($model->load(Yii::$app->request->post()) )   {
            if ($model->validate()){
                Yii::$app->session->setFlash('success', 'Дані прийняті');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Помилка');
            }
        }
        $this->view->title = 'All Articles';
        return $this->render('test', compact('model'));
    }
    public function actionShow()
    {
        $this->view->title = 'One Article';
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы']);

//        $cats = Category::find()->all();
//        $cats = Category::find()->orderBy(['id' =>SORT_DESC])->all();
        $cats = Category::find()->asArray()->all();




        return $this->render('show', compact('cats'));
    }
}