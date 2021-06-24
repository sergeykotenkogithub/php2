<?php


namespace app\controllers;


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
        if($_GET['a'] == 'buy') {
            $id = $_GET['id'];
            $price = $_GET['price'];
        }
        //  Product:
        echo json_encode(['count' => $id], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}