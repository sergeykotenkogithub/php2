<?php


namespace app\controllers;


use app\engine\Request;
use app\engine\Session;
use app\models\entities\Basket;
use app\models\repositories\BasketRepository;
use app\models\repositories\ProductRepository;

class AsyncController extends Controller

{
    //.............................В Каталоге: Скролинг......................................................

    public function actionCatalog() {

        if((new Request())->getParams()['page'] == 'two') {
            $count = (new Request())->getParams()['count'];
            $count += PRODUCT_PER_PAGE; // Параметр в config
            $catalog = (new ProductRepository())->getLimitAjax($count, PRODUCT_PER_PAGE);  // первая - смещение,  вторая цифра - это количество записей которое показывается.
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
        $session_id = (new Session())->getId();

        // Через POST

        $id = (new Request())->getParams()['id'];
//        Basket::getOneAndWhere('id', $id, 'session_id', $session_id)->delete();
        $basket = (new BasketRepository())->getOneAndWhere('id', $id, 'session_id', $session_id);

        (new BasketRepository())->delete($basket);

        $response = [
            'count' =>  (new BasketRepository())->countSum('quantity', 'session_id', $session_id),
            'sum' => (new BasketRepository())->countSum('price', 'session_id', $session_id)
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}