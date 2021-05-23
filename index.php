<?php

    // General settings
    ini_set('display_errors', '1');
    define('ROOT', __DIR__);
    define('FRAMEWORK', ROOT . DIRECTORY_SEPARATOR . 'Framework');

    // Namespaces
    use Framework\Autoload as Autoloader;
    use Framework\Router as Router;

    // Autoloader
    // $autoloadPath = [FRAMEWORK, 'Autoload', 'Autoload.php'];
    // require_once(implode(DIRECTORY_SEPARATOR, $autoloadPath));

    // $autoload = new Autoloader\Autoload;


    // $a = scandir(ROOT);
    // print_r($a);



    // $autoload = new Autoload;
    // $autoload->register();

    // Router
    // FIXME: Will fix by autoloader next time - its a temporary descicion
    $routerPath = [FRAMEWORK, 'Router', 'Router.php'];
    $routes = (implode(DIRECTORY_SEPARATOR, [ROOT, 'App', 'config', 'routes.php']));
    require_once(implode(DIRECTORY_SEPARATOR, $routerPath));

    $router = new Router\Router($routes);
    $router->run();
