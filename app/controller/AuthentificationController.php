<?php
namespace App\controller;
use App\Model\Authentification;
class AuthentificationController {

    public function handleRegistration() {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])) {
            extract($_POST);
            $authentication = new Authentication();

            if ($password == $cpassword) {
                if ($authentication->login($email, $password)) {
                    $_SESSION['error'] = "Email already exists.";
                    header('Location: /../../../views/Usersview/register.php');
                } else {
                    $authentication->register($username, $email, $password);
                    header('Location: /../../../views/Usersview/login.php');
                }
            } else {
                $_SESSION['error'] = "The passwords you entered don't match.";
                header('Location: /../../../views/Usersview/register.php');
            }
        }elseif(isset($_GET['register'])){
            header('Location: /../../../views/Usersview/register.php');
        }
    }

    public function handleLogin() {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {
            extract($_POST);
            $authentication = new Authentication();
            $signIn = $authentication->login($email, $password);

            if ($signIn && password_verify($password, $authentication->row['password'])) {
                $_SESSION['username'] = $authentication->row['username'];
                $_SESSION['id'] = $authentication->row['id'];
                $_SESSION['role'] = $authentication->row['role_name'];

                if ($authentication->row['role_name'] == 'admin') {
                    header('Location: /../../../views/Adminview/dashboard.php');
                } elseif ($authentication->row['role_name'] == 'candidat') {
                    header('Location: /../../../views/Usersview/home.php');
                }
            } else {
                $_SESSION['error'] = "Your password is incorrect.";
                header('Location: /../../../views/Usersview/login.php');
            }
        }elseif(isset($_GET['login'])){
            header('Location: /../../../views/Usersview/login.php');
        }
    }

    public function handleLogout() {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout'])) {
            session_destroy();
            header('Location: /../../../views/Usersview/home.php');
        }
    }
}


