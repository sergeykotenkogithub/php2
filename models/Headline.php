<?php

namespace app\models;

class Headline extends Model
{
    protected $id;
    protected $title;
    protected $text;

    public function __construct($title = null, $text = null)
    {
        $this->title = $title;
        $this->text = $text;
    }

    protected static function getTableName() {
        return 'news';
    }
}