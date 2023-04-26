<?php
	require 'includes/common.php';
    ?>
<!doctype html>
<html>
    <head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Profile</title>
        <meta name="description" content="">
        <meta name="author" content="Chinmay Joshi">
        <link rel="stylesheet" href="css/profile.css">
    </head>
    <body>
        <header>
        <nav id="nav-bar" class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div><a class="navbar-brand" href="index.php">Dynamites</a></div>
				</div>
			</div>
		</nav>
        </header>

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-7 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
              <h5><?php echo "".$_SESSION['fname'].""; ?></h5>
              <a href="edit_student_profile.php"><i class="fa fa-edit mb-5"></i></a>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6><?php echo "".$_SESSION['fname']." ".$_SESSION['lname'].""; ?></h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted"><?php echo "".$_SESSION['email'].""; ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Phone</h6>
                    <p class="text-muted"><?php echo "".$_SESSION['mobno'].""; ?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Address</h6>
                    <p class="text-muted"><?php echo "".$_SESSION['address'].""; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    </body></html>