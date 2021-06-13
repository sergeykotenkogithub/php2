<?php

namespace app\models;

class Feedback extends Model
{
    protected $id;
    protected $name;
    protected $feedback;
    protected $goods_id;
    protected $it_is; // К чему относится отзыв, к продукту или товару

    protected function getTableName() {
        return 'feedback';
    }
}