<?php
require 'includes/common.php';
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $mail = $_POST['email'];
    $hashpassword = md5($_POST['pwd']);
    $sql = "select * from public.institute_data where email = '" . pg_escape_string($mail) . "' and password ='" . $hashpassword . "'";
    $data = pg_query($dbconn, $sql);
    $login_check = pg_num_rows($data);
    $row = pg_fetch_array($data);
    if ($login_check > 0) {
        if (!isset($_SESSION['email'])) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['mobno'] = $row['mobno'];
            $_SESSION['city'] = $row['city'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['email'] = $mail;
            $_SESSION['id'] =  $row['institute_id'];
            $_SESSION['login_type'] = "institute";
            $sql1 = "insert into public.log(email)values('$mail')";
            $sqlRs = pg_query($dbconn, $sql1) or die("Cannot execute query: $sql1\n");
        }
        header("location: dashboard.php");
    } else {
        echo '<script>alert("Invalid Details")</script>';
        //header("location: fail.php"); 
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Institute Login</title>
    <link rel="stylesheet" type="text/css" href="css/s.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <img class="wave" src="images/green.jpg">
    <div class="container">
        <div class="img"></div>


            <div class="login-content">
            <form method="post">

                <p>Please Login to Continue</p>
                <h2 class="title">INSTITUTE LOGIN</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="email" name="email" class="input">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" name="pwd" class="input">
                    </div>
                </div>
                <a href="#">Forgot Password?</a>
                <input type="submit" name="submit" class="btn" value="Login">
                </form>

            </div>


    </div>
    <script type="text/javascript" src="js/m.js"></script>
</body>

</html>