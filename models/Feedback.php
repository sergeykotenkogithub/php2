<?php

namespace app\models;

final class Feedback extends DBModel
{
    protected $id;
    protected $name;
    protected $feedback;
    protected $goods_id;
    protected $it_is; // К чему относится отзыв, к продукту или товару

    public function __construct($name = null, $feedback = null, $goods_id = null, $it_is = null)
    {
        $this->name = $name;
        $this->feedback = $feedback;
        $this->goods_id = $goods_id;
        $this->it_is = $it_is;
    }

    protected static function getTableName() {
        return 'feedback';
    }
}