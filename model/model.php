<?php
require './conn.php';
//Authentification system
class Authentification {

    private $username;
    private $email;
    private $password;
    private $cpassword;
    public $error = "";

    public function register($username, $email, $password, $cpassword){
        $exist = mysqli_query(Conn::connection(),"SELECT * FROM `users` WHERE `email` = '$email'");
        if (mysqli_num_rows($exist)>0) {
            $this->error = "try to enter an other email";
            echo $error;
            header('location:register.php');
        }elseif ($password==$cpassword) {
            $pass = password_hash($this->password, PASSWORD_BCRYPT);
            $insert = "INSERT INTO users(username,email,password,role_name) VALUES ('$username','$email','$pass','candidat')";
            mysqli_query(Conn::connection(),$insert);
            header('location:login.php');
        }else {
            $this->error = "the passwords you entred is doesn't the same";
            header('location:register.php');
        }
    }

    public function login($email, $password){
        $exist = mysqli_query(Conn::connection(),"SELECT * FROM `users` WHERE email = '$email'");
        if (mysqli_num_rows($exist) > 0) {
            $row = mysqli_fetch_array($exist);
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role_name'];
                // print_r($row['role_name']);
                // die();
                if ($row['role_name'] == 'admin') {
                    header('location:/jobease-php-oop/dashboard/dashboard.php');
                } else {
                    header('location:index.php');
                }
            } else {
                $this->error = "Your password is incorrect";
                header('location:login.php');
            }
            
        }else {
            $this->error = "this account doesn't exist";
            header('location:login.php');
        }
    }
}