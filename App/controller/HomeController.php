<?php

    use Framework\Render as Render;

    class HomeController
    {

      /** Controller for home page
      *
      */
      public function pageIndex()
      {
        // $html = new Render\TemplateRender;
        //
        // $templatePath = Helper::getFilepathString([ROOT, 'App', 'view', 'parts', 'product_list.php']);
        // $params = include_once(Helper::getFilepathString([ROOT, 'App', 'src', 'products.php']));
        //
        // require_once(Helper::getFilepathString([ROOT, 'App', 'view', 'home.php']));

        $auth = new Framework\Authentication\UAuth();
        $login = $auth->isAuth();
        print_r($auth->credName);
        var_dump($login);

        return true;
      }
      // end of class
    }
