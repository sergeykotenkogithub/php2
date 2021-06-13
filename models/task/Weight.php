<?php


namespace app\models\task;

class Weight extends Product
{
    public static $total = 0;

    function ThisPrice ($weight) {
        $resultWeight = $weight / 1000;
        if ($weight > 50000) {
            $price = $this->originalPrice * 0.9;
            $result = $resultWeight * $price;
        }
        else {
            $result = $resultWeight * $this->originalPrice;
        }
        Weight::$total += $result;
        return $result;
    }
}