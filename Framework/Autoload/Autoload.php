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

      /** Call autoloader functions
      */
      public function register()
      {
        spl_autoload_register([$this, 'simpleClass']);
        spl_autoload_register([$this, 'defaultLoader']);
        spl_autoload_register([$this, 'autoloader']);
      }

      /** Check if class have namespace if yes return array with namespace and
      * class name
      * @param string $className full class name with namespace if it exist
      * @return array
      */
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

      /** Load class without namespace
      * @param string $class
      * @return void
      */
      public function simpleClass($class)
      {
        $dirPath = ROOT . DIRECTORY_SEPARATOR . 'Framework';
        $scannedDir = array_diff(scandir($dirPath), array('..', '.'));

        foreach ($scannedDir as $dir) {
          $filepath = $dirPath . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $class . '.php';
          if (file_exists($filepath)) {
            require_once($filepath);
            return;
          }
        }
      }

      /** Load all classes from framework dir
      * @param string
      * @return void
      */
      public function defaultLoader($class)
      {
        $classInfo = $this->getNamespace($class);
        $classInfo = implode(DIRECTORY_SEPARATOR, $classInfo);
        $this->requireFile($classInfo . '.php');
      }

      /** Load mapped class from class inicialization (constructor)
      * @param string $className
      * @return void
      */
      public function autoloader($className)
      {
        $classData = $this->getNamespace($className);

        foreach ($this->prefixes as $namespace => $filepath) {
          if (preg_match("~[^$namespace$]~", $classData[0])) {
            $this->requireFile($filepath . '/' . $classData[1] . '.php');
            return;
          }
        }
      }

      /** Load single class by classname
      * @param string $className
      */
      public function load($className)
      {
        foreach ($this->prefixes as $namespace => $path) {
          if (preg_match("~[$namespace]~", $className)) {
            $filepath = str_replace("$namespace", $path, $className);
            break;
          }
        }
        echo $filepath;
        $result = $this->requireFile($filepath.'.php');
      }

      /**
       * If a file exists, require it from the file system.
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

      // end of class
    }
