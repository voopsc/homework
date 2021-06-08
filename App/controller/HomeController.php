<?php

    class HomeController
    {

      /** Controller for home page
      *
      */
      public function pageIndex()
      {
        require_once(Helper::getFilepathString([ROOT, 'App', 'view', 'home.php']));
        return true;
      }
      // end of class
    }
