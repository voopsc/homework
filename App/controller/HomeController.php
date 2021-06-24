<?php

use Framework\Helper\Help;
use Framework\Render as Render;

class HomeController
{

    /** Controller for home page
     *
     */
    public function pageIndex()
    {
        $html = new Render\TemplateRender;

        $templatePath = Help::getFilepathString([ROOT, 'App', 'view', 'parts', 'product_list.php']);
        $params = include_once(Help::getFilepathString([ROOT, 'App', 'src', 'products.php']));

        require_once(Help::getFilepathString([ROOT, 'App', 'view', 'home.php']));

        return true;
    }
    // end of class
}
