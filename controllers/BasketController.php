<?php

namespace app\controllers;

use app\models\Basket;

final class BasketController extends Controller

{
    public function actionGoods() {
        $session =  session_id();
        $basket = Basket::getBasket($session);
        $sum = Basket::countSum('price', 'session_id', $session);

        echo $this->render('basket', [
            'basket' => $basket,
            'sum' => $sum
        ]);
    }

    // Для того чтобы узнать как получить объект 2х классов
    public function actionObject() {
        $session =  session_id();
        $basket = Basket::getBasketObject($session);
        echo $this->render('basketobject', [
            'basket' => $basket,
        ]);
    }

}