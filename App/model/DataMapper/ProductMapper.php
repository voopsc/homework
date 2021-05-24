<?php

    use Framework\Database as Database;

    /**
     *
     */
    class ProductMapper
    {

      function __construct()
      {
        $this->product = new Product;
      }

      /** Get product list from db
      * @return array
      */
      public function getProductList(): array
      {
        $db = $this->db->getConnection();

        $sql = 'SELECT val_one, val_two, val_three, etc FROM product ORDER BY val_one ASC';

        $result = $connection->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $list = [];
        $i = 0;

        while ($row = $result->fetch()) {
          $list[$i]['val_one'] = $row['val_one'];
          $list[$i]['val_two'] = $row['val_two'];
          $list[$i]['val_three'] = $row['val_three'];
          $list[$i]['etc'] = $row['etc'];
          $i++;
        }

        return $list;
      }

      /** Get single product item from db
      * @param int $id
      * @return array|bool
      */
      public function getProductById(int $id)
      {
        $connection = $this->db->getConnection();

        $sql = 'SELECT * FROM product WHERE val_one = :id';

        $result = $connection->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $result->fetch();

        return $this->product->getSingleProduct($result);
      }


      /** Create product object in database
      * @param array $options
      * @return bool
      */
      public function create(array $options): bool
      {
        $db = $this->db->getConnection();

        $sql = 'INSERT INTO product'
             . '(val_one, val_two, val_three, etc) '
             . 'VALUES '
             . '(:val_one, :val_two, :val_three, :etc.)';

        $result = $db->prepare($sql);
        $result->bindParam(':val_one', $options['val_one'], PDO::PARAM_INT);
        $result->bindParam(':val_two', $options['val_two'], PDO::PARAM_STR);
        $result->bindParam(':val_three', $options['val_three'], PDO::PARAM_LOB);
        $result->bindParam(':etc', $options['etc'], PDO::PARAM_INT);
        return $result->execute();
      }

      /** Update product item
      * @param array $options
      * @return bool
      */
      public function update(array $options): bool
      {
        $db = $this->db->getConnection();

        $sql = "UPDATE product
             SET
               val_one = :val_one,
               val_two = :val_two,
               val_three = :val_three
             WHERE etc = :etc";

        $result = $connection->prepare($sql);
        $result->bindParam(':val_one', $options['val_one'], PDO::PARAM_INT);
        $result->bindParam(':val_two', $options['val_two'], PDO::PARAM_STR);
        $result->bindParam(':val_three', $options['val_three'], PDO::PARAM_LOB);
        $result->bindParam(':etc', $options['etc'], PDO::PARAM_INT);
        return $result->execute();
      }

      /** Delete product from db by id
      * @param int $id
      * @return boolean
      */
      public function delete(int $id): bool
      {
        $db = $this->db->getConnection();

        $sql = 'DELETE FROM product WHERE val_one = :id';

        $result = $connection->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
      }

    }
