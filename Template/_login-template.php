<?php
    if(isset($_POST['login'])) {

        $username = $_POST['username'];
        $password = $_POST['password_1'];

        if(empty($username)) {$errors[] = 'Username required';}
        elseif(empty($password)) {$errors[] = 'Password required';}
        elseif($Users->validateUser($username) === false){
            $errors[] = 'Username does not exist';
        }
        /*elseif($Users->validatePass($password) === $password){
            $errors[] = 'Password do not match';
        }*/
        else {
            $login = $Users->loginUser($username, $password);
            if($login !== $password) {
                $errors[] = 'Sorry your username or password do not match/invalid';
            } else {
                $Users->loginUser($username, $password);
            }
        }   
    }

?>
<body>
<section class="header">
        <div class="menu-reg">
            <img src="./assets/image/logo.jpg" class="btn-logo">
            <img src="./assets/image/s4.jpg" class="img-reg">
            <ul class="btn-reg">
                <li class="btn-home"><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
            <div class="btn-register">
                <h4>Login Here</h4>
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
                        <input type="text" name="username">
                    </div>
                    <div class="input-group">
                        <label>Password</label>
                        <input type="text" name="password_1">
                    </div>
                    <div class="input-group">
                        <input type="submit" name="login" value="Login" class="btn">
                        <a href="#">Forgot password?</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>