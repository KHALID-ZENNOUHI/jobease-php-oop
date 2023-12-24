<?php
namespace App\Model;
use App\Model\Database;
class Job_appliers{

    private $connection;

    public function __construct(){
        $this->connection = Database::getInstance()->getConnection();
    }

    public function create($userid, $jobid, $status) {
        $query = "INSERT INTO `job_appliers`(`id`, `job_id`, `applier_status`) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $applier_status = "pending";
        $stmt->bind_param("iis", $userid, $jobid, $applier_status);
        $addjob = $stmt->execute();
        $stmt->close();
    }

    public function read() {
        $query = "SELECT * FROM `job_appliers` NATURAL JOIN jobs NATURAL JOIN users  WHERE `applier_status` IN ('pending');";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $Appliers = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $Appliers;
    }

    public function updateStatus($status, $id){
        $query = "UPDATE `job_appliers` SET `applier_status`=? WHERE `appliers_id`=?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("si", $status, $id);
        $addjob = $stmt->execute();
        $stmt->close();
    }

    public function displayStaus($id) {
        $query = "SELECT * FROM `job_appliers`join jobs on job_appliers.job_id=jobs.job_id join users on job_appliers.id=users.id WHERE job_appliers.id = ?;";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $ApplierStatus = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $ApplierStatus;
    }
}