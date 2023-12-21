<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		JobEase
	</title>

	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
	<header>


		<nav class="navbar navbar-expand-md navbar-dark">
			<div class="container">
				<!-- Brand/logo -->
				<a class="navbar-brand" href="#">
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
							<a class="nav-link" href="#">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Features</a>
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
							<a class="nav-link" href="login">Login</a>';
							<?php }?>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>




	<section action="#" method="get" class="search">
		<h2>Find Your Dream Job</h2>
		<form class="form-inline" id = "search_form" oninput = "search(event)">
			<div class="form-group mb-2">
				<input type="text" name="keywords" placeholder="Keywords">
			</div>
			<div class="form-group mx-sm-3 mb-2">
				<input type="text" name="location" placeholder="Location">
			</div>
			<div class="form-group mx-sm-3 mb-2">
				<input type="text" name="company" placeholder="Company">
			</div>
			<button type="submit" class="btn btn-primary mb-2">Search</button>
		</form>
	</section>

	<!--------------------------  card  --------------------->
	<section class="light">
		<h2 class="text-center py-3">Latest Job Listings</h2>
		<div class="container py-2" id = "all_jobs">
		</div>
	</section>
	<footer>
		<p>© 2023 JobEase </p>
	</footer>
<script>
	function search(e) {
    document.querySelector("#all_jobs").innerHTML = "";
    const inputs = e.currentTarget.querySelectorAll("input");
    // console.log(inputs);
    let keyword = inputs[0].value;
    let location = inputs[1].value;
    let company = inputs[2].value;
    const request = new XMLHttpRequest();
    request.open('GET', `controler.php?name=${keyword}&location=${location}&company=${company}`);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState === 4 && request.status === 200) {
            const respons = JSON.parse(request.responseText);
            if (!respons) return;
            for (let i = 0; i < respons.length; i++) {

                document.querySelector("#all_jobs").insertAdjacentHTML('beforeend', `
            
            <article class="postcard light green">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="imageUpload/${respons[i]["image_path"]}" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h3 class="postcard__title green"><a href="#">${respons[i]["title"]}</a></h3>
                    <div class="postcard__subtitle small">
                        <time datetime="2020-05-25 12:00:00">
                            <i class="fas fa-calendar-alt mr-2"></i>${respons[i]["date_created"]}
                        </time>
                    </div>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">${respons[i]["description"]}</div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>${respons[i]["location"]}</li>
                        <li class="tag__item"><i class="fas fa-clock mr-2"></i>${respons[i]["company"]}</li>
                        <li class="tag__item play green">
						<?php if(!isset($_SESSION['id'])){?>
                            <a href="login"><i class="fas fa-play mr-2">Apply</i></a>
						<?php }else{
							//  $job= new Job_appliers($conn);
							// echo $job->read(3);
							?>
                            <a href="apply?apply&idjob=${respons[i]["job_id"]}"><i class="fas fa-play mr-2">Apply</i></a>
						<?php }?>
                        </li>
                    </ul>
                </div>
            </article>
            `)
            }

        }
    }


}
search({
    currentTarget: document.getElementById("search_form")
});
</script>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>