<?php
session_start();
require 'conn.php';
require 'model.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])) {
    extract($_POST);
    $register = new Authentification($conn);

    if ($password == $cpassword) {
        if ($register->login($email, $password)) {
            $_SESSION['error'] = "Try entering another email.";
        } else {
            $register->register($username, $email, $password);
            header('Location: register.php');
        }
    } else {
        $_SESSION['error'] = "The passwords you entered don't match.";
        header('Location: register.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {
    extract($_POST);
    $login = new Authentification($conn);

    if ($login->login($email, $password) && password_verify($password, $login->row['password'])) {
        $_SESSION['username'] = $login->row['username'];
        $_SESSION['id'] = $login->row['id'];
        $_SESSION['role'] = $login->row['role_name'];

        if ($login->row['role_name'] == 'admin') {
            header('Location: /jobease-php-oop/dashboard/dashboard.php');
        } elseif ($login->row['role_name'] == 'candidat') {
            header('Location: index.php');
        }
    } else {
        $_SESSION['error'] = "Your password is incorrect.";
        header('Location: login.php');
    }
}

if (isset($_SESSION['error'])) {
    // Redirect to the appropriate page based on the error
    header('Location: login.php');
}

?>
