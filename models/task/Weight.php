<?php


namespace app\models\task;

class Weight extends Product
{
    public static $total = 0;

    function ThisPrice ($weight) {
        $resultWeight = $weight / 1000;
        $result = $resultWeight * $this->originalPrice;
        Weight::$total += $result;
        return $result;
    }
}