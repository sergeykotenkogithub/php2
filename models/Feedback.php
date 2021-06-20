<?php

namespace app\models;

final class Feedback extends DBModel
{
//    protected $id;
//    protected $name;
//    protected $feedback;
//    protected $goods_id;
//    protected $it_is;

    //.................Сетеры и гетеры....................................

    public function setName($name)
    {
        $this->name = $name;
        $this->props['name']['boolean'] = true;
    }

    public function setFeedback($feedback)
    {
        $this->feedback = $feedback;
        $this->props['feedback']['boolean'] = true;
    }

    public function setGoodsId($goods_id)
    {
        $this->goods_id = $goods_id;
        $this->props['goods_id']['boolean'] = true;
    }

    public function setItIs($it_is)
    {
        $this->it_is = $it_is;
        $this->props['it_is']['boolean'] = true;
    }


    public $props = [
        'name' => [
            'value' => null,
            'boolean' => false
        ],
        'feedback' => [
            'value' => null,
            'boolean' => false
        ],
        'goods_id' => [
            'value' => null,
            'boolean' => false
        ],
        'it_is' => [
            'value' => null,
            'boolean' => false
        ],
    ];

    //....................................................................

    public function __construct($name = null, $feedback = null, $goods_id = null, $it_is = null)
    {
//        $this->name = $name;
//        $this->feedback = $feedback;
//        $this->goods_id = $goods_id;
//        $this->it_is = $it_is;

        $this->props['name']['value'] = $name;
        $this->props['feedback']['value'] = $feedback;
        $this->props['goods_id']['value'] = $goods_id;
        $this->props['it_is']['value'] = $it_is;
    }

    protected static function getTableName() {
        return 'feedback';
    }
}