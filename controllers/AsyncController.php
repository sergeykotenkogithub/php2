<?php

//.....................................Асинхронные действия.............................................................

namespace app\controllers;

use app\engine\App;
use app\models\entities\Basket;


class AsyncController extends Controller

{
    //.............................На странице Админ: Скролинг......................................................

    public function actionAdmin() {

        $page = App::call()->request->getParams()['page'];

        if ($page == 'two') {
            $count = App::call()->request->getParams()['count'];
            $count += App::call()->config['product_per_page'] ; // product_per_page - параметр в config
            $catalog = App::call()->orderRepository->getLimitAjaxDesc($count, App::call()->config['product_per_page']);
            // первая $count - смещение,  вторая цифра App::call()->config['product_per_page'] - это количество записей которое показывается.

            echo json_encode([
               'count' => $count,
               'catalog' => $catalog
            ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

            die();
        }

    }

    //...............В Каталоге: Добавление товара в корзину при нажатие кнопки купить......................

    public function actionBuy() {

        //...........GET и POST................................

        $id = App::call()->request->getParams()['id'];
        $price = App::call()->request->getParams()['price'];

        //....................................................

        $session = App::call()->session->getId();
        $basket = new Basket($id, "$session", $price, $price, 1);
        $count = App::call()->basketRepository->countSum('quantity', 'session_id', $session);

//          App::call()->basketRepository->save($basket); //!!! НЕ РАБОТАЕТ ПОЧЕМУ???
        App::call()->basketRepository->insert($basket);

        echo json_encode(['count' => $count + 1], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    //.......В Корзине: при нажатие кнопки удалить - удаляет полностью.....................................

    public function actionDelete() {

        //................Через POST.............................

        $session_id = App::call()->session->getId();
        $id = App::call()->request->getParams()['id'];
        $basket = App::call()->basketRepository->getOneAndWhere('id', $id, 'session_id', $session_id);

        App::call()->basketRepository->delete($basket);

        $response = [
            'count' =>  App::call()->basketRepository->countSum('quantity', 'session_id', $session_id),
            'sum' => App::call()->basketRepository->countSum('price', 'session_id', $session_id)
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }

}