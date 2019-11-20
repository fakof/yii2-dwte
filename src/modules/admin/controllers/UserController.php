<?php

namespace fakof\dwte\modules\admin\controllers;

class UserController extends DefaultController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        return $this->render('create');
    }
}