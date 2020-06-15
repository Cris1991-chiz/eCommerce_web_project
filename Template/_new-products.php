<?php

    shuffle($shuffle_Product);

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['new_products'])) {
            $Cart->addToCart($_POST['userid'], $_POST['item_id']);
        }
    }
?>
<!------------------------New Products---------s----->
<section class="new-products">
        <div class="container">
            <div class="title-box">
                <h2><i class="fa fa-circle"></i>New Products</h2>
            </div>
            <div class="row">
                <?php foreach($shuffle_Product as $item) { ?>
                <div class="col-md-3">
                    <div class="img-container">
                        <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? './assets/products/1.jpg'  ?>" alt="product" clas="product-img"></a>
                        <form method="post">
                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                        <input type="hidden" name="userid" value="<?php echo 1; ?>">
                        <?php
                        if(in_array($item['item_id'], $Cart->getCartId($product->getData('market.cart')) ?? [])) {
                            echo '<button class="bag-btn" disabled>
                            <i class="fas fa-shopping-cart" name="new_products"></i>In cart
                            </button>';
                        } else {
                            echo '<button class="bag-btn">
                            <i class="fas fa-shopping-cart" name="new_products"></i>add to cart
                            </button>';
                        };
                        ?>
                        </form>
                    </div>
                    <div class="product-bottom text-center">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <h3><?php echo $item['item_name'] ?? 'Unknown'?></h3>
                        <h5>$<?php echo $item['item_price'] ?? 0 ?></h5>
                    </div>
                </div>
                <?php } ?>     
            </div>
        </div>
    </section>