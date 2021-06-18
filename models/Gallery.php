<?php

namespace app\models;

class Gallery extends Model
{
    protected $id;
    protected $image;
    protected $views;

    public function __construct($image = '', $views = '')
    {
        $this->image = $image;
        $this->views = $views;
    }

    protected function getTableName() {
        return 'gallery';
    }
}