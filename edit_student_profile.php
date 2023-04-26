<?php
require 'includes/common.php';
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $mail = $_SESSION['email'];
    $fname = pg_escape_string($_POST['fname']);
    $lname = pg_escape_string($_POST['lname']);
    // $mail = pg_escape_string($_POST['email']);
    // $pwd = md5($_POST['pwd']);
    $contact = pg_escape_string($_POST['mobno']);
    $city = pg_escape_string($_POST['city']);
    $address = pg_escape_string($_POST['address']);
    $sql = "update public.user_data set first_name='$fname',last_name='$lname',mobno='$contact',city='$city',address='$address' where email='$mail'";
    // $sql2 ="select user_id from public.user_data where email = '$mail'";
    // $rs = pg_query($dbconn, $sql2) or die("Cannot execute query: $sql2\n");
    // $db_check = pg_num_rows($rs);
    // if($db_check > 0)
    // {
    // 	die("Email already in use");
    // }
    // else
    // {
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
        if (isset($_SESSION['email'])) {
            header("location: profile.php");
        }
    } else {
        die("Something Went wrong!");
    }
    // }
}
?>


<!doctype html>
<html>

<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Edit Profile</title>
    <meta name="description" content="">
    <meta name="author" content="Chinmay Joshi">
    <link rel="stylesheet" href="css/edit_form.css">
</head>

<body>
    <header>
        <?php
        // require "includes/header.php";
        ?>
    </header>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" src="images/pngwing.com.png">
                    <span class="font-weight-bold"><?php echo "" . $_SESSION['fname'] . ""; ?></span>
                    <span class="text-black-50"><?php echo " " . $_SESSION['email'] . ""; ?></span>
                    <span></span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <form method="post">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">First Name</label>
                                <input name="fname" type="text" class="form-control" value="<?php echo "" . $_SESSION['fname'] . ""; ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Last Name</label>
                                <input name="lname" type="text" class="form-control" value="<?php echo "" . $_SESSION['lname'] . ""; ?>">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Contact Number</label>
                                <input name="mobno" type="text" class="form-control" value="<?php echo "" . $_SESSION['mobno'] . ""; ?>">
                            </div>
                            <!-- <div class="col-md-12">
                                <label class="labels">Email</label>
                                <input name="email" type="email" class="form-control" value="<?php echo "" . $_SESSION['email'] . ""; ?>">
                            </div>  -->
                            <div class="col-md-12">
                                <label class="labels">City</label>
                                <input name="city" type="text" class="form-control" value="<?php echo "" . $_SESSION['city'] . ""; ?>">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Address</label>
                                <input name="address" type="text" class="form-control" value="<?php echo "" . $_SESSION['address'] . ""; ?>">
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit" name="submit" value="Submit">Save Profile</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>