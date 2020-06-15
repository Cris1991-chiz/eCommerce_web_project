<!--------------------On Sale Products------------------------------->
<?php

    shuffle($shuffle_Product);

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['on-sale-submit'])) {
        $Cart->addToCart($_POST['userid'], $_POST['item_id']);
        }
    }

if(isset($_POST['submit-search'])) {
    $search = $_POST['search'];
          
    if(($row = $Search->searchProducts($search)) > 0) {
        
        
    

echo
"<section class='on-sale'>
        <div class='container'>
            <div class='title-box'>
                <h2><i class='fa fa-circle'></i>On Sale</h2>
            </div>
            <div class='row'>
                foreach($shuffle_Product as $item) {
                <div class='col-md-3'>
                    <div class='img-container'>
                        
                        <form method='post'>
                        <input type='hidden' name='item_id' value='<?php echo $item["item_id"] ?? "1"; ?>'>
                        <input type='hidden' name='userid' value="<?php echo 1; ?>">

                        if(in_array($item['item_id'], $Cart->getCartId($product->getData('market.cart')) ?? [])) {
                            echo "<button class='bag-btn' name='on-sale-submit'disabled data-id=1>
                            <i class='fas fa-shopping-cart'></i>In Cart
                            </button>";
                        } else {
                            echo "<button class='bag-btn' name='on-sale-submit' data-id=1>
                            <i class='fas fa-shopping-cart'></i>add to cart
                            </button>";
                        };
                        </form>
                    </div>
                    <div class='product-bottom text-center'>
                        <i class='fa fa-star'></i>
                        <i class='fa fa-star'></i>
                        <i class='fa fa-star'></i>
                        <i class='fa fa-star'></i>
                        <i class='fa fa-star-half-o'></i>
                        <h3>"$item['item_name'] ?? 'Unknown'"</h3>
                        <h5>"$ $item['item_price'] ?? 0; "</h5>
                    </div>
                </div>
                }
            </div>
        </div>
    </section>";
    }
}
?>