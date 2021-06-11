<?php

    /**
     *
     */
    class Helper
    {

      /** Create filepath string from array by implode function
      * @param array $pathArr array with path "steps"
      * @return string|void
      */
      public static function getFilepathString(array $pathArr)
      {
        if (!empty($pathArr)) {
          $path = (implode(DIRECTORY_SEPARATOR, $pathArr));
          return $path;
        }
      }


      /** Require once a file by path
      * @param array $pathArr array with directories to a file
      * @return void
      */
      public static function requireFile(array $pathArr)
      {
        $filepath = self::getFilepathString($pathArr);

        if (file_exists($filepath)) {
          return require_once($filepath);
        }
      }


      /** Return link of prev page by http_ref
      * @return string|void
      */
      public static function getRefererURI()
      {
        if (isset($_SERVER['HTTP_REFERER'])) {
          return (string) $_SERVER['HTTP_REFERER'];
        }
      }

    }
