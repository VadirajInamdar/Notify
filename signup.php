<?php
if (isset($_SESSION["email"])) {
	header("location: home.php");
}
require 'includes/common.php';
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
	$fname = pg_escape_string($_POST['fname']);
	$lname = pg_escape_string($_POST['lname']);
	$mail = pg_escape_string($_POST['email']);
	$pwd = md5($_POST['pwd']);
	$contact = pg_escape_string($_POST['mobno']);
	$city = pg_escape_string($_POST['city']);
	$address = pg_escape_string($_POST['address']);
	$sql = "insert into public.user_data(first_name,last_name,email,password,mobno,city,address)values('$fname','$lname','$mail','$pwd','$contact','$city','$address') returning user_id";
	$sql2 = "select user_id from public.user_data where email = '$mail'";
	$rs = pg_query($dbconn, $sql2) or die("Cannot execute query: $sql2\n");
	$db_check = pg_num_rows($rs);
	if ($db_check > 0) {
		die("User already exists");
	} else {
		$ret = pg_query($dbconn, $sql) or die("Cannot execute query: $sql\n");
		$insert_row = pg_fetch_result($ret, 0, 'user_id');
		$id = $insert_row['user_id'];
		if ($ret) {
			session_start();
			$_SESSION['email'] = $mail;
			$_SESSION['id'] =  $id;
			$_SESSION['fname'] = $fname;
			$_SESSION['lname'] = $lname;
			$_SESSION['mobno'] = $contact;
			$_SESSION['city'] = $city;
			$_SESSION['address'] = $address;
			$_SESSION['login_type'] = "student";
			if (isset($_SESSION['email'])) {
				header("location: home.php");
			}
		} else {
			die("Something Went wrong!");
		}
	}
}
?>
<!doctype html>
<html>

<head>


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Sign Up|User</title>
	<meta name="description" content="">
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="css/styles.css">

	<meta name="author" content="Chinmay Joshi">
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
					<div><a class="navbar-brand" href="index.php"><i class="fa-solid fa-bomb"></i> Dynamites</a></div>
				</div>
			</div>
		</nav>
	</header>
	<div class="inregtot container panel-body-form">Want to register as school/college?<a class="inreg" href="institute_signup.php">Click Here</a></div>
	<div class="container panel-margin panel-body-form">
		<div id="panel-s">
			<div class="panel-heading">
				<h2 class="panel-title">USER SIGN UP</h2>
			</div>
			<div>
				<form method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="fname" placeholder="First Name" id="name" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="lname" placeholder="Last Name" id="name" required>
					</div>
					<div class="form-group">
						<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="number" class="form-control" maxlength="10" id="mobileno" placeholder="Mobile Number" name="mobno" required>
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