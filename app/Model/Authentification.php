<?php
namespace App\Model;

class Authentification {

private $username;
private $email;
private $password;
private $cpassword;
private $connection;

public function __construct($conn){
    $this->connection = $conn;
}

public function register($username, $email, $password){
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $query = "INSERT INTO users(username,email,password,role_name) VALUES ('$username','$email','$pass','candidat')";
    $addaccount = $this->connection->query($query);
    return $addaccount;
}

public function login($email, $password){
    // $pass = password_hash($password, PASSWORD_BCRYPT);
    $query = "SELECT * FROM `users` WHERE email = '$email'";
    $exist = $this->connection->query($query);
    $row = mysqli_fetch_array($exist);
    $this->row = $row;
    return $row;
}
}






