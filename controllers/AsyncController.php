<?php

//.....................................Асинхронные действия.............................................................

namespace app\controllers;

use app\engine\App;
use app\models\entities\Basket;


class AsyncController extends Controller

{
    //.............................На странице Админ: Скролинг......................................................

    public function actionAdmin() {

        $page = App::call()->request->getParams()['page'];

        if ($page == 'two') {
            $count = App::call()->request->getParams()['count'];
            $count += App::call()->config['product_per_page'] ; // product_per_page - параметр в config
            $catalog = App::call()->orderRepository->getLimitAjaxDesc($count, App::call()->config['product_per_page']);
            // первая $count - смещение,  вторая цифра App::call()->config['product_per_page'] - это количество записей которое показывается.

            echo json_encode([
               'count' => $count,
               'catalog' => $catalog
            ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

            die();
        }

    }

    //...............В Каталоге: Добавление товара в корзину при нажатие кнопки купить......................

    public function actionBuy() {

        //...........GET и POST................................

        $id = App::call()->request->getParams()['id'];
        $price = App::call()->request->getParams()['price'];

        //....................................................

        $session = App::call()->session->getId();
        $basket = new Basket($id, "$session", $price, $price, 1);
        $count = App::call()->basketRepository->countSum('quantity', 'session_id', $session);

        // ..... Если есть такой товар то добавляет количество, если нет то добавляет новый в корзину...................

        $comparisonGoodsBasket = App::call()->basketRepository->getOneAndWhere('goods_id', $id, 'session_id', $session);
        if($comparisonGoodsBasket) {
            App::call()->basketRepository->changeBasketQuantity($id, $session);
        } else {
            App::call()->basketRepository->insert($basket);
//          App::call()->basketRepository->save($basket); //!!! НЕ РАБОТАЕТ ПОЧЕМУ???
        }

        echo json_encode(['count' => $count + 1], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    //.......В Корзине: при нажатие кнопки удалить - удаляет полностью.....................................

    public function actionDelete() {

        //................Через POST.............................

        $session_id = App::call()->session->getId();
        $id = App::call()->request->getParams()['id'];
        $basket = App::call()->basketRepository->getOneAndWhere('id', $id, 'session_id', $session_id);


        App::call()->basketRepository->delete($basket);


        $response = [
            'count' =>  App::call()->basketRepository->countSum('quantity', 'session_id', $session_id),
            'summ' => App::call()->basketRepository->countSum('price', 'session_id', $session_id)
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }

    // Добавление товара при нажатие "+" в Корзине

    public function actionAddBasket() {

        $session = App::call()->session->getId();
        $id = App::call()->request->getParams()['id'];
        $goods_id = App::call()->request->getParams()['goods'];


        // Добавляет количество и прибавляет сумму к товару
        App::call()->basketRepository->changeBasketQuantity($goods_id, $session);

        $basket = App::call()->basketRepository->getOneAndWhere('id', $id, 'session_id', $session);

        $response = [
            'count' =>  App::call()->basketRepository->countSum('quantity', 'session_id', $session),
            'quantity' => $basket->quantity,
            'price' => $basket->price,
            'summ' => App::call()->basketRepository->countSum('price', 'session_id', $session)
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    // Удаление товара при нажатие "-" в Корзине

    public function actionDel() {

        $session_id = App::call()->session->getId();
        $id = App::call()->request->getParams()['id'];
        $goods_id = App::call()->request->getParams()['goods'];
        $basket = App::call()->basketRepository->getOneAndWhere('id', $id, 'session_id', $session_id);

        App::call()->basketRepository->changeBasketQuantityDel($goods_id, $session_id);

        //......Если количество 0, но в данном случае 1, так как идёт код выше проверки. То удаляется полность.......

        if ($basket->quantity == 1) {
            App::call()->basketRepository->delete($basket);
            $deleteWholly = 'yes';
        } else {
            $deleteWholly = 'no';
        }

        // Уже с изменённым количеством, так как $basket имеет другое количество, до изменения.
        $basketChange = App::call()->basketRepository->getOneAndWhere('id', $id, 'session_id', $session_id);

        $response = [
            'count' =>  App::call()->basketRepository->countSum('quantity', 'session_id', $session_id),
            'summ' => App::call()->basketRepository->countSum('price', 'session_id', $session_id),
            'quantity' => $basketChange->quantity,
            'deleteWholly' => $deleteWholly,
            'price' => $basketChange->price,
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }

}