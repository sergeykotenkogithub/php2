<?php


namespace app\engine;


class Cookie
{
    public function destroy($key) {
      setcookie($key, "", time()-1, "/" );
    }

    public function set($key, $value) {
      setcookie($key, $value, time() +3600, "/");
    }

    public function get($key) {
       return $_COOKIE[$key];
    }
}