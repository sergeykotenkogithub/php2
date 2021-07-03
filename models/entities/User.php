<?php

namespace app\models\entities;
use app\models\Model;

final class User extends Model
{
    public $id;
    protected $login;
    protected $pass;
    protected $hash;
    protected $role;

    protected $props = [
        'login' => false,
        'pass' => false,
        'hash' => false,
    ];

    public function __construct($login = null, $pass = null,  $role = null, $hash = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $hash;
        $this->role = $role;
    }

}