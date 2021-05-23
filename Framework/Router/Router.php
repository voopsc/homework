<?php

    namespace Framework\Router;

    /**
     *
     */
    class Router
    {

      /** Routes rules
      * @var array $routes
      */
      private $routes;

      /** Mapping of router rules to object
      *
      * @var string $routesPath
      */
      public function __construct($routesPath)
      {
        if (file_exists($routesPath)) {
          $this->routes = include($routesPath);
        } else {
          $this->serverError();
        }
      }

      private function serverError()
      {

      }

      public function run()
      {
        print_r($this->routes);
      }

      // end of class
    }
