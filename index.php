<?php

    // General settings
    ini_set('display_errors', '1');
    define('ROOT', __DIR__);
    define('FRAMEWORK', ROOT . DIRECTORY_SEPARATOR . 'Framework');

    // Namespaces
    use Framework\Autoload as Autoloader;
    use Framework\Router as Router;

    // Autoloader
    $autoloadPath = [FRAMEWORK, 'Autoload', 'Autoload.php'];
    require_once(implode(DIRECTORY_SEPARATOR, $autoloadPath));

    $autoload = new Autoloader\Autoload([
      'Framework\\Router' => 'Framework/Router',
    ]);
    
    $autoload->register();

    // $a = scandir(ROOT);
    // print_r($a);



    // $autoload = new Autoload;
    // $autoload->register();

    // Router
    $router = new Router\Router;
    $router->run();
