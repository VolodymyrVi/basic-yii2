<?php

namespace app\controllers;

use yii\web\Controller;

class MyController extends Controller
{
    public function actionIndex($id = null)
    {
        $hi = 'Hello world';
        $names = ['Vikarchuk', 'Mozharivska', 'Rasnovska'];
        //return $this->render('index', ['hello' => $hi, 'names' => $names]);
        //return $this->render('index', contact('hi', 'names'));

        if (!$id) $id = 'test';

        return $this->render('index', compact('hi', 'names', 'id'));
    }
}