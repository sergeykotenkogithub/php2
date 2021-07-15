<?php

//....................Начальная страница с приветствием..................................

namespace app\controllers;

use app\models\repositories\UserRepository;

class IndexController extends Controller
{
    public function actionIndex() {

        echo $this->render('index', [
            'username' => (new UserRepository())->getName()
        ]);

    }
}