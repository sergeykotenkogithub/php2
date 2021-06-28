<?php

namespace app\controllers;

use app\models\Basket;

final class BasketController extends Controller

{
    public function actionGoods() {
        $session =  session_id();
        $basket = Basket::getBasket($session);

        echo $this->render('basket', [
            'basket' => $basket
        ]);
    }

}