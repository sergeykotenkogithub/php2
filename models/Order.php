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

    protected function getTableName() {
        return 'order';
    }
}