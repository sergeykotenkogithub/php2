<?php

namespace app\models;

class Headline extends Model
{
    //..............Массив таблиц в Mysql............................

    public $props = [
        'title' => [
            'value' => null,
            'boolean' => false
        ],
        'text' => [
            'value' => null,
            'boolean' => false
        ]
    ];

    //................Сетеры и Гетеры................................

    public function setTitle($title)
    {
        $this->title = $title;
        $this->props['title']['boolean'] = true;
    }

    public function setText($text)
    {
        $this->text = $text;
        $this->props['text']['boolean'] = true;
    }

    //.................................................................

    public function __construct($title = null, $text = null)
    {
        $this->props['title']['value'] = $title;
        $this->props['text']['value'] = $text;
    }

    protected static function getTableName() {
        return 'news';
    }
}