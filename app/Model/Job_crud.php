<?php
namespace App\Model;
use App\Model\Conn;
class Job_crud{
    private $connection;
    public function __construct(){
        $this->connection = Database::getInstance()->getConnection();
    }
    
    public function create($title, $description, $company, $location, $status, $date_created, $image_path, $user_id) {
        $query = "INSERT INTO `jobs`(`title`, `description`, `company`, `location`, `status`, `date_created`, `image_path`, `user_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("sssssssi", $title, $description, $company, $location, $status, $date_created, $image_path, $user_id);
        $addjob = $stmt->execute();
        $stmt->close();
    }

    public function readAll() {
        $query = "SELECT * FROM `jobs`";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $jobs = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $jobs;
    }

    public function update($job_id, $title, $description, $company, $location, $status, $date_created, $image_path, $user_id) {
        $query = "UPDATE `jobs` SET `title`=?, `description`=?, `company`=?, `location`=?, `status`=?, `date_created`=?, `image_path`=?, `user_id`=? WHERE `job_id`=?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("sssssssis", $title, $description, $company, $location, $status, $date_created, $image_path, $user_id, $job_id);
        $updateJob = $stmt->execute();
        $stmt->close();
    }

    public function delete($job_id) {
        $query = "DELETE FROM `jobs` WHERE `job_id`=?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $job_id);
        $deleteJob = $stmt->execute();
        $stmt->close();
    }
    
}