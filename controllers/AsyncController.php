<?php


namespace app\controllers;


use app\engine\Request;
use app\engine\Session;
use app\models\Basket;
use app\models\Product;

class AsyncController extends Controller

{
    //.............................В Каталоге: Скролинг......................................................

    public function actionCatalog() {

        if((new Request())->getParams()['page'] == 'two') {
            $count = (new Request())->getParams()['count'];
            $count += PRODUCT_PER_PAGE; // Параметр в config
            $catalog = Product::getLimitAjax($count, PRODUCT_PER_PAGE);  // первая - смещение,  вторая цифра - это количество записей которое показывается.
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
        $count = Basket::countSum('quantity', 'session_id', $session);
        (new Basket($id, "$session", $price, $price, 1))->save();
        echo json_encode(['count' => $count + 1], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    //.......В Корзине: при нажатие кнопки удалить - удаляет полностью.....................................

    public function actionDelete() {
        $session_id = (new Session())->getId();

        // Через POST

        $id = (new Request())->getParams()['id'];
        Basket::getOneAndWhere('id', $id, 'session_id', $session_id)->delete();

        $response = [
            'count' => Basket::countSum('quantity', 'session_id', $session_id),
            'sum' => Basket::countSum('price', 'session_id', $session_id)
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}