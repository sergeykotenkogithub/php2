<?php

namespace app\models\task;

class One extends Product
{
    public static $total = 0;

    function ThisPrice($quantity)
    {
        $result = $this->originalPrice * $quantity;
        One::$total += $result;
        return $result;
    }
}