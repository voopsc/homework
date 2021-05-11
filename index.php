<?php

$autoloadPath = ['components', 'Autoload.php'];
require_once(implode(DIRECTORY_SEPARATOR, $autoloadPath));

$autoload = new Autoload;
$autoload->register();

$test = new Product;
