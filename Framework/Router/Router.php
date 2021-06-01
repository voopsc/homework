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
      * @var string $routesPath with path for app router rules array
      */
      public function __construct($routesPath)
      {
        if (file_exists($routesPath)) {
          $this->routes = include($routesPath);
        } else {
          $this->serverError();
        }

        $this->errorHandler = new Router\ErrorHandler;
      }

      /** Get requested uri and prepare it to comparison with router rule
      * (normalize uri value)
      * @return string $routerString
      */
      private function getURI(): string
      {

        if (!empty($_SERVER['REQUEST_URI'])) {
          // normalize string
          $routerString = trim($_SERVER['REQUEST_URI'], '/');

          // Get part of uri without GET request if it exist (ignore GET)
          if (preg_match('~\?~', $routerString)) {
            // get rule for router which based on request uri
            $routerString = explode('?', $routerString);
            $routerString = array_shift($routerString);
            // normalize route rule
            $routerString = trim($routerString, '/');
          }
          return (string) $routerString;
        }

      }

      /** Get pair of router rule and router path (controller/action)
      * by requested uri
      *
      * @return array|void
      */
      private function checkURI()
      {
        // vars initalization
        $result = false;
        $uri = $this->getURI();
        $routesArray = $this->routes;

        // get existed rule for user requested uri
        foreach ($routesArray as $rulePattern => $path) {
          if (preg_match("~$rulePattern~i", $uri)) {
            $result = [$rulePattern, $path];
            return $result;
          }
        }
      }

      public function run()
      {
        $requestedURI = $this->getURI();
        $routeData = $this->checkURI();

        if (!empty($routeData)) {
          // code...
        } else {

        }




        var_dump($this->checkURI());
      }

      // end of class
    }
