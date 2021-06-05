<?php

    namespace Framework\Autoload;

    /**
     *
     */
    class AutoloadBase
    {

      public function autoloadDefault($class)
      {
        $dirPath = ROOT . '\Framework';

        $scannedDir = array_diff(scandir($directory), array('..', '.'));

        return $scannedDir;
      }

    }
