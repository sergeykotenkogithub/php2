<?php

namespace app\models;

final class Gallery extends DBModel
{
    protected $id;
    protected $image;
    protected $views;

    //.................Сетеры и гетеры....................................

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function setViews($views): void
    {
        $this->views = $views;
    }

    public $props = [
        'image' => [
            'value' => null,
            'boolean' => false
        ],
        'views' => [
            'value' => null,
            'boolean' => false
        ]
    ];

    //...................................................................

    public function __construct($image = null, $views = null)
    {
//        $this->image = $image;
//        $this->views = $views;

        $this->props['name']['value'] = $image;
        $this->props['feedback']['value'] = $views;

    }

    protected static function getTableName() {
        return 'gallery';
    }
}