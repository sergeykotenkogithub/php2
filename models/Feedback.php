<?php

namespace app\models;

class Feedback extends Model
{
    public $id;
    public $name;
    public $feedback;
    public $goods_id;
    public $it_is; // К чему относится отзыв, к продукту или товару

    protected function getTableName() {
        return 'feedback';
    }
}