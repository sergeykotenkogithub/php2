<?php

namespace app\models;

class Headline extends Model
{
    protected $id;
    protected $title;
    protected $text;

    protected function getTableName() {
        return 'news';
    }
}