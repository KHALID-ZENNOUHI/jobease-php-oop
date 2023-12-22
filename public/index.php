<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\HomeController;
use App\Controller\AuthentificationController;
use App\Controller\AppliersController;
use App\Controller\CrudJobController;
use App\Controller\JobSearchController;


$route = isset($_GET['route']) ? $_GET['route'] : 'home';

// Instantiate the controller based on the route
switch ($route) {
    case 'home':
        $controller = new HomeController();
        $controller->showHomePage();
        break;
    case 'apply':
        $controller = new AppliersController();
        $controller->handleJobApplication();
        break;
    case 'login':
        $controller = new AuthentificationController();
        $controller->handleLogin();
        break;
    case 'register':
            $logincontroller = new AuthentificationController();
            $logincontroller->handleRegistration();
            break;
    case 'job':
        $logincontroller = new CrudJobController();
        $logincontroller->handleJobForm();
        break;
        case 'jobdelete':
            $logincontroller = new CrudJobController();
            $logincontroller->handleJobDeletion();
            break;
    // Add more cases for other routes as needed
    default:
        // Handle 404 or redirect to the default route
        header('HTTP/1.0 404 Not Found');
        exit('Page not found');
}

// Execute the controller action

?>  