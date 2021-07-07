<?php

//...................Корзина................................................................

namespace app\controllers;

use app\engine\App;

final class BasketController extends Controller

{
    public function actionGoods() {

        //..............Отображение корзины и общей суммы...................................

        $session =  App::call()->session->getId();
        $basket = App::call()->basketRepository->getBasket($session);
        $sum = App::call()->basketRepository->countSum('price', 'session_id', $session);


        $update = App::call()->basketRepository->getOne(2);
        $comparisonGoodsBasket = App::call()->basketRepository->getOneAndWhere('id', $id, 'session_id', $session);


        echo $this->render('basket', [
            'basket' => $basket,
            'sum' => $sum
        ]);
    }

}