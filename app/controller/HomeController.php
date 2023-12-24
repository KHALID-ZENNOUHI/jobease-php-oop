<?php
namespace App\Controller;

class HomeController {

    public function displayDashboard() {
        require __DIR__ .'../../../views/Adminview/dashboard.php';
    }

    public function displayUserHome() {
        require __DIR__ .'../../../views/Usersview/home.php';
    }
    public function displaycontact() {
        require __DIR__ .'../../../views/Adminview/contact.php';
    }
    public function displaycandidat() {
        require __DIR__ .'../../../views/Adminview/candidat.php';
    }
    

    public function showHomePage() {
        
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == "admin") {
                $this->displayDashboard();
            } else {
                $this->displayUserHome();
            }
        }else $this->displayUserHome();
    }
}
