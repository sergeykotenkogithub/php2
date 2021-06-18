<?php

namespace app\models;

class Order extends Model
{
    protected $id;
    protected $hash;
    protected $email;
    protected $date;
    protected $user_id;
    protected $status;
    protected $total;

    public function __construct($hash = '', $email = '', $date = '', $user_id = '', $status = '', $total = '')
    {
        $this->hash = $hash;
        $this->email = $email;
        $this->date = $date;
        $this->user_id = $user_id;
        $this->status = $status;
        $this->total = $total;
    }

    protected function getTableName() {
        return 'orders';
    }
}