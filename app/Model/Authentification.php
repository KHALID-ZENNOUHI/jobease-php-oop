<?php
namespace App\Model;
use App\Model\Conn;
class Authentification {

private $username;
private $email;
private $password;
private $cpassword;
private $connection;

public function __construct(){
    $this->connection = Database::getInstance()->getConnection();
}

public function register($username, $email, $password){
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $query = "INSERT INTO users(username,email,password,role_name) VALUES ('$username','$email','$pass','candidat')";
    $addaccount = $this->connection->query($query);
    return $addaccount;
}

public function login($email, $password){
    $query = "SELECT * FROM `users` WHERE email = '$email'";
    $exist = $this->connection->query($query);
    $row = mysqli_fetch_array($exist);
    $this->row = $row;
    return $row;
}
}






