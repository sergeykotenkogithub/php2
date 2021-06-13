<?php

namespace app\models\task;

class One extends Product
{
    public static $total = 0;

    function ThisPrice()
    {
        $result = $this->originalPrice;
        One::$total += $result;
        return $result;
    }
}