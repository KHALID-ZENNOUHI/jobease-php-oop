<?php
namespace App\Model;
use App\Model\Database;
class Search_job{
    private $connection;
    public function __construct(){
        $this->connection = Database::getInstance()->getConnection();
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