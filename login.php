<?php
	require 'includes/common.php';
    if(isset($_SESSION["email"]))
    {
      echo '<script>alert("User already logged in!")</script>';
      
                    header("location: home.php"); 

          }

    $_SESSION["login_page"]=true;
    if(isset($_POST['submit'])&&!empty($_POST['submit']))
    {
        $mail=$_POST['email'];
        $hashpassword = md5($_POST['pwd']);
        $sql ="select * from public.user_data where email = '".pg_escape_string($mail)."' and password ='".$hashpassword."'";
        $rs = pg_query($dbconn, $sql) or die("Cannot execute query: $sql\n");
        $login_check = pg_num_rows($rs);
        $row=pg_fetch_assoc($rs);
        if($login_check > 0)
        {     
          session_start();
                $_SESSION['fname'] = $row['first_name'];
                $_SESSION['lname'] = $row['last_name'];
                $_SESSION['mobno'] = $row['mobno'];
                $_SESSION['city'] = $row['city'];
                $_SESSION['address'] = $row['address'];
                $_SESSION['email'] = $mail;
                $_SESSION['id'] =  $row['user_id'];
                $_SESSION["login_page"]=false;
                $_SESSION['login_type']="student";
                $sql1 = "insert into public.log(email)values('$mail')";
                $sqlRs = pg_query($dbconn, $sql1) or die("Cannot execute query: $sql1\n");
                header("location: home.php"); 

            } 
        
        else
        {
            echo '<script>alert("Invalid Details")</script>';
            //header("location: fail.php"); 
        }
      }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login|Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css" />
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
        setTimeout("noBack()", 0);
          
          window.onunload = function () { null };
    </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>
  <body>
  <header>
  <header id="header">
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
    <div id="form-container">
      <div id="div-bg"></div>
      <div id="form-section">
        <form method="post">
          <p> Want to log in?</p>
          <div class="form-group">
            <div class="form-field" id="username">
              <div>
                <i class="glyphicon glyphicon-user"></i>
              </div>
              <input type="email" name="email" placeholder="Email" onfocus="addBoxShadow('username')" onblur="removeBoxShadow('username')"/>
            </div>
            <div class="form-field" id="password">
              <div>
                <i class="glyphicon glyphicon-lock"></i>
              </div>
              <input type="password" name="pwd" placeholder="Password" onfocus="addBoxShadow('password')" onblur="removeBoxShadow('password')"/>
            </div>
          </div>
          <div id="forgot-password">
            <small>Forgot Password?</small>
          </div>
          <button type="submit" name="submit" value="Submit" id="submit-btn">Login</button>
          <div id="register-text">
            <small>
              Don't have an account?
              <span><a href="signup.php">Register</a></span>
            </small>
            <br>
            <small>
              Want to log in as school/college?
              <span><a href="institute_login.php">Click Here</a></span>
            </small>
          </div>
        </form>
      </div>
    </div>
    <script src="js/signup.js"></script>
  </body>
</html>
