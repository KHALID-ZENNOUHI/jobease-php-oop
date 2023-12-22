<?php
namespace App\controller;
use App\Model\Job_crud;
class CrudJobController {

    public function handleJobForm() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            extract($_POST);

            if ($_FILES["file"]["error"] === 4) {
                echo "<script>alert('Image Does Not Exist')</script>";
            } else {
                $fileName = $_FILES["file"]["name"];
                $fileSize = $_FILES["file"]["size"];
                $tmpName = $_FILES["file"]["tmp_name"];
                $validImageExtension = ['jpeg', 'jpg', 'png', 'gif'];
                $imageExtension = explode('.', $fileName);
                $imageExtension = strtolower(end($imageExtension));

                if (!in_array($imageExtension, $validImageExtension)) {
                    echo "<script>alert('Invalid Image Extension')</script>";
                } elseif ($fileSize > 100000000) {
                    echo "<script>alert('Image Size Is Too Large')</script>";
                } else {
                    $newImageName = uniqid();
                    $newImageName .= '.' . $imageExtension;
                    move_uploaded_file($tmpName, 'imageUpload/' . $newImageName);

                    $crudJob = new JobCrud();

                    if (isset($_POST['add_job'])) {
                        echo "<script>alert('Successfully added');</script>";
                        $crudJob->create($title, $description, $company, $location, $status, $creation_date, $newImageName, $_SESSION['id']);
                        header('location: dashboard/offre.php');
                    } elseif (isset($_POST['edit_job'])) {
                        $crudJob->update($jobid, $title, $description, $company, $location, $status, $creation_date, $newImageName, $_SESSION['id']);
                        echo "<script>alert('Edit successfully');</script>";
                        header('location: dashboard/offre.php');
                    }
                }
            }
        }
    }

    public function handleJobDeletion() {
        if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['jobid'])) {
            $id = $_GET['jobid'];
            $crudJob = new JobCrud();
            $crudJob->delete($id);
            header('location: dashboard/offre.php');
        }
    }
}

// $crudJobController = new CrudJobController($conn);
// $crudJobController->handleJobForm();
// $crudJobController->handleJobDeletion();
