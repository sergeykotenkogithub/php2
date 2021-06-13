<?php


namespace app\models\task;

class Digital extends Product
{
    public static $total = 0;

    function ThisPrice () {
        $result = $this->originalPrice / 2;
        Digital::$total += $result;
        return $result;
    }
}