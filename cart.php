<?php
    ob_start();
    // include <link-script.php
    //include ('link-script.php');
    // include header.php file
    include ('header.php');
?>

<?php
    /* include top sale section */
    count($product->getData('market.cart')) ? include ('Template/_cart-template.php') : include ('Template/emtyCart/_cart-emty.php');

    /* include top sale section */
    count($product->getData('market.wishlist')) ? include ('Template/_wishlist-template.php') : include ('Template/emtyCart/_wishlist-emty.php');
?>

<?php
    // include header.php file
    include ('footer.php');
?>