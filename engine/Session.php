<?php

// Для работы c сессиями. Обёртка над всеми операциями.

namespace app\engine;


class Session
{
    public function start() {
        session_start();
    }

    public function destroy() {
        session_destroy();
    }

    public function regenerate() {
        session_regenerate_id();
    }

    public function getId() {
        return session_id();
    }

    public function unset($key) {
        unset($_SESSION[$key]);
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function get($key) {
        return $_SESSION[$key];
    }
}