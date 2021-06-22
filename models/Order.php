<?php

namespace app\models;

final class Order extends DBModel
{
//    protected $id;
//    protected $hash;
//    protected $email;
//    protected $date;
//    protected $user_id;
//    protected $status;
//    protected $total;

    //....................Сетеры и гетеры...............................

    public function setHash($hash): void
    {
        $this->hash = $hash;
        $this->props['hash']['boolean'] = true;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
        $this->props['email']['boolean'] = true;
    }

    public function setDate($date): void
    {
        $this->date = $date;
        $this->props['date']['boolean'] = true;
    }

    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
        $this->props['user_id']['boolean'] = true;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
        $this->props['status']['boolean'] = true;
    }

    public function setTotal($total): void
    {
        $this->total = $total;
        $this->props['total']['boolean'] = true;
    }

    public $props = [
        'hash' => [
            'value' => null,
            'boolean' => false
        ],
        'email' => [
            'value' => null,
            'boolean' => false
        ],
        'date' => [
            'value' => null,
            'boolean' => false
        ],
        'user_id' => [
            'value' => null,
            'boolean' => false
        ],
        'status' => [
            'value' => null,
            'boolean' => false
        ],
        'total' => [
            'value' => null,
            'boolean' => false
        ]
    ];


    //......................................................................................................

    public function __construct($hash = null, $email = null, $date = null, $user_id = null, $status = null, $total = null)
    {
//        $this->hash = $hash;
//        $this->email = $email;
//        $this->date = $date;
//        $this->user_id = $user_id;
//        $this->status = $status;
//        $this->total = $total;

        $this->props['hash']['value'] = $hash;
        $this->props['email']['value'] = $email;
        $this->props['date']['value'] = $date;
        $this->props['user_id']['value'] = $user_id;
        $this->props['status']['value'] = $status;
        $this->props['total']['value'] = $total;
    }

    protected static function getTableName() {
        return 'orders';
    }
}