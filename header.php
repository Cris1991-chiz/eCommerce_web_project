<?php
    include ('link-script.php');
?>
<body>
    <div class="top-nav-bar">
        <div class="search-box"> <!--Bootstrap-->
            <i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
            <i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>
            <img src="./assets/image/logo.jpg" class="logo">

            <form class="search-form" action="search.php" method="post">
                <input type="text" name="search" class="form-control"> <!--Bootstrap-->
                <span class="input-group-text"><i class="fa fa-search"></i></span> <!--Bootstrap-->
            </form>
        </div>
        <div class="menu-bar">
            <ul>
                <li class="btn-home"><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="register.php">Sign Up</a></li>
                <li><a href="login.php">Log In</a></li>
                <li class="btn-cart"><a href="cart.php"><i class="fa fa-shopping-basket"></i>Cart</a>
                <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData('market.cart')); ?></span>
                </li>
            </ul>
        </div>
    </div>
    <div class="menu">
        <div class="drop-menu">
            <ul>
                <li><a href="#">Foods</a>
                    <div class="sub-menu">
                        <div class="menu-food">
                            <p><a href="groceries.html">Groceries</a></p>
                            <a href="groceries.html"><img src="./assets/images/f1.jpg" alt="Meryenda"></a>
                        </div>
                        <div class="menu-food">
                            <p><a href="groceries.html">Meat</a></p>
                            <img src="./assets/images/f3.jpg" alt="Meat">                         
                        </div>
                        <div class="menu-food">
                            <p><a href="groceries.html">Fruits</a></p>
                            <img src="./assets/images/f2.jpg" alt="Fruits">
                        </div>
                        <div class="menu-food">
                            <p><a href="groceries.html">Vegetables</a></p>
                            <img src="./assets/images/f4.jpg" alt="Vegetables">
                        </div>
                    </div>
                </li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Services</a></li>
            </ul>
        </div>
    </div>