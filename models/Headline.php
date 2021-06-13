<?php

namespace app\models;

class Headline extends Model
{
    public $id;
    public $title;
    public $text;

    protected function getTableName() {
        return 'headline';
    }
}