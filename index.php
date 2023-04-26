<?php
session_unset();
session_destroy();
require "includes/common.php";
$sql = "SELECT * FROM public.institute_events ORDER BY view_count DESC";
$rs = pg_query($dbconn, $sql) or die("Cannot execute query: $sql\n");
$n = pg_num_rows($rs);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Notify</title>
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

    <!--Custom CSS-->
    <link rel="stylesheet" href="css/styles1.css">

    <!--Tailwind CSS-->
    <script src="https://cdn.tailwindcss.com"></script>

    <!--Font-Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section id="title">

        <div class="containeer-fluid">

            <section id="navi">
                <!-- Nav Bar -->
                <nav class="navbar navbar-expand-lg navbar-dark ">
                    <a class="navbar-brand" href="index.php"><i class="fa-solid fa-bomb"></i> Notify</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav ms-auto">

                            <li class="nav-item"><a class="nav-link" href="login.php">Log in</a></li>
                            <li class="nav-item"><a class="nav-link" href="signup.php">Sign up</a></li>
                            <li class="nav-item"><a class="nav-link" href="overview.php">Overview</a></li>
                            <li class="nav-item"><a class="nav-link" href="about_us.html">About us</a></li>

                        </ul>
                    </div>

                </nav>
            </section>


            <!-- Title -->

            <div class="row">
                <div class="col-lg-6">
                    <h1><b>Making Life Eventful</b></h1>
                    <p class="intro">Next generation community of students to explore, participate & reach their full potential</p>
                    <button type="button" class="btn btn-dark btn-lg download-button"><i class="fa-brands fa-apple"></i> Download</button>
                    <button type="button" class="btn btn-outline-light btn-lg download-button"><i class="fa-brands fa-google-play"></i> Download</button>
                </div>

                <div class="col-lg-6">
                    <img src="images/phone.png" class="phone" alt="iphone-mockup">
                </div>
            </div>
        </div>
    </section>


    <!-- Features -->

    <section id="features">

        <h1 class="trend"><b>TRENDING EVENTS</b></h1>
        <div class="cards">
            <?php
            $row = pg_fetch_assoc($rs);
            ?>
            <div class="card card-1">
                <div class="card__icon"><i class="fas fa-bolt"></i></div>
                <h2 class="card__title"><b><?php echo "" . $row['name'] . ""; ?></B> <br><br><?php echo "" . $row['description'] . ""; ?></h2>
                <p></p>
            </div>
            <?php
            $row = pg_fetch_assoc($rs);
            ?>
            <div class="card card-2">
                <div class="card__icon"><i class="fas fa-bolt"></i></div>
                <h2 class="card__title"><b><?php echo "" . $row['name'] . ""; ?></b> <br><br><?php echo "" . $row['description'] . ""; ?></h2>
            </div>
            <?php
            $row = pg_fetch_assoc($rs);
            ?>
            <div class="card card-3">
                <div class="card__icon"><i class="fas fa-bolt"></i></div>

                <h2 class="card__title"><b><?php echo "" . $row['name'] . ""; ?></b><br><br><?php echo "" . $row['description'] . ""; ?></h2>
            </div>
            <?php
            $row = pg_fetch_assoc($rs);
            ?>
            <div class="card card-1">
                <div class="card__icon"><i class="fas fa-bolt"></i></div>
                <h2 class="card__title"><b><?php echo "" . $row['name'] . ""; ?></B> <br><br><?php echo "" . $row['description'] . ""; ?></h2>
                <p></p>
            </div>
            <?php
            $row = pg_fetch_assoc($rs);
            ?>
            <div class="card card-2">
                <div class="card__icon"><i class="fas fa-bolt"></i></div>
                <h2 class="card__title"><b><?php echo "" . $row['name'] . ""; ?></B> <br><br><?php echo "" . $row['description'] . ""; ?></h2>
                <p></p>
            </div>
            <?php
            $row = pg_fetch_assoc($rs);
            ?>
            <div class="card card-3">
                <div class="card__icon"><i class="fas fa-bolt"></i></div>
                <h2 class="card__title"><b><?php echo "" . $row['name'] . ""; ?></B> <br><br><?php echo "" . $row['description'] . ""; ?></h2>
                <p></p>
            </div>

    </section>

    <!-- Footer -->

    <footer id="footer">

        <div class="flex flex-col mx-auto max-w-[1500px] h-auto">

            <div class="flex lg:items-center lg:justify-between flex-col lg:flex-row gap-y-[45px] py-[30px] lg:py-0 px-[15px] sm:px-[30px] md:px-[40px] lg:px-[50px] xl:px-[75px] w-full h-auto lg:h-[380px] bg-gray-800">

                <div class="lg:w-4/12">

                    <div class="flex items-center justify-center gap-x-[8px] mb-[30px] text-white"><i class="fa-solid fa-atom"></i>Notify</div>

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

</html>