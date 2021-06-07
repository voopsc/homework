<?php

    namespace Framework\Router;

    /** Error handler class for
     *
     */
    class ErrorHandler
    {

      function __construct()
      {
        $this->developerMode = (int) ini_get('display_errors');
      }

      public function getError($errorNum)
      {
        if ($this->developerMode == 1) {
          switch ($errorNum) {
            case 5: echo "Error x0006: there is no page (action) controller"; die;
            case 4: echo "Error x0005: there is no controller file in app or in framework"; die;
            case 3: echo "Error x0004: there is empty router rules"; die;
            case 2: echo "Error x0003: there is no action in existed controller"; die;
            case 1: echo "Error x0002: there is no controller file for this URI"; die;
            case 0: echo "Error x0001: there is no route rule and controller/action for this URI"; die;
          }
        } else {
          $this->serverError();
        }
      }

      private function serverError()
      {
        die('Some error');
      }


      // FIXME: change get error method from if to exceptions in future
      // public function register()
      // {
      //   set_error_handler([$this, 'getError']);
      // }
      //
      // private function getError($errno, $errstr, $errfile, $errline)
      // {
      //
      //   return true;
      // }
      // end of class
    }
