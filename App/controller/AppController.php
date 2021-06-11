<?php

    /**
     *
     */
    class AppController
    {

      public function pageLogin()
      {

        $referer = Helper::getRefererURI();

        if (!empty($_POST)) {
          $auth = new Framework\Authentication\UAuth;

          $login = $_POST['user'];
          $pass = $_POST['password'];

          $auth->auth($login, $pass);
        }

        header("Location: $referer");
        return false;
      }
      // end of class
    }
