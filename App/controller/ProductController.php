<?php

    class ProductController
    {

      public function pageIndex()
      {
        require_once(Helper::getFilepathString([ROOT, 'App', 'view', 'product.php']));
        return true;
      }
      // end of class
    }
