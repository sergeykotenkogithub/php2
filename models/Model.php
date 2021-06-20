<?php


namespace app\models;

use app\engine\Db;
use app\interfaces\IModel;

abstract class Model implements IModel
{
    //...........Сетеры и Гетеры.......................

//    public function __set($name, $value) {
//        $this->$name = $value;
//    }
//
//    public function __get($name) {
//       return $this->$name;
//    }

}