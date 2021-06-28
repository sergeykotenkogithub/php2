<?php


namespace app\controllers;


use app\models\Basket;
use app\models\Product;

class AsyncController extends Controller
{
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

    public function actionBuy() {
        $id = $_GET['id'];
        $price = $_GET['price'];
        $session = session_id();
//        Basket::addBasket($session, $id, $price);
//        (new Basket($id, "$session", $price, $price))->save();
        (new Basket($id, "$session", $price, $price, 1))->save();

        //  Product:
        echo json_encode(['count' => $id], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}