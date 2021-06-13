<?php

namespace app\models;

class Order extends Model
{
   public $id;
   public $hash;
   public $email;
   public $date;
   public $user_id;
   public $status;
   public $total;

    protected function getTableName() {
        return 'order';
    }
}