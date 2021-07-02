<?php

namespace app\models\entities;
use app\models\Model;

final class Feedback extends Model
{
    protected $id;
    protected $name;
    protected $feedback;
    protected $goods_id;
    protected $it_is;

    protected $props = [
        'name' => false,
        'feedback' => false,
        'goods_id' => false,
        'it_is' => false,
    ];

    //....................................................................

    public function __construct($name = null, $feedback = null, $goods_id = null, $it_is = null)
    {
        $this->name = $name;
        $this->feedback = $feedback;
        $this->goods_id = $goods_id;
        $this->it_is = $it_is;

    }

}