<?php

//................Старт сессии................

session_start();

use app\engine\App;

include dirname( __DIR__ )  . '/vendor/autoload.php'; // Автозагрузка

//.....Конфигурационый файл.....................

$config = include dirname( __DIR__ ) . "/config/config.php";

try {

    App::call()->run($config);

}

catch (\PDOException $e) {
    var_dump('Нет подключения к базе данных');
    var_dump($e);
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
