<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\HomeController;
use App\Controller\AuthentificationController;
use App\Controller\AppliersController;
use App\Controller\CrudJobController;
use App\Controller\JobSearchController;


$url = parse_url($_SERVER['REQUEST_URI'])['path'];

$route = [
    '/' => 'Controller/HomeController.php',
    '/home' => 'Controller/HomeController.php',
    '/login' => 'Controller/AuthentificationController.php',
    '/register' => 'Controller/AuthentificationController.php',
    '/logout' => 'Controllers/AuthentificationController.php',
    '/job' => 'Controller/CrudJobController.php',
    '/apply' => 'Controller/AppliersController.php',
    '/jobdelete' => 'Controller/CrudJobController.php',
    '/jobsearch' => 'Controller/JobSearchController.php',
    '/offre' => 'Controller/HomeController.php',
    '/dashboard' => 'Controller/HomeController.php',
    '/contact' => 'Controller/HomeController.php',
    '/candidat' => 'Controller/AppliersController.php',
    '/updateCandidat' => 'Controller/AppliersController.php',
    '/notification' => 'Controller/AppliersController.php'
];
if(array_key_exists($url,$route)){
    // require_once __DIR__ . '/../app/' . $route[$url];
switch ($url) {
    case '/':
        $controller = new HomeController();
        $controller->showHomePage();
        break;
    case '/home':
        $controller = new HomeController();
        $controller->showHomePage();
        break;
    case '/dashboard':
        $controller = new HomeController();
        $controller->displayDashboard();
        break;
    case '/offre':
        $controller = new CrudJobController();
        $controller->displayOffre();
        break;
    case '/contact':
        $controller = new HomeController();
        $controller->displaycontact();
        break;
    case '/candidat':
        $controller = new AppliersController();
        $controller->readAplliers();
        break;
    case '/updateCandidat':
        $controller = new AppliersController();
        $controller->updateCandidat();
        break;
    case '/apply':
        $controller = new AppliersController();
        $controller->handleJobApplication();
        break;
    case '/login':
        $controller = new AuthentificationController();
        $controller->handleLogin();
        break;
    case '/register':
            $logincontroller = new AuthentificationController();
            $logincontroller->handleRegistration();
            break;
    case '/logout':
        $logincontroller = new AuthentificationController();
        $logincontroller->handleLogout();
        break;
    case '/job':
        $logincontroller = new CrudJobController();
        $logincontroller->handleJobForm();
        break;
    case '/jobdelete':
        $logincontroller = new CrudJobController();
        $logincontroller->handleJobDeletion();
        break;
    case '/jobsearch':
        $logincontroller = new JobSearchController();
        $logincontroller->search();
        break;
    case '/notification':
        $Notification = new AppliersController();
        $Notification->statusAppliers();
        break;
    // Add more cases for other routes as needed
    default:
        // Handle 404 or redirect to the default route
        header('HTTP/1.0 404 Not Found');
        exit('Page not found');
}
}
// Execute the controller action

?>  