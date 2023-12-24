<?php
namespace App\Controller;
use App\Model\statistique;

class HomeController {

    private $statistique;
    public function __construct()
    {
        $this->statistique = new Statistique();
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
                $numjob = $this->statistique->numJob();
                $jobapproved = $this->statistique->jobApproved();
                $jobdisaprouved = $this->statistique->jobDisapproved();
                $numusers = $this->statistique->numUsers();
                require __DIR__ .'../../../views/Adminview/dashboard.php';
            } else {
                $this->displayUserHome();
            }
        }else $this->displayUserHome();
    }
}
