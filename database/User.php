<?php

    class User {
        
        private $db;

        function __construct($db) {
            $this->con = $db;
        }

        public function validateUser($username) {            
            try {
                $stmt = $this->con->prepare("SELECT * FROM market.user WHERE username = :username");
                $stmt->bindParam(':username', $username);
                //$user_check_stmt->bindParam(':email', $email);
                $result = $stmt->execute(); //([$username, $email]);
                //print_r($result);
                //$row = $result->rowCount();
                //var_dump($user);                
                $row = $stmt->fetchColumn();
                if($row > 0) {
                    
                    return true;

                    /*if($user['username'] == $username) {
                        $errors[] = 'Username already taken';
                    
                    }elseif($user['email'] == $email) {
                        $errors[] = 'Username already taken';
                    }*/
                } else {
                    return false;
                }          
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function validateEmail($email) {
            try {
                $stmt = $this->con->prepare("SELECT * FROM market.user WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $row = $stmt->fetchColumn();

                if($row > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        /*public function validatePass($password_1) {
            try {
                $password = password_hash($password_1, PASSWORD_DEFAULT);
                $stmt = $this->con->prepare("SELECT * FROM market.user WHERE password = :password");
                $stmt->bindParam(':password', $password);
                $stmt->execute();
                $row = $stmt->fetch();

                if($row === 1) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                $errors[] = $e->getMessage();
            }
        }*/

        public function registerUser($username, $email, $password_1) {
            try{
                $password = password_hash($password_1, PASSWORD_DEFAULT);
                $stmt = $this->con->prepare("INSERT INTO market.user (username, email, password) VALUES 
                (:username, :email, :password)");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $result = $stmt->execute(); //([$username, $email, $password]);

                $_SESSION['username'] = $username;
                $_SESSION['successs'] = 'You are now registered';
                header("Location: ./index.php");

            }catch (PDOException $e) {
                echo $e->getMessage();
            }
        }    

        public function loginUser($username, $password) {
            try {
                //$password1 = $_POST['password_1'];
                //$password = password_hash($password_1, PASSWORD_DEFAULT);
                $stmt = $this->con->prepare("SELECT password FROM market.user WHERE username = :username");
                $stmt->bindParam(':username', $username);
                //$stmt->bindParam(':password', $password);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $data = $row['password'];
                $pwdCheck = password_verify($password, $data);
                if($pwdCheck == true) {
                    $_SESSION['username'] = $username;
                    $_SESSION['success'] = 'Login Successfully';
                    header("Location: ./index.php");    
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }   
        }
    }
    
    







