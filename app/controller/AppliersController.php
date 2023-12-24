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

    public function readAplliers(){
        $jobAppliers = new Job_appliers();
        $Appliers = $jobAppliers->read();
        require __DIR__ .'../../../views/Adminview/candidat.php';
    }

    public function updateCandidat(){
        if (isset($_GET['id']) && isset($_GET['Approve'])) {
            $id = $_GET['id'];
            $updateStatus = new Job_appliers();
            $updateStatus->updateStatus("approved", $id);
            header('location: /candidat');
        }elseif(isset($_GET['id']) && isset($_GET['Desapprove'])){
            $id = $_GET['id'];
            $updateStatus = new Job_appliers();
            $updateStatus->updateStatus("disapproved", $id);
            header('location: /candidat');
        }
    }
    
    public function statusAppliers(){
            if(isset($_SESSION['id'])){
                $status = new Job_appliers();
                $notifications = $status->displayStaus($_SESSION['id']);
                foreach($notifications as $notification){
                    if ($notification['applier_status'] == "approved") {
                        $Notifications[] = "Your aplly for the job " . $notification['title'] . " is " . $notification['applier_status'];
                    }elseif ($notification['applier_status'] == "disapproved") {
                        $Notifications[] = "Your aplly for the job " . $notification['title'] . " is " . $notification['applier_status'];
                    }else {
                        $Notifications[] = "Your aplly for the job " . $notification['title'] . " is in review";
                    }
                }
                require __DIR__ .'../../../views/Usersview/notifications.php';
        }else header('location: /home');
    
    }
}
