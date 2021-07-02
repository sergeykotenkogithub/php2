<?php

namespace app\models\entities;
use app\models\Model;

final class Order extends Model
{
    protected $id;
    protected $hash;
    protected $email;
    protected $date;
    protected $user_id;
    protected $status;
    protected $total;

    protected $props = [
        'hash' => false,
        'email' => false,
        'date' => false,
        'user_id' => false,
        'status' => false,
        'total' => false,
    ];

    public function __construct($hash = null, $email = null, $date = null, $user_id = null, $status = null, $total = null)
    {
        $this->hash = $hash;
        $this->email = $email;
        $this->date = $date;
        $this->user_id = $user_id;
        $this->status = $status;
        $this->total = $total;
    }
}