<?php

namespace app\models\entities;
use app\models\Model;

final class Order extends Model
{
    protected $id;
    protected $hash;
    protected $tel;
    protected $email;
    protected $total;
    protected $users_id;
    protected $date;
    protected $status;


    protected $props = [
        'hash' => false,
        'tel' => false,
        'email' => false,
        'total' => false,
        'users_id' => false,
        'date' => false,
        'status' => false,
    ];

    public function __construct($hash = null, $tel = null, $email = null,  $total = null, $users_id = null, $date = null,  $status = null)
    {
        $this->hash = $hash;
        $this->tel = $tel;
        $this->email = $email;
        $this->date = $date;
        $this->users_id = $users_id;
        $this->status = $status;
        $this->total = $total;
    }
}