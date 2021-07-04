<?php


namespace app\controllers;

use app\models\repositories\ProductRepository;
use app\models\repositories\UserRepository;

final class ProductController extends Controller
{
    public function actionIndex() {
        echo $this->render('index', [
//            'username' => User::getName()
            'username' => (new UserRepository())->getName()
        ]);
    }

    // Если надо с кнопкой ещё
    public function actionCatalog() {
//        $page = $_GET['page'] ?? 2;
//        $page = (int)$_GET['page'] ?? 1; // Для кнопки ещё
        $page = $_GET['page'] ?? 1; // Для кнопки ещё

//        $page = $_GET['page'] ?? 1; // Для кнопки ещё
//        if($page)) {
//            die('нет такого товара');
//        }
//        var_dump($page);
//        $page = ++$page;
//         $catalog = Product::getLimit($page * 2);
//        var_dump($page);
        $notesOnPage = 3;
        $from = ($page - 1) * $notesOnPage;
//        $catalog = (new ProductRepository())->getLimit($page * 2);
//        $catalog = (new ProductRepository())->getLimitAjaxObject(($page * 2), 2);
        $catalog = (new ProductRepository())->getLimitAjaxObject($from, $notesOnPage);
        $sumRowCatalog = (new ProductRepository())->sumRowProducts()[0]['count'];
        // Подсчёт количества нужных страниц
        $pageCount = ceil($sumRowCatalog / $notesOnPage); // ceil - округление в большую сторону.
//        var_dump($pageCount);
//        var_dump($sumRowCatalog[0]['count']);
        if(empty($catalog)) {
            die('Нет таких товаров');
        }

        echo $this->render('catalog', [
          'catalog' => $catalog,
          'pageCount' => $pageCount,
          'page' => $page
//          'page' => ++$page
        ]);

    }

    public function actionCard() {
        $id = $_GET['id'];
//        $good = Product::getOne($id);
        $good = (new ProductRepository())->getOne($id);
        echo $this->render('card', [
            'good' => $good
        ]);
    }

    public function actionAdd() {
        echo 'add';
    }
}