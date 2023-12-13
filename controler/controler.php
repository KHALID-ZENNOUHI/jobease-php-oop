<?php
require './model/model.php';

extract($_POST);

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])) {

    $register = new Authentification();
    $register->register($username, $email, $password, $cpassword);
    // echo '<pre>'; print_r($rigister); echo'</pre>';
    
}elseif($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])){

    $login = new Authentification();
    $login->login($email, $password);
    $login->error;
    // echo '<pre>'; print_r($login); echo'</pre>';
}