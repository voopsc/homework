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

      }

      // end of class
    }
