<?php


namespace app\controllers;


class AsyncController extends Controller
{
    public function actionCatalog() {
        if($_GET['page'] == 'two') {
            $count = $_GET['count'];
            $count += 2; // 2
            $after = $count + 2;
            echo json_encode(['count' => $count]);
            die();
        }
    }
}