<?php

namespace app\controllers;

class MyController extends AppController
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

    public function actionBlogPost()
    {
        
        return 'Blog Post';
    }
}