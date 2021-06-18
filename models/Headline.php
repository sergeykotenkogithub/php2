<?php

namespace app\models;

class Headline extends Model
{
    protected $id;
    protected $title;
    protected $text;

    public function __construct($title = '', $text = '')
    {
        $this->title = $title;
        $this->text = $text;
    }

    protected function getTableName() {
        return 'news';
    }
}