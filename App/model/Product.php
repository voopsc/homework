<?php
    namespace App\Model;

    /**
     * @var $product
     */

    /**
     *
     */
    class Product
    {

      /** Get product object
      * @param
      * @return object|void
      */
      public function getSingleProduct($data)
      {
        if (!empty($data)) {
          $this->valOne = $data['val_one'];
          $this->valTwo = $data['val_two'];
          $this->valThree = $data['val_thre'];
          $this->etc = $data['etc'];
          return $this;
        }
      }
      // end of class
    }
