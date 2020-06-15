<?php
    ob_start();
    // include <link-script.php
    //include ('link-script.php');
    // include header.php file
    include ('header.php');
?>

<?php

    /*  include banner area  */
        include ('Template/_search-template.php');

    /*  include special price section  */
         include ('Template/_website-features.php');

?>


<?php
// include footer.php file
include ('footer.php');
?>