<?php

namespace app\models\task;

class Digital extends Product
{
    public static $total = 0;

    function ThisPrice ($quantity) {
        $result = $quantity * ($this->originalPrice / 2);
        Digital::$total += $result;
        return $result;
    }
}