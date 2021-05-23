<?php

    // General settings
    ini_set('display_errors', '1');
    define('ROOT', __DIR__);
    define('FRAMEWORK', ROOT . DIRECTORY_SEPARATOR . 'Framework');

    // Namespaces
    use Framework\Autoload as Autoloader;

    // Autoloader
    $autoloadPath = [FRAMEWORK, 'Autoload', 'Autoload.php'];
    require_once(implode(DIRECTORY_SEPARATOR, $autoloadPath));

    // $autoload = new Autoloader\Autoload;


    // $a = scandir(ROOT);
    // print_r($a);



    // $autoload = new Autoload;
    // $autoload->register();

    // Router
