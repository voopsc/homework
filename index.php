<?php

    // General settings
    ini_set('display_errors', '1');
    define('ROOT', __DIR__);
    define('FRAMEWORK', ROOT . DIRECTORY_SEPARATOR . 'Framework');

    // Namespaces
    use Framework\Router\Router;
    use Framework\Session\Session;


    // Autoloader
    $autoloadPath = [ROOT, 'vendor', "autoload.php"];
    require_once(implode(DIRECTORY_SEPARATOR, $autoloadPath));

    // Session
    $session = new Session;
    $session->start();

    // Router
    $routes = Helper::getFilepathString([ROOT, 'App', 'config', 'routes.php']);
    $controller = Helper::getFilepathString([ROOT, 'App', 'controller']);

    $router = new Router($routes, $controller);
    $router->run();
