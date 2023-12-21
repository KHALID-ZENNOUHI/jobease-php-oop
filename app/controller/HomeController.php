<?php
namespace App\controller;
use App\Model\Conn;
class HomeController {

    private $connection;

    public function __construct($conn) {
        $this->connection = $conn;
    }

    public function displayDashboard() {
        require '../../views/Adminview/dashboard.php';
    }

    public function displayUserHome() {
        require '../../views/Usersview/home.php';
    }

    public function showHomePage() {
        if (isset($_SESSION['id'])) {
            if ($_SESSION['id'] == "admin") {
                $this->displayDashboard();
            } else {
                $this->displayUserHome();
            }
        } else {
            $this->displayUserHome();
        }
    }
}
$homeController = new HomeController($conn);
$homeController->showHomePage();