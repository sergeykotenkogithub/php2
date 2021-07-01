<?php


namespace app\models\repositories;


use app\models\Basket;
use app\models\Product;
use app\models\Repository;

class ProductRepository extends Repository
{

    protected function getEntityClass() {
        return Product::class;
    }

    protected function getTableName() {
        return 'goods';
    }
}