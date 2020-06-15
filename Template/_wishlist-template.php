<!-- Shopping cart section  -->
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['delete-item'])) {
            $deleteCartItem = $Cart->deleteCartItem($_POST['item_id']);
        }

        if(isset($_POST['cart-submit'])) {
            $Cart->saveForLater($_POST['item_id'], 'market.cart', 'market.wishlist');
        }
    }

?>
<section id="cart" class="py-1">
        <div class="container-fluid w-75">
            <h5 class="font-baloo font-size-20">Wishlist</h5>

            <!--  shopping cart items   -->
                <div class="row">
                    <div class="col-sm-9">
                    <?php
                    //$result = $product->getProduct(5);
                    //print_r($result);
                    foreach($product->getData('market.wishlist') as $item) :
                        $cart = $product->getProduct($item['item_id']);
                        //print_r($cart);
                        $subTotal[] = array_map(function($item) {
                    
                    ?>
                        <!-- cart item -->
                            <div class="row border-top py-3 mt-3">
                                <div class="col-sm-2">
                                    <img src="<?php echo $item['item_image'] ?? "./assets/products/1.jpg"; ?>" style="width:100%;" alt="cart1" class="img-fluid">
                                </div>
                                <div class="col-sm-8">
                                    <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? 'Unknown'; ?></h5>
                                    <small><?php echo $item['item_brand'] ?? 'Brand'; ?></small>
                                    <!-- product rating -->
                                    <div class="d-flex">
                                        <div class="rating text-warning font-size-12">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                          </div>
                                          <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                                    </div>
                                    <!--  !product rating-->

                                    <!-- product qty -->
                                        <div class="qty d-flex pt-2">
                                            <form method="post">
                                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                                <button type="submit" name= "delete-item" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                                            </form>

                                            <form method="post">
                                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? 0; ?>">
                                                <button type="submit" name="cart-submit" class="btn font-baloo text-danger">Add to Cart</button>
                                            </form>
                                        </div>
                                    <!-- !product qty -->
                                </div>

                                <div class="col-sm-2 text-right">
                                    <div class="font-size-20 text-danger font-baloo">
                                        $<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['item_price'] ?? 0; ?></span>
                                    </div>
                                </div>
                            </div>
                        <!-- !cart item -->
                    <?php
                        return $item['item_price'];
                        }, $cart);
                        //print_r($subTotal);
                        endforeach;
                        //print_r($subTotal);
                    ?>    
                    </div>
                </div>
            <!--  !shopping cart items   -->
        </div>
    </section>
<!-- !Shopping cart section  --> 