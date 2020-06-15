<?php
    try {
        //if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['register'])) {
                //$errors = array();
                $username = trim($_POST['username']);
                $email = trim($_POST['email']);
                $password_1 = trim($_POST['password_1']); 
                $password_2 = trim($_POST['password_2']);
                
                if(empty($username)) {$errors[] = 'Username required';}
                elseif(empty($email)) {$errors[] = 'Email required';}
                elseif(empty($password_1)) {$errors[] = 'Password required';}
                elseif($password_1 != $password_2) {$errors[] = 'Password do not match';}         
                elseif($Users->validateUser($username) == $username){
                    $errors[] = 'Username already taken';
                }
                elseif($Users->validateEmail($email) == $email){
                    $errors[] = 'Email already taken';
                }
                if(count($errors) == 0) {
                    $Users->registerUser($username, $email, $password_1, $password_2); 
                }          
            }    

    } catch (PDOException $e) {
        $errors[] = $e->getMessage();
    }

?>
<body>
<section class="header">
        <div class="menu-reg">
            <img src="./assets/image/logo.jpg" class="btn-logo">
            <img src="./assets/image/logo.jpg" class="img-reg">
            <ul class="btn-reg">
                <li class="btn-home"><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        <div class="btn-register">
            <h4>Register Here</h4>
            <form method="post" action="">
            <?php if(isset($errors)) {
                    foreach($errors as $error)
                {
                    ?>
                    <div class="input-group">
                    <p><?= $error ?></p>
                    </div>
                    <?php
                }
            } ?>
                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" >
                </div>
                <div class="input-group">
                    <label>Email</label>
                    <input type="text" name="email" >
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password_1" >
                </div>
                <div class="input-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_2">
                </div>
                <div class="input-group">
                    <input type="submit" name="register" value="Register" class="btn">
                </div>
            </form>
        </div>
        </div>
    </section>
    </body>