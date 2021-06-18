<?php

namespace app\models;

class Feedback extends Model
{
    protected $id;
    protected $name;
    protected $feedback;
    protected $goods_id;
    protected $it_is; // К чему относится отзыв, к продукту или товару

    public function __construct($name = '', $feedback = '', $goods_id = '', $it_is = '')
    {
        $this->name = $name;
        $this->feedback = $feedback;
        $this->goods_id = $goods_id;
        $this->it_is = $it_is;
    }

    protected function getTableName() {
        return 'feedback';
    }
}