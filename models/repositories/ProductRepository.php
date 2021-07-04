<?php


namespace app\models\repositories;

use app\engine\Db;
use app\models\entities\Product;
use app\models\Repository;

class ProductRepository extends Repository
{

    public function sumRowProducts() {
        $sql = "SELECT COUNT(*) as count FROM `goods`";
        return Db::getInstance()->queryAllArray($sql);
    }

    protected function getEntityClass() {
        return Product::class;
    }

    protected function getTableName() {
        return 'goods';
    }
}