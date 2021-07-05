<?php


namespace app\models;

abstract class Model
{
    //...........Сетеры и Гетеры.......................

    protected $props = [];

    public function __set($name, $value) {
        if(isset($this->props[$name])) {
            $this->props[$name] = true;
            $this->$name = $value;
        }
    }

    // Для Twig

    public function __isset($name) {
        if(isset($this->$name)) {
            return $this->$name;
        } else {
            die('Не верное обращение к полю');
        }
    }

    public function __get($name) {
        if(isset($this->$name)) {
            return $this->$name;
        } else {
            die('Не верное обращение к полю');
        }
    }

}