<?php

namespace autoload;

class Autoload
{
    function loadClass($className)
    {
        $strReplace = str_replace(["\\","app/"], ["/", ROOT . "/"], $className);
        $fileName = "{$strReplace}.php";

        var_dump($fileName); // Проверка

        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}