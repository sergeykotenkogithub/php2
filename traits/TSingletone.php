<?php


namespace app\traits;


use app\engine\Db;

trait TSingletone
{
    private static $instance = null;

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    //.......Для PhpStorm чтобы видел getInstance.........

    /**
     * @return static
     *
     */

    public static function getInstance() {
        if (is_null(static::$instance)) {
            static::$instance = new static(); // new Db(), пишу static чтобы если вдруг имя поменяется
        }
        return static::$instance;
    }
}