<?php
namespace App\controller;
use App\Model\Job_appliers;
class AppliersController {

    private $connection;

    public function __construct($conn) {
        $this->connection = $conn;
    }

    public function handleJobApplication() {
        if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['idjob']) && isset($_GET['action']) && $_GET['action'] == "apply") {
            $jobid = $_GET['idjob'];
            $applierStatus;
            $appliers = new JobAppliers($conn);
            $appliers->create($_SESSION['id'], $jobid, $applierStatus);
            header('location: index.php');
        }
    }
}

$appliersController = new AppliersController($conn);
$appliersController->handleJobApplication();
