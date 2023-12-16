<?php 
require '../controler.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="side">
            <div class="h-100">
                <div class="sidebar_logo d-flex align-items-end">
                   
                    <a href="#" class="nav-link text-white-50">Dashboard</a>
                  
                </div>

                <ul class="sidebar_nav">
                    <li class="sidebar_item active" style="width: 100%;">
                        <a href="dashboard.php" class="sidebar_link"> <img src="img/1. overview.svg" alt="icon">Overview</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="candidat.php" class="sidebar_link"> <img src="img/agents.svg" alt="icon">Candidat</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="offre.php" class="sidebar_link"> <img src="img/task.svg" alt="icon">Offre</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="contact.php" class="sidebar_link"><img src="img/agent.svg" alt="icon">Contact</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="#" class="sidebar_link"><img src="img/articles.svg" alt="icon">Articles</a>
                    </li>

                </ul>
                <div class="line"></div>
                <a href="#" class="sidebar_link"><img src="img/settings.svg" alt="">Settings</a>


            </div>
        </aside>
        <div class="main">
            <nav class="navbar justify-content-space-between pe-4 ps-2">
                <button class="btn open">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar  gap-4">
                    <div class="">
                        <input type="search" class="search " placeholder="Search">
                        <img class="search_icon" src="img/search.svg" alt="iconicon">
                    </div>
                    <!-- <img src="img/search.svg" alt="icon"> -->
                    <img class="notification" src="img/new.svg" alt="icon">
                    <div class="card new w-auto">
                        <div class="list-group list-group-light">
                            <div class="list-group-item px-3 d-flex justify-content-between align-items-center ">
                                <p class="mt-auto">Notification</p><a href="#"><img src="img/settingsno.svg" alt="icon"></a>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1  day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1  day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 text-center"><a href="#">View all notifications</a></div>
                        </div>
                    </div>
                    <div class="inline"></div>
                    <div class="name"> Admin</div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown">
                                <img src="img/photo_admin.svg" alt="icon">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end position-absolute">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Account Setting</a>
                                <a class="dropdown-item" href="/PeoplePerTask/project/pages/index.html">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <section class="px-4 main">
                    <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Add a new job</button>
                <table class="agent table align-middle bg-white" style="min-width: 700px;">
                    <thead class="bg-light">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Company</th>
                            <th>Location</th>
                            <th>Creation Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($jobs as $job) {
                        ?>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name"><?php echo $job['title']; ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title"><?php echo $job['description']; ?></p>
                            </td>
                            <td>
                                <a href="#" class="f_status"><?php echo $job['company']; ?></a>
                            </td>
                            <td class="f_position"><?php echo $job['location']; ?></td>
                            <td class=""><?php echo $job['date_created']; ?></td>
                            <td class=""><?php echo $job['status']; ?></td>
                            <td class="">
                                    <a href="#editjobmodal<?php echo $job['job_id']?>" data-bs-toggle="modal"><img class="accept_task w-50" src="img/journal-check.svg" alt="icon"></a>
                                    <a href="../controler.php?jobid=<?= $job['job_id']?>"><img class="delet_user w-50" src="img/journal-x.svg" alt="icon"></a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </section>
            
        </div>
    </div>



<!-- Modal add job -->
<div class="modal fade modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New Job</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method  = "POST" enctype = "multipart/form-data" action = "../controler.php" autocomplet = "off">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Job Title:</label>
            <input type="text" name = "title" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Job Description:</label>
            <textarea class="form-control" name = "description" id="message-text"></textarea>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Company:</label>
            <input type="text" name = "company" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Job location:</label>
            <input type="text" name = "location" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Job status:</label>
            <select name = "status" id="" class="form-control">
                <option value="open">open</option>
                <option value="closed">closed</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Creation Date</label>
            <input type="date" name = "creation_date" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Upload Image:</label>
            <input type="file" name = "file" accept = ".jpg, .png, jpeg, .gif" class="form-control" id="recipient-name">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="Submit" name = "add_job" class="btn btn-primary">Add Job</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<!-- Modal edit job -->
<?php
// $jobdisplay = new Job_crud($conn);
// $jobs = $jobdisplay->readAll();
    foreach ($jobs as $job) {
?>
<div class="modal fade modal-xl" id="editjobmodal<?=$job['job_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Job</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method  = "POST" enctype = "multipart/form-data" action = "../controler.php" autocomplet = "off">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Job Title:</label>
                    <input type="text" name = "title" class="form-control" id="recipient-name" value = "<?php echo $job['title']; ?>">
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Job Description:</label>
                    <textarea class="form-control" name = "description" id="message-text" value = ""><?php echo $job['description']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Company:</label>
                    <input type="text" name = "company" class="form-control" id="recipient-name" value = "<?php echo $job['company']; ?>">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Job location:</label>
                    <input type="text" name = "location" class="form-control" id="recipient-name" value = "<?php echo $job['location']; ?>">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Job status:</label>
                    <select name="status"id="" class="form-control">
                        <option value="open" <?php if ($job['status'] == "open") echo "selected"; ?>>open</option>
                        <option value="closed" <?php if ($job['status'] == "Closed") echo "selected"; ?>>closed</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Creation Date</label>
                    <input type="date" name = "creation_date" class="form-control" id="recipient-name" value = "<?php echo $job['date_created']; ?>">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Upload Image:</label>
                    <input type="file" name = "file" accept = ".jpg, .png, jpeg, .gif" class="form-control" id="recipient-name" value = "<?php echo $job['image_path']; ?>">
                </div>
                <div class="modal-footer">
                    <input type="hidden" value = "<?php echo $job['job_id']; ?>" name = "jobid">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="Submit" name = "edit_job" class="btn btn-primary">Edit Job</button>
                </div>
                </form>
            </div>
                        
        </div>
    </div>
</div>
<?php
    }
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
</body>

</html>