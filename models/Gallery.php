<?php

namespace app\models;

class Gallery extends Model
{
    public $id;
    public $image;
    public $views;

    protected function getTableName() {
        return 'gallery';
    }
}