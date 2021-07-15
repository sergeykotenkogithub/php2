<?php


namespace app\controllers;


class OrderFormController extends Controller
{
    public function actionIndex() {
        echo $this->render('orderForm');
    }
}