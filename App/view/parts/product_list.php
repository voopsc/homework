<ul class="product-list list list-three-items">
  <?php foreach ($params as $product): ?>
    <li>
      <div class="box">
        <div class="img-wrp">
          <img src="/App/html/img/product_<?php echo $product['id']; ?>.jpg" alt="#">
          <a href="#"><?php echo $product['title']; ?></a>
        </div>
        <div class="price-box">
          <?php if (!empty($product['sale_price'])): ?>
            <p class="price"> <span class="sale"><?php echo $product['sale_price']; ?></span> грн. <span class="normal-price info"><?php echo $product['price']; ?> грн.</span> </p>
            <?php else: ?>
            <p class="price"> <span><?php echo $product['price']; ?></span> грн.</p>
          <?php endif; ?>
          <button type="button" name="button" class="btn buy-btn" title="Додати у кошик" data-id="<?php echo $product['id']; ?>">
            <img src="/App/html/img/cart.svg" alt="cart icon">
          </button>
        </div>
      </div>
    </li>
  <?php endforeach; ?>
</ul>
