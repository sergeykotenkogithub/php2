<?php

//.................Автозагрузка....................................................................

namespace app\engine;

final class Autoload
{
    function loadClass($className)
    {
        $strReplace = str_replace(["app\\","\\"], [ROOT . DS, DS], $className) . ".php";
        if (file_exists($strReplace)) {
            include $strReplace;
        }
    }
}