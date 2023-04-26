<?php
require "includes/common.php";
if (!isset($_SESSION["email"])) {
    header("location:institute_login.php");
  }
  $id = $_SESSION['id'];
// $id=311;
$date1 = date("Y-m-d");
$sql = "select * from public.institute_events where in_id='" . $id . "' and start_date>'" . $date1 . "'";
$sql1 = "select * from public.institute_events where in_id='" . $id . "' and end_date<'" . $date1 . "'";
$sql2 = "select * from public.institute_events where in_id='" . $id . "'";
$sql0 = "select * from public.institute_events where in_id='" . $id . "' and start_date<='" . $date1 . "' and end_date>'" . $date1 . "'";
$result = pg_query($dbconn, $sql);
$result1 = pg_query($dbconn, $sql1);
$result0 = pg_query($dbconn, $sql0);
$result2 = pg_query($dbconn, $sql2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d281899679.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/list.css">
    <link rel="stylesheet" href="css/dash.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body>
  <section id="title">

    <div class="containeer-fluid">

    <section id="navi">
      <!-- Nav Bar -->
      <nav class="navbar navbar-expand-lg navbar-dark ">
        <a class="navbar-brand" href="index.php">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav ms-auto">

            <li class="nav-item"><a class="nav-link" href="#ongoing_events">Ongoing Events</a></li>
            <li class="nav-item"><a class="nav-link" href="#upcoming_events">Upcoming Events</a></li>
            <li class="nav-item"><a class="nav-link" href="#all_events">All Events</a></li>
            <li class="nav-item"><a class="nav-link" href="edit_institute_profile.php">Edit Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>

          </ul>
        </div>

      </nav>
    </section>


      <!-- Title -->

      <div class="row">
        <div class="col-lg-6">
          <br>
          <br>
          <p class="intro"><?php echo $_SESSION['name']; ?><br><?php echo $_SESSION['email']; ?></p>
          <button type="button" class="btn btn-dark btn-lg download-button"><i class="fa-solid fa-plus"></i> Add Event</button>
          <button type="button" class="btn btn-dark btn-lg download-button"><i class="fa-solid fa-minus"></i> Delete Event</button>
        </div>

        <div class="col-lg-6">
        <img src="images/logo.png" alt="Logo" class="logo">
        </div>
      </div>
    </div>
  </section>


  <!-- Features -->
  <div>

<section id="ongoing_events">
<br><br><h2 align="center">Ongoing Events</h2>
    <div class="cards-wrapper">
        <?php
        $a = 0;
        while ($row0 = pg_fetch_assoc($result0)) {

        ?>
            <div class="card-grid-space">
                <a class="card" href="view_event.php?event_id=<?php echo "" . $row0['event_id'] . ""; ?>" style="  --bg-img: url('/<?php echo $row0['logo']; ?>')">
                    <!-- add card bg -->
                    <div>
                        <h1><?php echo "" . $row0['name'] . ""; ?></h1>
                        <p><?php echo "" . $row0['description'] . ""; ?></p>
                        <div class="tags">
                            <div class="tag"><?php echo "" . $row0['category'] . ""; ?></div>
                            <div class="tag"><?php echo "" . $row0['start_date'] . ""; ?></div>

                        </div>
                    </div>
                </a>
            </div>
        <?php
            $a++;
        }
        if($a==0)
        { ?>
                        <h1>No Ongoing Events</h1>
                        <button type="button" class="btn btn-dark btn-lg download-button"><i class="fa-solid fa-plus"></i> Add Event</button>
       <?php }
        ?>
    </div>




</section>
<section id="upcoming_events">
    <h2 align="center">Upcoming Events</h2>
    <div class="cards-wrapper">
        <?php
        $i = 0;
        while ($row = pg_fetch_assoc($result)) {

        ?>
            <div class="card-grid-space">
                <a class="card" href="view_event.php?event_id=<?php echo "" . $row['event_id'] . ""; ?>" style="  --bg-img: url('/<?php echo $row['logo']; ?>')">
                    <!-- add card bg -->
                    <div>
                        <h1><?php echo "" . $row['name'] . ""; ?></h1>
                        <p><?php echo "" . $row['description'] . ""; ?></p>
                        <div class="tags">
                            <div class="tag"><?php echo "" . $row['category'] . ""; ?></div>
                            <div class="tag"><?php echo "" . $row['start_date'] . ""; ?></div>
                        </div>
                    </div>
                </a>
            </div>
        <?php
            $i++;
        }
        if($i==0)
        { ?>
                        <h1>No Upcoming Events</h1>
                        <button type="button" class="btn btn-dark btn-lg download-button"><i class="fa-solid fa-plus"></i> Add Event</button>
       <?php }
        ?>
    </div>




</section>
<section id="concluded_events">
    <h2 align="center">Concluded Events</h2>
    <div class="cards-wrapper">
        <?php
        $j = 0;
        while ($row1 = pg_fetch_assoc($result1)) {

        ?>
            <div class="card-grid-space">
                <a class="card" href="view_event.php?event_id=<?php echo "" . $row1['event_id'] . ""; ?>" style="  --bg-img: url('/<?php echo $row1['logo']; ?>')">
                    <!-- add card bg -->
                    <div>
                        <h1><?php echo "" . $row1['name'] . ""; ?></h1>
                        <p><?php echo "" . $row1['description'] . ""; ?></p>
                        <div class="tags">
                            <div class="tag"><?php echo "" . $row1['category'] . ""; ?></div>
                            <div class="tag"><?php echo "" . $row1['start_date'] . ""; ?></div>

                        </div>
                    </div>
                </a>
            </div>
        <?php
            $j++;
        }
        if($j==0)
        { ?>
                        <h1>No Event Data available</h1>
                        <button type="button" class="btn btn-dark btn-lg download-button"><i class="fa-solid fa-plus"></i> Add Event</button>
       <?php }
        ?>
    </div>




</section>
<section id="all_events">
    <h2 align="center">All Events</h2>
    <div class="cards-wrapper">
        <?php
        $k = 0;
        while ($row2 = pg_fetch_assoc($result2)) {
        ?>
            <div class="card-grid-space">
                <a class="card" href="view_event.php?event_id=<?php echo "" . $row2['event_id'] . ""; ?>" style="  --bg-img: url('/<?php echo $row2['logo']; ?>')">
                    <!-- add card bg -->
                    <div>
                        <h1><?php echo "" . $row2['name'] . ""; ?></h1>
                        <p><?php echo "" . $row2['description'] . ""; ?></p>
                        <div class="tags">
                            <div class="tag"><?php echo "" . $row2['category'] . ""; ?></div>
                            <div class="tag"><?php echo "" . $row2['start_date'] . ""; ?></div>
                        </div>
                    </div>
                </a>
            </div>
        <?php
            $k++;
        }
        if($k==0)
        { ?>
                        <h1>No Event Data available</h1>
                        <button type="button" class="btn btn-dark btn-lg download-button"><i class="fa-solid fa-plus"></i> Add Event</button>
       <?php }
        ?>
    </div>




</section>

</div>

  <!-- Footer -->

  <footer id="footer">

        <div class="flex flex-col mx-auto max-w-[1500px] h-auto">

            <div class="flex lg:items-center lg:justify-between flex-col lg:flex-row gap-y-[45px] py-[30px] lg:py-0 px-[15px] sm:px-[30px] md:px-[40px] lg:px-[50px] xl:px-[75px] w-full h-auto lg:h-[380px] bg-gray-800">

                <div class="lg:w-4/12">

                    <div class="flex items-center justify-center gap-x-[8px] mb-[30px] text-white"><i class="fa-solid fa-atom"></i>Team Dynamites</div>

                    <div class="text-center text-gray-200">A promotional website to showcase the latest college events. Every day we select the trending events as per the user's choice & flash it to our users.</div>

                </div>

                <div class="flex justify-center sm:justify-between flex-wrap lg:flex-nowrap gap-y-[60px] gap-x-[90px] sm:gap-x-0 lg:w-7/12">

                    <div class="text-center sm:text-left">

                        <div class="mb-[18px] text-gray-400 text-sm font-bold select-none">Product</div>

                        <ul class="flex flex-col gap-[10px] text-gray-200">
                            <a class="hover:underline" href="overview.php">
                                <li>Overview</li>
                            </a>
                            <a class="hover:underline" href="#">
                                <li>Testimonials</li>
                            </a>
                           
                            <a class="hover:underline" href="#">
                                <li>Releases</li>
                            </a>
                        </ul>

                    </div>

                    <div class="text-center sm:text-left">

                        <div class="mb-[18px] text-gray-400 text-sm font-bold select-none">Company</div>

                        <ul class="flex flex-col gap-[10px] text-gray-200">
                            <a class="hover:underline" href="about_us.html">
                                <li>About us</li>
                            </a>
                            <a class="hover:underline" href="#">
                                <li>Careers</li>
                            </a>
                            <a class="hover:underline" href="#">
                                <li>Blog</li>
                            </a>
                            
                        </ul>

                    </div>

                    

                    <div class="text-center sm:text-left">

                        <div class="mb-[18px] text-gray-400 text-sm font-bold select-none">Social</div>

                        <ul class="flex flex-col gap-[10px] text-gray-200">
                            <a class="hover:underline" href="#">
                                <li>Twitter</li>
                            </a>
                            <a class="hover:underline" href="#">
                                <li>LinkedIn</li>
                            </a>
                           
                            <a class="hover:underline" href="#">
                                <li>Github</li>
                            </a>
                            
                        </ul>

                    </div>

                    

                </div>

            </div>

            <div class="flex items-center justify-evenly sm:justify-between flex-col sm:flex-row sm:px-[30px] md:px-[40px] lg:px-[50px] xl:px-[75px] w-full h-[100px] bg-gray-900">

                <div class="text-gray-400">
                    <p>Team Dynamites</p>
                </div>

                <ul class="flex gap-[15px] text-gray-400 cursor-pointer">
                    <li class="ease-in duration-200 hover:text-gray-100"><a class="_" href="https://twitter.com/i/flow/login"><i class="fa-brands fa-xl fa-twitter"></i></a></li>
                    <li class="ease-in duration-200 hover:text-gray-100"><a class="_" href="https://www.linkedin.com/"><i class="fa-brands fa-xl fa-linkedin"></i></a></li>
                    <li class="ease-in duration-200 hover:text-gray-100"><a class="bl" href="https://www.facebook.com/"><i class="fa-brands fa-xl fa-facebook"></i></a></li>
                    <li class="ease-in duration-200 hover:text-gray-100"><a class="git" href="https://github.com/"><i class="fa-brands fa-xl fa-github"></i></a></li>
                </ul>

            </div>

        </div>

        </div>

    </footer>


</body>
<!--  -->
