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
//        $model->name = 'Autor';
//        $model->email = 'mail@mail.com';
//        $model->text = 'Text message';
//        $model->save();

        if ($model->load(Yii::$app->request->post()) )   {
            if ($model->save()){
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
//        $cats = Category::find()->asArray()->all();
//        $cats = Category::find()->asArray()->where(['parent' => 691])->all();
//        $cats = Category::find()->asArray()->where(['like', 'title', 'pp'])->all();
//        $cats = Category::find()->asArray()->where(['<=', 'id', 695])->all();
//        $cats = Category::find()->asArray()->where('parent=691')->limit(1)->all();
//        $cats = Category::find()->asArray()->where('parent=691')->one();
//        $cats = Category::find()->asArray()->count();
//        $cats = Category::findOne(['parent' => 691]);
//        $cats = Category::findAll(['parent' => 691]);
//        $query = "SELECT * FROM categories WHERE title LIKE '%pp%'";
//        $cats = Category::findBySql($query)->all();
//        $query = "SELECT * FROM categories WHERE title LIKE :search";
//        $cats = Category::findBySql($query, [':search' => '%pp%'])->all();
//        $cats = Category::findOne(694);
//        $cats = Category::find()->with('products')->where('id = 694')->all();
//        $cats = Category::find()->all(); // Отложенная загрузка
        $cats = Category::find()->with('products')->all(); // Жадная загрузка





        return $this->render('show', compact('cats'));
    }
}