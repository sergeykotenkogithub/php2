<?php
//
define( 'ROOT', dirname( __DIR__ )); // Абсолютный путь для работы в Windows и Linux(nginx)
define( 'DS', DIRECTORY_SEPARATOR); // Абсолютный путь для работы в Windows и Linux(nginx)
//define( 'ROOT', str_replace( "\\", "/", realpath( dirname( __DIR__ ) ) ) );  // 2й вариант