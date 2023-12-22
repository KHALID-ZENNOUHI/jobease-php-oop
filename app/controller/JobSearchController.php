<?php
namespace App\controller;
use App\Model\Seach_job;

class JobSearchController {

    public function search() {
        if(isset($_GET['name'])){
            header('Content-Type: application/json');
            $job = new Search_job();
            $name = $_GET['name'];
            $location = $_GET['location'];
            $company = $_GET['company'];
            $jobs = $job->search_job($name, $location, $company);
            if($jobs){
                echo json_encode($jobs);
            }
        }
    }
}

