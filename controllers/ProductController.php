<?php


namespace app\controllers;

use app\models\Product;

final class ProductController extends Controller
{
    public function actionIndex() {
        echo $this->render('index');
    }

    // Если надо с кнопкой ещё
    public function actionCatalog() {
        $page = $_GET['page'] ?? 2;
        // $page = $_GET['page'] ?? 1; Для кнопки ещё
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