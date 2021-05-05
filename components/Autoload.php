<?php

  class Autoload {

      function default_autoload($className)
      {
        echo $className;
      }
      spl_autoload_register('default_autoload');
  }
