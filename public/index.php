<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$router = [
    '/' => 'App/controller/HomeController.php',
    '/home' => 'App/controller/HomeController.php',
    '/addjob' => 'App/controller/CrudJobController.php',
    '/editjob' => 'App/controller/CrudJobController.php',
    '/deletejob' => 'App/controller/CrudJobController.php',
    '/login' => 'App/controller/AuthentificationController.php',
    '/register' => 'App/controller/AuthentificationController.php',
    '/jobsearch' => 'App/controller/JobSearchController.php',
    '/apply' => 'App/controller/AppliersController.php'
];

if (array_key_exists($uri, $router)) {
    require $router[$uri];
}else{
    http_response_code(404);
    echo 'Soryy, Page Note Founde';
    die();
}
?>