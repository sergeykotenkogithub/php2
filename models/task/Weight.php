<?php


namespace app\models\task;

class Weight extends Product
{
    public static $totalDiscount;

    function ThisPrice ($weight) {
        $resultWeight = $weight / 1000;
        if ($weight > 50000) {
            $price = $this->originalPrice * 0.9;
            $result = $resultWeight * $price;
            $discount = $resultWeight * $this->originalPrice;
            $discountTotal = $discount - $result;
            Weight::$totalDiscount = $discountTotal;
        }
        else {
            $result = $resultWeight * $this->originalPrice;
        }
        Weight::$total += $result;
        return $result;
    }
}