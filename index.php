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
      // 'App\\Model' => 'App'.DIRECTORY_SEPARATOR.'model',
      // 'Framework\\Router' => 'Framework'.DIRECTORY_SEPARATOR.'Router',
      // 'Framework\\Autoload' => 'Framework'.DIRECTORY_SEPARATOR.'Autoload',
    ]);

    $autoload->register();


    // Router
    $routes = [ROOT, 'App', 'config', 'routes.php'];
    $routes = Helper::getFilepathString($routes);

    $controller = [ROOT, 'App', 'controller'];
    $controller = Helper::getFilepathString($controller);

    $router = new Router\Router($routes, $controller);
    $router->run();
