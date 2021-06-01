<?php

    namespace Framework\Router;

    /**
     *
     */
    class Router
    {

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

        $this->errorHandler = new ErrorHandler;
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
        if (is_array($routesArray)) {
          foreach ($routesArray as $rulePattern => $path) {
            if (preg_match("~$rulePattern~i", $uri)) {
              $result = [$rulePattern, $path];
              return $result;
            }
          }
        } else {
          $this->errorHandler->getError(3);
        }
      }

      public function run()
      {
        $requestedURI = $this->getURI();
        $routeData = $this->checkURI();

        if (!empty($routeData)) {
          $uriPattern = array_shift($routeData);
          $path = array_shift($routeData);

          // Set all variables for init controller and actions
          $iternalRoute = preg_replace("~$uriPattern~i", $path, $requestedURI);
          $segments = explode('/', $iternalRoute);
          $controllerName = ucfirst(array_shift($segments).'Controller');
          $pageName = 'page'.ucfirst(array_shift($segments));
          $paramenters = $segments;
          
          print_r($pageName);
          // $controllerName = array_shift($segments).'Controller';
          // $controllerName = ucfirst($controllerName);

        } else {
          $this->errorHandler->getError(0);
        }


        // var_dump($this->checkURI());
      }

      // end of class
    }
