<?php

    use Framework\Authentication as Auth;

    /**
     *
     */
    class AppController
    {

      public function pageLogin()
      {

        $referer = Helper::getRefererURI();

        if (!empty($_POST)) {
          $auth = new Auth\UAuth;

          $login = $_POST['user'];
          $pass = $_POST['password'];

          $auth->auth($login, $pass);
        }

        header("Location: $referer");
        return false;
      }

      public function pageLogOut()
      {
        $referer = Helper::getRefererURI();

        $auth = new Auth\UAuth;
        $auth->logOut();

        header("Location: $referer");
      }

      // end of class
    }
