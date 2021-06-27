<?php

namespace app\controllers;

use app\models\Basket;

final class BasketController extends Controller

{
    public function actionGoods() {
        $basket = Basket::getBasket();
        echo $this->render('basket', [
            'basket' => $basket
        ]);
    }

}