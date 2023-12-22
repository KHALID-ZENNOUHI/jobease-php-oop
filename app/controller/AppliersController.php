<?php
namespace App\controller;
use App\Model\Job_appliers;
class AppliersController {


    public function handleJobApplication() {
        if (isset($_GET['idjob'])) {
            $jobid = $_GET['idjob'];
            $applierStatus;
            $appliers = new Job_appliers();
            $appliers->create($_SESSION['id'], $jobid, $applierStatus);
            header('location: /home');
        }
    }
}

