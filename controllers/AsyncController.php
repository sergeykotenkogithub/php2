<?php


namespace app\controllers;


use app\models\Product;

class AsyncController extends Controller
{
    public function actionCatalog() {
        if($_GET['page'] == 'two') {
            $count = $_GET['count'];
            $count += 2;         // 2 4 6 8
            $after = $count + 2; // 4 6 8 10
            $catalog = Product::getLimitAjax($count, $after);
            echo json_encode([
               'count' => $count,
               'catalog' => $catalog
            ]);
            die();
        }
    }

    public function actionBuy() {
        if($_GET['a'] == 'buy') {
            $b = $_GET['id'];
        }
        echo json_encode(['count' => $b]);
    }
}