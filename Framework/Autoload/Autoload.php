<?php


    namespace Framework\Autoload;

    /** Framework autoload class
     *
     */
    class Autoload
    {
      /**
      * An associative array where the key is a namespace prefix and the value
      * is an array of base directories for classes in that namespace.
      *
      *@var array $prefixes
      */
      protected $prefixes = [];

      /* Constructor
      *
      */
      public function __construct($prefixes = [])
      {
        $this->prefixes = $prefixes;
      }

      public function register()
      {
        spl_autoload_register([$this, 'autoloader']);
      }

      private function getNamespace($className)
      {
        $result = false;
        if (!empty($className)) {
          $result = explode('\\', $className);
          $class = array_pop($result);
          $result = [
            implode(DIRECTORY_SEPARATOR, $result),
            $class,
          ];
        }

        return $result;
      }

      public function autoloader($className)
      {
        // echo "prefixes: <br>" ;
        // print_r($this->prefixes);
        // echo "<br> calssname: <br>";
        // print_r($className);

        $classData = $this->getNamespace($className);

        foreach ($this->prefixes as $namespace => $filepath) {
          if (preg_match("~[^$namespace$]~", $classData[0])) {
            $this->requireFile($filepath . '/' . $classData[1] . '.php');
            // echo ROOT . DIRECTORY_SEPARATOR . $filepath . DIRECTORY_SEPARATOR . $classData[1] . '.php';
            return;
          }
          // else {
          //   echo "no <br>";
          // }
          // echo "namespace: ";
          // echo "<br>";
          // var_dump($namespace);
          // echo "<br>";
          // echo "class namespace: ";
          // echo "<br>";
          // var_dump($classNamespace);
          // echo "<br>";

        }
        die;
      }

      /**
       * If a file exists, require it from the file system.
       *
       * @param string $file The file to require.
       * @return bool True if the file exists, false if not.
       */
      protected function requireFile($file)
      {
          if (file_exists($file)) {
              require_once ROOT . DIRECTORY_SEPARATOR . $file;
              return true;
          }
          // return false;
      }

      // public function load($className)
      // {
      //
      // }

      // end of class
    }
