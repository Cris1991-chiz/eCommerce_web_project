<?php

$item_id = $_GET['item_id'] ?? 1;
    foreach($product->getData() as $item) :
        if($item['item_id'] == $item_id) :

?>
<section class="single-product">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div id="product-slider" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo $item['item_image'] ?? "./assets/products/1.jpg"; ?>" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $item['item_image'] ?? "./assets/products/2.jpg"; ?>" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $item['item_image'] ?? "./assets/products/3.jpg"; ?>" class="d-block w-100">
                        </div>
                        <a class="carousel-control-prev" href="#product-slider" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#product-slider" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <p class="new-arrival text-center"> NEW</p>
                    <h2> <?php echo $item['item_name'] ?? 'Unknown'; ?> </h2>
                    <p>Produt Code: HASYTWFD62</p>
                    <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    <p class="price"><?php echo $item['item_price'] ?? 0; ?></p>
                    <p><b>Availability:</b> In Stock</p>
                    <p><b><?php echo $item['item_brand'] ?? 'Brand'; ?></b> Lacost</p>
                    <p><b>Condition:</b> New</p>
                    <label>Quantity: </label>
                    <input type="text" value="1">
                    <button type="button" class="btn btn-primary">Add to Cart</button>
                </div>
            </div>
        </div>
    </section>
    <section class="product-description">
        <div class="container">
            <h6>Product Description</h6>
            <p>Lorem ipsum dolor, sit amet consectetur <b>Subscribe to Chiz Panaligan Channel</b> Lorem ipsum dolor sit amet consectetur 
                adipisicing elit. Minus odio, in animi officia nisi cum vel numquam asperiores exercitationem magnam
                 tenetur fugit nobis totam sapiente tempore, molestiae itaque, voluptatem ipsam?</p>
        </div>
    </section>
    <?php 
    endif;
    endforeach;

    ?>
