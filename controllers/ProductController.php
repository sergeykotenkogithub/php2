<?php

//..............................Каталог.................................................................................

namespace app\controllers;

use app\engine\App;

final class ProductController extends Controller
{
    public function actionCatalog() {

        //............Пагинация. Вывод страниц от и до....................................

        $page = App::call()->request->getParams()['page'] ?? 1; // 1 - для начальной
        $notesOnPage = 3;  // Количество до
        $from = ($page - 1) * $notesOnPage;  // Количество от
        $catalog = App::call()->productRepository->getLimitAjaxObject($from, $notesOnPage);

        // Общее количество записей в товарах
        $sumRowCatalog = App::call()->productRepository->sumRowProducts()[0]['count'];

        // Подсчёт количества нужных страниц
        $pageCount = ceil($sumRowCatalog / $notesOnPage); // ceil - округление в большую сторону.

        // Кнопки следующая и предыдущая страница
        $prev = $page - 1 ?: 1;
        $next = $page != $pageCount ? $page + 1 : $pageCount;

        // Если на страницы с ?page= нет товаров
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

    //...............Вывод определённого товара.....................

    public function actionCard() {

        $id = App::call()->request->getParams()['id'];
        $good = App::call()->productRepository->getOne($id);
        echo $this->render('card', [
            'item' => $good
        ]);

    }
}