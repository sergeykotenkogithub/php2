<?php

namespace app\models;

final class Gallery extends DBModel
{
    protected $id;
    protected $image;
    protected $views;

    public function __construct($image = null, $views = null)
    {
        $this->image = $image;
        $this->views = $views;
    }

    protected static function getTableName() {
        return 'gallery';
    }
}