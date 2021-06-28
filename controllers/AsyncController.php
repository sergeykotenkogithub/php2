<?php


namespace app\controllers;


use app\models\Basket;
use app\models\Product;

class AsyncController extends Controller

{
    // В Каталоге: Скролинг
    public function actionCatalog() {
        if($_GET['page'] == 'two') {
            $count = $_GET['count'];
            $count += PRODUCT_PER_PAGE;
            $catalog = Product::getLimitAjax($count, PRODUCT_PER_PAGE);  // первая смещение,  вторая цифра это количество записей которое показывается.
            echo json_encode([
               'count' => $count,
               'catalog' => $catalog
            ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            die();
        }
    }

    // В Каталоге: Добавление товара в корзину при нажатие кнопки купить
    public function actionBuy() {
        $id = $_GET['id'];
        $price = $_GET['price'];
        $session = session_id();
        $count = Basket::countGoodsBasketItem($session);
        (new Basket($id, "$session", $price, $price, 1))->save();
        echo json_encode(['count' => $count['count'] + 1], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    // В Корзине: при нажатие кнопки удалить - удаляет полностью
    public function actionDelete() {
        $id = $_GET['id'];
        $session = session_id();
        Basket::getOne($id)->delete();
        $count = Basket::countGoodsBasketItem($session);
        echo json_encode(['count' => $count['count']], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}