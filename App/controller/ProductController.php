<?php

    class ProductController
    {

      public function pageIndex()
      {
        $html = new Framework\Render\TemplateRender;

        $templatePath = Helper::getFilepathString([ROOT, 'App', 'view', 'parts', 'product.php']);
        $params = [];


        require_once(Helper::getFilepathString([ROOT, 'App', 'view', 'product.php']));
        return true;
      }
      // end of class
    }
