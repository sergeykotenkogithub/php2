<?php

//..............................Каталог.................................................................................

namespace app\controllers;

use app\engine\App;
use app\engine\Request;
use app\models\repositories\ProductRepository;
use app\models\repositories\UserRepository;

final class ProductController extends Controller
{

    //...............Начальная страница / ..............................

    public function actionIndex() {

        echo $this->render('index', [
            'username' => (new UserRepository())->getName()
        ]);

    }



    public function actionCatalog() {

        $page = App::call()->request->getParams()['page'] ?? 1; // 1 - для начальной

        // От и до вывод страниц
        $notesOnPage = 3;  // Количество до
        $from = ($page - 1) * $notesOnPage;  // Количество от
        $catalog = (new ProductRepository())->getLimitAjaxObject($from, $notesOnPage);

        // Общее количество записей в товарах
        $sumRowCatalog = (new ProductRepository())->sumRowProducts()[0]['count'];

        // Подсчёт количества нужных страниц
        $pageCount = ceil($sumRowCatalog / $notesOnPage); // ceil - округление в большую сторону.

        // Следующая и предыдущая страница
        $prev = $page - 1 ?: 1;
        $next = $page != $pageCount ? $page + 1 : $pageCount;

        // Если на страницы с ?page нет товаров
        if(empty($catalog)) {
            die('Нет таких товаров');
        }


        echo $this->render('catalog', [
          'catalog' => $catalog,
          'pageCount' => $pageCount,
          'page' => $page,
          'prev' => $prev,
          'next' => $next
        ]);

    }

    public function actionCard() {
        $id = (new Request())->getParams()['id'];
        $good = (new ProductRepository())->getOne($id);
        echo $this->render('card', [
            'good' => $good
        ]);
    }
}