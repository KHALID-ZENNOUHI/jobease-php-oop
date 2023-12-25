<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobEase - Notifications</title>

    <!-- Add your stylesheets and scripts here if needed -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-rGAaBZdBlQGHi1gyFjA4ZvSXJ9M2S9RbctbBQbHzwb4PZ4Zl/3zn1OT+5lZpOfta" crossorigin="anonymous">

    <!-- Your custom stylesheet -->
    <link rel="stylesheet" href="/Assets/styles/style.css">
</head>

<body>
    <header>
		<nav class="navbar navbar-expand-md navbar-dark">
			<div class="container">
				<!-- Brand/logo -->
				<a class="navbar-brand" href="home">
					<i class="fas fa-code"></i>
					<h1>JobEase &nbsp &nbsp</h1>
				</a>

				<!-- Toggler/collapsibe Button -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- Navbar links -->
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="home">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="notification">Notifications</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								language
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">FR</a>
								<a class="dropdown-item" href="#">EN</a>
							</div>
						</li>
						<span class="nav-item active">
							<a class="nav-link" href="#">EN</a>
						</span>
						
						<li class="nav-item">
							<?php if (isset($_SESSION['username'])) {?>
								 <p class="nav-link"><?= $_SESSION['username']?></p>
								 <ul class="navbar-nav">
                        			<li class="nav-item dropdown">
                        			    <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown" aria-expanded="false">
                        			        <img src="dashboard/img/photo_admin.svg" alt="icon" >
                        			    </a>
                        			    <div class="dropdown-menu dropdown-menu-end position-absolute" id = "f">
                        			        <a class="dropdown-item" href="#">Profile</a>
                        			        <a class="dropdown-item" href="#">Account Setting</a>
                        			        <a class="dropdown-item" href="index.php?logout">Log out</a>
                        			    </div>
                        			</li>
                    			</ul>
							<?php }else{?>
							<a class="nav-link" href="login">Login</a>
							<?php }?>
						</li>
						<li class="nav-item">
							<a  href="logout" class="nav-link">Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
    </header>

	<section class="notifications bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">Notifications</h2>
        
        <!-- Add your notification content here -->
        <?php foreach($Notifications as $Notification): ?>
            <div class="notification card mb-3">
                <div class="card-body">
                    <p class="card-text"><?= $Notification ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Repeat the above structure for each notification -->
        
    </div>
</section>


    <footer class = "fixed-bottom">
        <p>© 2023 JobEase </p>
    </footer>

    <!-- Bootstrap JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Add your custom scripts here if needed -->
</body>

</html>
