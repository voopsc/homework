<?php

use Framework\Helper\Help;
use Framework\Router\Router;
use Framework\Session\Session;

// General settings
ini_set('display_errors', '1');

define('ROOT', __DIR__);
define('FRAMEWORK', ROOT . DIRECTORY_SEPARATOR . 'Framework');

// Autoloader
$autoloadPath = [ROOT, 'vendor', "autoload.php"];
$autoloader = require_once(implode(DIRECTORY_SEPARATOR, $autoloadPath));

// Session
$session = new Session();
$session->start();

// Router
$routes = Help::getFilepathString([ROOT, 'App', 'config', 'routes.php']);
$controller = Help::getFilepathString([ROOT, 'App', 'controller']);

$router = new Router($routes, $controller);
$router->run();
