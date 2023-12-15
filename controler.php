<?php
session_start();
require 'conn.php';
require 'model.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])) {
    extract($_POST);
    $register = new Authentification($conn);

    if ($password == $cpassword) {
        if ($register->login($email, $password)) {
            
            $_SESSION['error'] = "Email already exists.";
            header('Location: register.php');
        } else {
            $register->register($username, $email, $password);
            header('Location: login.php');
        }
    } else {
        $_SESSION['error'] = "The passwords you entered don't match.";
        header('Location: register.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {
    extract($_POST);
    $login = new Authentification($conn);
    $signIn = $login->login($email, $password);
    // print_r($login->row['password']);
    // die();
    if ($signIn && password_verify($password, $login->row['password'])) {
        
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

if(isset($_GET['name'])){
    header('Content-Type: application/json');
    $job = new Search_job($conn);
    $name = $_GET['name'];
    $location = $_GET['location'];
    $company = $_GET['company'];
    $jobs = $job->search_job($name , $location , $company);
    if($jobs){
        echo json_encode($jobs);
        
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_job'])) {
    extract($_POST);
    if ($_FILES["file"]["error"] === 4) {
        echo "<script>alert('Image Does Not Exist')</script>";
    }else{
        $fileName = $_FILES["file"]["name"];
        $fileSize = $_FILES["file"]["size"];
        $tmpName = $_FILES["file"]["tmp_name"];
        $validImageExtension = ['jpeg', 'jpg', 'png', 'gif'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        // echo $fileSize;
        // die();
        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script>alert('Invalid Image Extension')</script>";
        }elseif ($fileSize > 100000000){
            echo "<script>alert('Image Size Is Too Large')</script>";
        }else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tmpName, 'imageUpload/' . $newImageName);
            $add_job = new Job_crud($conn);
            $add_job->create($title, $description, $company, $location, $status, $creation_date, $newImageName, $_SESSION['id']);
            echo "<script>alert('successfully added');</script>";
        }
    }
}
?>