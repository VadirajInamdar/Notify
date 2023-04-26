<?php
    if(isset($_SESSION["email"]))
	{
   	 header("location: index.php");
	}
	require 'includes/common.php';
	if(isset($_POST['submit'])&&!empty($_POST['submit']))
	{
		$name = pg_escape_string($_POST['name']);
		$mail = pg_escape_string($_POST['email']);
		$pwd = md5($_POST['pwd']);
		$contact = pg_escape_string($_POST['mobno']);
		$city = pg_escape_string($_POST['city']);
		$address = pg_escape_string($_POST['address']);
		$sql = "insert into public.institute_data(name,email,password,mobno,city,address)values('$name','$mail','$pwd','$city','$address')";
		$sql2 ="select institute_id from public.institute_data where email = '$mail' and password='$pwd'";
		$rs = pg_query($dbconn, $sql2) or die("Cannot execute query: $sql2\n");
        $db_check = pg_num_rows($rs);
        if($db_check > 0)
		{
			die("Institute already registered");
		}
		else
		{
	  $ret = pg_query($dbconn, $sql);
	  if($ret)
	  {	 
		$_SESSION['name'] = $row['name'];
		$_SESSION['mobno'] = $row['mobno'];
		$_SESSION['city'] = $row['city'];
		$_SESSION['address'] = $row['address'];
		$_SESSION['login_type']="institute";
		echo "Data saved Successfully";
		header("location: dash.php");

	  }
	  else
	  {
		echo "Soething Went Wrong";
		header("location: fail.php");
	  }
	}
	}
?>
<!doctype html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Sign Up|Institute</title>
    <meta name="description" content="">
    <meta name="author" content="Chinmay Joshi">
    <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <header>
        <nav id="nav-bar" class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div><a class="navbar-brand" href="index.php"><i class="fa-solid fa-bomb"></i> Dynamites</a></div>
				</div>
			</div>
		</nav>
        </header>
        <div class="container panel-margin panel-body-form in-panel-margin">
			<div id="panel-s">
				<div class="panel-heading">
					<h2 class="panel-title">INSTITUTE SIGN UP</h2>
				</div>
				<div>
					<form method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="name" placeholder="Name Of Institution" id="name" required>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
						</div>
						<div class="form-group">
					      <input type="number" class="form-control" maxlength="10" id="mobileno" placeholder="Contact Number" name="mobno" required>
    					</div>
						<div class="form-group">
							<input type="text" class="form-control" name="city" id="city" placeholder="City" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="address" placeholder="Address" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="pwd" placeholder="Password" id="pwd" required>
						</div>
						<button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
					</form>
				</div>
                </div>
                </div>
                <?php 
                require "includes/footer.php";
            ?> 
    </body>
</html>