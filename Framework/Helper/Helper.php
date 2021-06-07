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

      public static function requireFile(array $pathArr)
      {
        $filepath = self::getFilepathString($pathArr);

        if (file_exists($filepath)) {
          return require_once($filepath);
        }
      }

    }
