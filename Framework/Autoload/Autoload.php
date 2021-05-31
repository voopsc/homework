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

      /** Call autoloader
      * @return void
      */
      public function register()
      {
        spl_autoload_register(array($this, 'loadClass'));
      }

      public function loadClass($className)
      {
        $className = trim($className, '\\');

        foreach ($this->prefixes as $namespace => $dir) {
          if (preg_match("~[$namespace]~", $className)) {
            echo "1";
            return;
          }
        }
        // echo 'no';
        echo $className;
        die;
        // echo "<br>";
        // print_r($this->prefixes);
        // die;
      }
      // end of class
    }

    // $autoload = new Autoload([
    //   // 'App\\' => 'html',
    //   // 'Database\\Migrations' => 'database/migrations/',
    // ]);
    //
    // $test = $autoload->loadClass();
    // var_dump($test);
    //
    // echo get_class($autoload);
    // // print_r($autoload);
