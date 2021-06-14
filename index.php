<?php

    // General settings
    ini_set('display_errors', '1');
    define('ROOT', __DIR__);
    define('FRAMEWORK', ROOT . DIRECTORY_SEPARATOR . 'Framework');

    // Namespaces
    use Framework\Autoload as Autoloader;
    use Framework\Router as Router;
    use Framework\Session as Session;


    // Autoloader
    $autoloadPath = [ROOT, 'vendor', "autoload.php"];
    require_once(implode(DIRECTORY_SEPARATOR, $autoloadPath));

    // $autoload = new Autoloader\Autoload([
    //   // 'App\\Model' => 'App'.DIRECTORY_SEPARATOR.'model',
    // ]);

    // $autoload->register();

    // Session
    $session = new Session\Session;
    $session->start();


    // Router
    $routes = Helper::getFilepathString([ROOT, 'App', 'config', 'routes.php']);
    $controller = Helper::getFilepathString([ROOT, 'App', 'controller']);

    $router = new Router\Router($routes, $controller);
    $router->run();
