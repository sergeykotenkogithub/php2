<?php

//.....................................Асинхронные действия.............................................................

namespace app\controllers;

use app\engine\App;
use app\engine\Request;
use app\engine\Session;
use app\models\entities\Basket;
use app\models\repositories\BasketRepository;
use app\models\repositories\OrderRepository;

class AsyncController extends Controller

{
    //.............................На странице Админ: Скролинг......................................................

    public function actionAdmin() {

        $page = App::call()->request->getParams()['page'];

        if ($page == 'two') {
            $count = App::call()->request->getParams()['count'];
            $count += App::call()->config['product_per_page'] ; // Параметр в config
            $catalog = (new OrderRepository())->getLimitAjaxDesc($count, App::call()->config['product_per_page']);
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

        $id = (new Request())->getParams()['id'];
        $price = (new Request())->getParams()['price'];
        $session = (new Session())->getId();
        $basket = new Basket($id, "$session", $price, $price, 1);
        $count = (new BasketRepository())->countSum('quantity', 'session_id', $session);

//        (new BasketRepository())->save($basket); //!!! НЕ РАБОТАЕТ ПОЧЕМУ???
        (new BasketRepository())->insert($basket);

        echo json_encode(['count' => $count + 1], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    //.......В Корзине: при нажатие кнопки удалить - удаляет полностью.....................................

    public function actionDelete() {
        //................Через POST.............................
        $session_id = (new Session())->getId();
        $id = (new Request())->getParams()['id'];
        $basket = (new BasketRepository())->getOneAndWhere('id', $id, 'session_id', $session_id);
        (new BasketRepository())->delete($basket);
        $response = [
            'count' =>  (new BasketRepository())->countSum('quantity', 'session_id', $session_id),
            'sum' => (new BasketRepository())->countSum('price', 'session_id', $session_id)
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}