<?php
namespace App\controller;
use App\Model\Job_appliers;
class AppliersController {


    public function handleJobApplication() {
        if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['idjob']) && isset($_GET['action']) && $_GET['action'] == "apply") {
            $jobid = $_GET['idjob'];
            $applierStatus;
            $appliers = new JobAppliers();
            $appliers->create($_SESSION['id'], $jobid, $applierStatus);
            header('location: index.php');
        }
    }
}

