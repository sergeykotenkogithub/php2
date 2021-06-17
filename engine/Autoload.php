<?php

namespace app\engine;

class Autoload
{
    function loadClass($className)
    {
         $strReplace = str_replace(["app\\","\\"], [ROOT . DS, DS], $className) . ".php";

         /*
            //.....Вопрос: ?........
            // ПОЧЕМУ если так записать то все слеши будут нормальными, тоесть такими: /, а если в варианте выше то: \ ?
             $strReplace = str_replace(["app\\","\\"], [ROOT . DIRECTORY_SEPARATOR, "/"], $className) . ".php";
             var_dump($strReplace); // Проверка
         */
        if (file_exists($strReplace)) {
            include $strReplace;
        }
    }
}