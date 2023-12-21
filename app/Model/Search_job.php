<?php
namespace App\Model;

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