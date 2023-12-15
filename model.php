<?php
class Authentification {

private $username;
private $email;
private $password;
private $cpassword;
private $connection;

public function __construct($conn){
    $this->connection = $conn;
}

public function register($username, $email, $password){
    $pass = password_hash($password, PASSWORD_BCRYPT);
    $query = "INSERT INTO users(username,email,password,role_name) VALUES ('$username','$email','$pass','candidat')";
    $addaccount = $this->connection->query($query);
    return $addaccount;
}

public function login($email, $password){
    // $pass = password_hash($password, PASSWORD_BCRYPT);
    $query = "SELECT * FROM `users` WHERE email = '$email'";
    $exist = $this->connection->query($query);
    $row = mysqli_fetch_array($exist);
    $this->row = $row;
    return $row;
}
}

class Search_job{
    private $connection;
    public function __construct($conn){
        $this->connection = $conn;
    }
    function search_job($name , $location , $company){
        $query = "SELECT * FROM jobs WHERE title LIKE '%$name%' 
        AND `location` LIKE '%$location%' 
        AND company LIKE '%$company%'";
        $result = $this->connection->query($query);
        $job = [];
        while ($row = $result->fetch_array()) {
            $job[] = $row;
        }
        return $job;
    }   
 }

 class Job_crud{
    private $connection;
    public function __construct($conn){
        $this->connection = $conn;
    }
    // public function create($title, $description, $company, $location, $status, $date_created, $image_path, $user_id){
    //     $query = "INSERT INTO `jobs`(`title`, `description`, `company`, `location`, `status`, `date_created`, `image_path`, `user_id`) VALUES ('$title','$description','$company','$location','status','$date_created','$image_path','$user_id')";
    //     $addjob = $this->connection->query($query);
    //     return $addjob;
    // }
    public function create($title, $description, $company, $location, $status, $date_created, $image_path, $user_id) {
        $query = "INSERT INTO `jobs`(`title`, `description`, `company`, `location`, `status`, `date_created`, `image_path`, `user_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("sssssssi", $title, $description, $company, $location, $status, $date_created, $image_path, $user_id);
        $addjob = $stmt->execute();
        $stmt->close();
        return $addjob;
    }
    
 }
