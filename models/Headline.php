<?php

namespace app\models;

class Headline extends Model
{
//    public $id;
//    public $title;
//    public $text;

    protected $id;
    protected $title;
    protected $text;

    //................Сетеры и Гетеры................................

    public function setTitle($title)
    {
        $this->title = $title;
        $this->props['title'] = true;
    }

    public function setText($text)
    {
        $this->text = $text;
        $this->props['text'] = true;
    }

    public $props = [
        'title' => false,
        'text' => false
    ];

    //.................................................................

    public function __construct($title = false, $text = false)
    {
        $this->title = $title;
        $this->text = $text;
    }

    protected static function getTableName() {
        return 'news';
    }
}