<?php
    ob_start();
    // include <link-script.php
    //include ('link-script.php');
    // include header.php file
    include ('header.php');
?>

<?php

    /*  include banner ads */
        include ('Template/_image-slider.php');

    /*  include top sale section */
        include ('Template/_onsale-products.php');

    /*  include banner area  */
        include ('Template/_new-products.php');

    /*  include special price section  */
         include ('Template/_website-features.php');

?>


<?php
// include footer.php file
include ('footer.php');
?>