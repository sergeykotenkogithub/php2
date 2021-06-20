<?php


namespace app\controllers;

use app\models\Product;

final class ProductController extends Controller
{
    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog() {
        $page = $_GET['page'] ?? 1;
//        $catalog = Product::getLimit($page * 2);
        $catalog = Product::getLimit($page * 2);
        echo $this->render('catalog', [
          'catalog' => $catalog,
          'page' => ++$page
        ]);
    }

    public function actionCard() {
        $id = $_GET['id'];
        $good = Product::getOne($id);
        echo $this->render('card', [
                'good' => $good
        ]);
    }

    public function actionAdd() {
        echo 'add';
    }
}