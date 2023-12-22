<?php

namespace App\controller;
use App\Model\Authentification;
class AuthentificationController {

    public function handleRegistration() {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])) {
            extract($_POST);
            $authentication = new Authentification();

            if ($password == $cpassword) {
                if ($authentication->login($email, $password)) {
                    $_SESSION['error'] = "Email already exists.";
                    header('Location: /register');
                } else {
                    $authentication->register($username, $email, $password);
                    header('Location: /login');
                }
            } else {
                $_SESSION['error'] = "The passwords you entered don't match.";
                header('Location: /../../../views/Usersview/register.php');
            }
        }else
            require __DIR__ .'../../../views/Usersview/register.php';
    }
    
    public function handleLogin() {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {
            extract($_POST);
            $auth1entication = new Authentification();
            $signIn = $auth1entication->login($email, $password);
            if ($signIn && password_verify($password, $signIn['password'])) {
                $_SESSION['username'] = $signIn['username'];
                $_SESSION['id'] = $signIn['id'];
                $_SESSION['role'] = $signIn['role_name'];
                // print_r($_SESSION['role']);
                // die();
                if ($signIn['role_name'] == 'admin') {
                    header('Location: /home');
                } elseif ($signIn['role_name'] == 'candidat') {
                    header('Location: /home');
                }
            } else {
                $_SESSION['error'] = "Your password is incorrect.";
                header('Location: /login');
            }
        }else
        require __DIR__ .'../../../views/Usersview/login.php'; 
    }

    public function handleLogout() {
            session_destroy();
            header('Location: /home');
    }
}


