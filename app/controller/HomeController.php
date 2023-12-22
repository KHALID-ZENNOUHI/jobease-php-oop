<?php
namespace App\Controller;

class HomeController {

    public function displayDashboard() {
        require __DIR__ .'../../views/Adminview/dashboard.php';
    }

    public function displayUserHome() {
        require __DIR__ .'../../../views/Usersview/home.php';
    }

    public function showHomePage() {
        if (isset($_SESSION['id'])) {
            if ($_SESSION['id'] == "admin") {
                $this->displayDashboard();
            } else {
                $this->displayUserHome();
            }
        }else $this->displayUserHome();
    }
}
