<?php

 /**
  *
  */
 class Autoload
 {

   /**
   * Namespace for prefixes
   * @var array $prefixes
   */
   protected $prefixes = [];

   function __construct(array $prefixes = [])
   {
     $this->prefixes = $prefixes;
   }

   /**
   * Register loader with SPL autoloader stack.
   *
   * @return void
   */
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }


   // end of class
 }
