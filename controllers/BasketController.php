<?php


namespace app\controllers;

final class BasketController extends Controller

{
    public function actionBasket() {
        echo $this->render('basket');
    }
}