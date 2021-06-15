<?php

namespace app\models\task;

class Digital extends Product
{
     function ThisPrice ($quantity) {
        $result = $quantity * ($this->originalPrice / 2);
        Digital::$total += $result;
        return $result;
    }
}