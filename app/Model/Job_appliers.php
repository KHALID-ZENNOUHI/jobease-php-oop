<?php
namespace App\Model;

class Job_appliers{
    private $connection;
    public function __construct($conn){
        $this->connection = $conn;
    }
    public function create($userid, $jobid, $status) {
        $query = "INSERT INTO `job_appliers`(`id`, `job_id`, `applier_status`) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $applier_status = "pending";
        $stmt->bind_param("iis", $userid, $jobid, $applier_status);
        $addjob = $stmt->execute();
        $stmt->close();
    }
    public function read($jobid) {
        $id = $_SESSION["id"];
        $query = "SELECT * FROM `job_appliers`join jobs on job_appliers.job_id=jobs.job_id join users on job_appliers.appliers_id=users.id WHERE job_appliers.appliers_id = $id AND job_appliers.job_id = $jobid;";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $jobs = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $jobs['status'];
    }
}