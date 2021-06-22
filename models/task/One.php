<?php

namespace app\models\task;

class One extends Product
{
    function ThisPrice($quantity)
    {
        $result = $this->originalPrice * $quantity;
        One::$total += $result;
        return $result;
    }
}