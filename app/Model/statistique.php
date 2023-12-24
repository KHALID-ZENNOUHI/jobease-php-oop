<?php
namespace App\Model;
use App\Model\Database;
class Statistique{
    private $connection;
    public function __construct(){
        $this->connection = Database::getInstance()->getConnection();
    }

    public function numJob(){
        $query = "SELECT COUNT(*) FROM `jobs`";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $Numjobs = $result->fetch_assoc();
        $stmt->close();
        return $Numjobs;
    }

    public function jobApproved(){
        $query = "SELECT COUNT(*) FROM `job_appliers` WHERE `applier_status` = 'approved'";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $jobapproved = $result->fetch_assoc();
        $stmt->close();
        return $jobapproved;
    }

    public function jobDisapproved(){
        $query = "SELECT COUNT(*) FROM `job_appliers` WHERE `applier_status` = 'disapproved'";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $jobdisapproved = $result->fetch_assoc();
        $stmt->close();
        return $jobdisapproved;
    }

    public function numUsers(){
        $query = "SELECT COUNT(*) FROM `users`";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $numusers = $result->fetch_assoc();
        $stmt->close();
        return $numusers;
    }
}