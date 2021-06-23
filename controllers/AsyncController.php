<?php


namespace app\controllers;


use app\models\Product;

class AsyncController extends Controller
{
    public function actionCatalog() {
        if($_GET['page'] == 'two') {
            $count = $_GET['count'];
            $count += 2;
            $catalog = Product::getLimitAjax($count, 2);  // первая смещение,  вторая цифра это количество записей которое показывается.
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