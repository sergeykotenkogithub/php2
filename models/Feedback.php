<?php

namespace app\models;

class Feedback
{
    public $id;
    public $name;
    public $feedback;
    public $goods_id;
    public $it_is; // К чему относится отзыв, к продукту или товару
}