<?php
	require 'includes/common.php';
	if (isset($_POST['submit']) && !empty($_POST['submit']))
	{
		if(isset($_FILES['event-logo'])){
			$errors= array();
			$file_name = $_POST['name'];
			$file_size =$_FILES['event-logo']['size'];
			$file_tmp =$_FILES['event-logo']['tmp_name'];
			$file_type=$_FILES['event-logo']['type'];
			$file_ext=strtolower(end(explode('.',$_FILES['event-logo']['name'])));
			
			$extensions= array("jpeg","jpg","png");
			
			if(in_array($file_ext,$extensions)=== false){
			   $errors[]="extension not allowed, please choose a JPEG or PNG file.";
			}
			
			if($file_size > 5242880){
			   $errors[]='File size must be excately 5 MB';
			}
			
			if(empty($errors)==true){
			   move_uploaded_file($file_tmp,"images/uploads/event-logo/".$file_name);
			}else{
			   print_r($errors);
			}
		 }

	$name = $_POST['name'];
	$des = $_POST['description'];
	$sdate = $_POST['start-date'];
	$edate = $_POST['end-date'];
	$cat = $_POST['category'];
	$type = $_POST['type'];
	$link = $_POST['regUrl'];
	$path="images/uploads/event-logo/$file_name";
	$in_id=$_SESSION['id'];
	$sql = "insert into public.institute_events(name,description,start_date,end_date,category,type,link,logo,in_id)values('$name','$des','$sdate','$edate','$cat','$type','$link','$path','$in_id')";
	$sql2 = "select event_id from public.institute_events where name = '$name' AND start_date='$sdate' AND in_id='$in_id'";
	$rs = pg_query($dbconn, $sql2) or die("Cannot execute query: $sql2\n");
	$db_check = pg_num_rows($rs);
	if ($db_check > 0) {
		die("Event already registered");
	} else {
		$ret = pg_query($dbconn, $sql) or die("Cannot execute query: $sql\n");		
	}
	echo '<script>alert("Event added successfully!")</script>';
	header('Location:dashboard.php');

}
?>
<!doctype html>
<html>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>ADD EVENT</title>
	<meta name="description" content="">
	<meta name="author" content="Chinmay Joshi">
	<!-- <link rel="stylesheet" href="css/styles.css"> -->
</head>

<body>
	<header>
		<?php
		// require "includes/header.php";
		?>
	</header>
	<div class="container panel-margin panel-body-form ">
		<div id="panel-s">
			<div class="panel-heading margin-add-event">
				<h2 class="panel-title">Create Event</h2>
			</div>
			<div>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" class="form-control" name="name" placeholder="Event Name" id="name" required>
					</div>
					<div class="form-group">
						<textarea class="form-control" name="description" rows="6" cols="70" placeholder="Add brief description of the event" required></textarea>
					</div>
					<div class="form-group">
						<label for="start-date">Start Date:</label>
						<input type="date" class="form-control" min="<?= date('Y-m-d'); ?>" id="start-date" name="start-date" required>
					</div>
					<div class="form-group">
						<label for="end-date">End Date:</label>
						<input type="date" class="form-control" min="<?= date('Y-m-d'); ?>" id="end-date" name="end-date" required>
					</div>
					<div class="form-group">
						<select name="category" class="form-control" required>
							<option value="" disabled selected>Category</option>
							<option value="Technical">Technical event</option>
							<option value="Non-Technical">Non-technical event</option>
						</select>
					</div>
					<div class="form-group">
						<select name="type" class="form-control" required>
							<option value="" disabled selected>Type</option>
							<option value="Hackathon">Hackathon</option>
							<option value="Workshop">Workshop</option>
							<option value="Seminar/Webinar">Seminar/Webinar</option>
							<option value="Photography">Photography</option>
							<option value="Quiz">Quiz</option>
							<option value="Others">Others</option>
						</select>					
					</div>
					<div class="form-group">
						<label for="myURL">Enter link to the registration form/website (optional):</label>
						<input class="form-control" id="regUrl" name="regUrl" type="url" placeholder="http://www.example.com">
					</div>
					<div class="form-group">
						<label for="event-logo">Upload event logo [formats supported: jpg, jpeg, png][max size: 5MB] (optional):</label>
						<input class="form-control" id="event-logo" name="event-logo" type="file">
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