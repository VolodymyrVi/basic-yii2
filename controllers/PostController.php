<?php

namespace app\controllers;

use Yii;

class PostController extends AppController
{
    public function actionTest()
    {

        $names = ['Vikarchuk', 'Volodymyr', 'Petrovych'];
        //var_dump(Yii::$app);
        //return $this->debug($names);
        return $this->render('test');
    }
}