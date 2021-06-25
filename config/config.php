<?php

define( 'ROOT', dirname( __DIR__ )); // Абсолютный путь для работы в Windows и Linux(nginx)
//define( 'ROOT', str_replace( "\\", "/", realpath( dirname( __DIR__ ) ) ) );  // 2й вариант
define( 'DS', DIRECTORY_SEPARATOR); // Слеш в зависимости от операционной системы
define('CONTROLLER_NAMESPACE', "app\\controllers\\"); // Для читаемого отображения
define("VIEWS_DIR", ROOT . '/views/'); // Views
define("PRODUCT_PER_PAGE", 2); // Views
