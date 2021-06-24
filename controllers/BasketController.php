<?php

namespace app\controllers;

use app\models\Basket;

final class BasketController extends Controller

{
    public function actionBasket() {
        $basket = Basket::getBasket();
            echo $this->render('basket', [
            'basket' => $basket
        ]);
    }

//    public function actionIndex() {
//        $basket = Basket::getBasket();
//        var_dump($basket);
////        echo $this->render('basket', [
////            'basket' => $basket
////        ]);
//    }
}