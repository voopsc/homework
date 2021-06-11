<?php


    class Product {

        /** id of product
         * @var $id
         */
        private $id;

        /** name of product
         * @var $name
         */
        private $name;

        /** description of product
         * @var $description
         */
        private $description;

        /** Get products list
         * @var array $product with associative array with products
         */
        private $products;

        /**
         * Product constructor.
         */

        public function __construct()
        {
//            $this->id = '';
//            $this->name = '';
//            $this->description = '';
            $this->products = json_decode(file_get_contents('db.txt'), true);
        }

        /** Setup products from array to file
         */
        public function createProducts()
        {
            $product = [
                'id' => 1,
                'name' => 'Phone',
                'description' => ''
            ];

            $products = [];
            $a = $product['name'];

            foreach (range(1, 100) as $idx) {
                $product['id'] = $idx;
                $product['name'] = $a . $idx;
                $products[] = $product;
            }
            file_put_contents('db.txt', json_encode($products));
        }

        /** Get products from file
         * @param int $id
         * @return array|boolean
         */
        private function getProductById(int $id)
        {
            $products = $this->products;

            $key = array_search($id, array_column($products, 'id'));

            if (empty($key)) return false;

            return $products[$key];

        }

        /** Get list of products from file
         * @return array|mixed
         */
        public function getProductList(): array
        {
            return $this->products;
        }

        /** Set new product to exist product array if product doesnt exist
         * and sort array by ASC
         * @param array $options with new product data
         * @return boolean
         */
        public function setProduct(array $options): bool
        {
            $products = $this->products;
            $product = $this->getProductById($options["id"]);

            if (!$product) {
                array_push($products, $options);
                usort($products, function($a, $b) {
                    return $a['id'] <=> $b['id'];
                });
                $update = file_put_contents('db.txt', json_encode($products));
                return (boolean) $update;
            }

            return false;
        }
        //end of class
    }

    $newProduct = [
        'id' => 154,
        'name' => 'Phone',
        'description' => ''
    ];

    $test = new Product();

//    add product
//    var_dump($test->setProduct($newProduct));


//    get product list
//    var_dump($test->getProductList());

//    restart products
//    $test->createProducts();





