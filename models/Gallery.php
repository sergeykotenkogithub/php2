<?php

namespace app\models;

class Gallery extends Model
{
    protected $id;
    protected $image;
    protected $views;

    protected function getTableName() {
        return 'gallery';
    }
}