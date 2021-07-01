<?php

namespace app\controllers;

use app\models\repositories\BasketRepository;

final class BasketController extends Controller

{
    public function actionGoods() {
        $session =  session_id();
        $basket = (new BasketRepository())->getBasket($session);
        $sum = (new BasketRepository())->countSum('price', 'session_id', $session);

        echo $this->render('basket', [
            'basket' => $basket,
            'sum' => $sum
        ]);
    }

}