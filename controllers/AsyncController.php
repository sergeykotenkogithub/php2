<?php


namespace app\controllers;


class AsyncController extends Controller
{
    public function actionCatalog() {
        if($_GET['page'] == 'two') {
            $count = 2;
//            var_dump($count);
            echo json_encode(['count' => $count]);
            die();
        }
    }
}