<?php

    namespace Framework\Render;

    /**
     * Class for render template parts
     */
    class TemplateRender
    {

      /** Create template part as HTML string by params
      * @param string $template some view file
      * @param array $params params which will be include in template
      * @return string with HTML render
      */
      public function render(string $template, array $params):string
      {
        $html = ob_start();
        include_once($template);
        ob_end_flush();
        return $html;
      }
      // end of class
    }
