<?php
require "includes/common.php";
if (!isset($_SESSION["email"])) {
  header("location:login.php");
}
$sql = "SELECT * FROM public.institute_events ORDER BY view_count DESC";
$rs = pg_query($dbconn, $sql) or die("Cannot execute query: $sql\n");
$n = pg_num_rows($rs);
?>
<!doctype html>
<html>

<head>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Home</title>
  <meta name="description" content="">
  <meta name="author" content="Chinmay Joshi">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/footer.css">
  <script src="https://cdn.tailwindcss.com"></script>


</head>

<body>
  <header>
    <?php
    require "includes/header.php";
    ?>
  </header>

  <div id="wrapper">
    <section class="fullwidth margin-top-105" data-background-color="#f7f7f7" style="background: rgb(247, 247, 247);">
      <h3 class="headline-box">Welcome<?php echo " " . $_SESSION['fname'] . "!"; ?><br>What are you looking for today?</h3>
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="icon-box-1">
              <div class="icon-container">
                <i class="fa fa-laptop" aria-hidden="true"></i>
                <div class="icon-links">
                  <a href="list_events.php?type=Hackathon">View</a>
                </div>
              </div>
              <h3>Hackathons</h3>
              <p>Brilliant ideas start with curious minds. When those minds compete, the world wins.</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="icon-box-1">
              <div class="icon-container">
                <i class="fa fa-camera-retro" aria-hidden="true"></i>
                <div class="icon-links">
                  <a href="list_events.php?type=Photography">View</a>
                </div>
              </div>
              <h3>Photography</h3>
              <p>Photography is the beauty of life, captured.</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="icon-box-1">
              <div class="icon-container">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                <div class="icon-links">
                  <a href="list_events.php?type=Workshop">View</a>
                </div>
              </div>
              <h3>Workshops</h3>
              <p>Never stop learning because life never stops teaching.</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="icon-box-1">
              <div class="icon-container">
                <i class="fa fa-question" aria-hidden="true"></i>
                <div class="icon-links">
                  <a href="list_events.php?type=Quiz">View</a>
                </div>
              </div>
              <h3>Quizes</h3>
              <p>Don't study until you get it right.Study until you can't get it wrong.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="headline centered margin-bottom-35 margin-top-10">Popular Events
            <span>Most searched and trending events</span>
          </h3>
        </div>
        <?php
        $row = pg_fetch_assoc($rs);
        ?>
        <div class="col-md-4">
          <a href="view_event.php?event_id=<?php echo $row['event_id'] ?>" class="img-box" data-background-image="add.url.here">
            <!-- add link to the trending event -->
            <!-- add event logo -->
            <div class="listing-badges">
              <span class="featured">Trending</span>
            </div>
            <div class="img-box-content visible">
              <h4><?php echo "" . $row['name'] . ""; ?></h4>
            </div>
            <div class="img-box-background" style="background-image: url(&quot;add.url.here&quot;);"></div>
          </a>
        </div>
        <?php
        $row = pg_fetch_assoc($rs);
        ?>
        <div class="col-md-8">
          <a href="view_event.php?event_id=<?php echo $row['event_id'] ?>" class="img-box" data-background-image="">
            <div class="img-box-content visible">
              <h4><?php echo "" . $row['name'] . ""; ?></h4>
            </div>
            <div class="img-box-background" style="background-image: url(&quot;images/popular-location-02.jpg&quot;);"></div>
          </a>
        </div>
        <?php
        $row = pg_fetch_assoc($rs);
        ?>
        <div class="col-md-8">
          <a href="view_event.php?event_id=<?php echo $row['event_id'] ?>" class="img-box" data-background-image="">
            <div class="img-box-content visible">
              <h4><?php echo "" . $row['name'] . ""; ?></h4>
            </div>
            <div class="img-box-background" style="background-image: url(&quot;images/popular-location-03.jpg&quot;);"></div>
          </a>
        </div>
        <?php
        if ($n > 3) {
          $row = pg_fetch_assoc($rs);
        ?>
          <div class="col-md-4">
            <a href="view_event.php?event_id=<?php echo $row['event_id'] ?>" class="img-box" data-background-image="">
              <div class="img-box-content visible">
                <h4><?php echo "" . $row['name'] . ""; ?></h4>
              </div>
              <div class="img-box-background" style="background-image: url(&quot;images/popular-location-04.jpg&quot;);"></div>
            </a>
          </div><?php } ?>
      </div>
    </div>

    <section class="fullwidth margin-top-95 margin-bottom-0" style="background-image: url(&quot;undefined&quot;);">
      <h3 class="headline-box">Blog</h3>
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="blog-post">
              <a href="#" class="post-img">
                <img src="" alt="">
              </a>
              <div class="post-content">
                <h3 class="text-center">Coming Soon!</h3>
                <p class="text-center">Comments and blog feature is getting ready and will be unveiled soon. Stay tuned!</p>
                <!-- <a href="#" class="read-more">Read More <i class="fa fa-angle-right"></i></a> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <a href="list_all_events.php" class="flip-banner parallax" data-background="" data-color="#274abb" data-color-opacity="0.9" data-img-width="2500" data-img-height="1600" style="background-image: url(&quot;images/flip-banner-bg.jpg&quot;); background-attachment: fixed; background-size: 2009.38px 1286px; background-position: 50% -21.4883px;">
      <div class="parallax-overlay" style="background-color: rgb(39, 74, 187); opacity: 0.9;"></div>
      <div class="flip-banner-content">
        <h2 class="flip-visible">We help discover talent</h2>
        <h2 class="flip-hidden">Browse Events <i class="sl sl-icon-arrow-right"></i></h2>
      </div>
    </a>

    <div class="footer-shadow" style="margin-bottom: 509px;"></div>
    <div class="footer-reveal-offset"></div>
    <div id="footer" class="sticky-footer" style="z-index: -10; position: fixed; bottom: 0px; width: 100%;">
      <!-- Main -->
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-sm-6">
            <img class="footer-logo" src="images/logo.png" alt="">
            <br><br>
            <p class="text-justify">Web-based portal for All India Council for Technical Education (AICTE),
              where information about all academic activities across the country is available in
              chronological order and in subject areas so as to enable the students, faculty, and researchers
              to access information and prepare well in advance and participate effectively and successfully.</p>
          </div>

          <div class="col-md-4 col-sm-6 ">
            <h4>Helpful Links</h4>
            <ul class="footer-links">
              <li><a href="profile.php">My Profile</a></li>

              <li><a href="about_us.html">About Us</a></li>
            </ul>

            <ul class="footer-links">
              <li><a href="overview.php">Overview</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Our Sponsors</a></li>
              <li><a href="#">How It Works</a></li>
            </ul>
            <div class="clearfix"></div>
          </div>

          <div class="col-md-3  col-sm-12">
            <h4>Contact Us</h4>
            <div class="text-widget">
              <span>7XR9+QJP, Murida Rd, Fatorda, Margao, Goa 403602</span> <br> Phone: <span> 0832 274 3944</span><br>
              E-Mail: <span> dbcefatorda@dbcegoa.ac.in </span><br>
            </div>

            <ul class="social-icons margin-top-20">
              <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
            </ul>

          </div>

        </div>

        <!-- Copyright -->
        <div class="row">
          <div class="col-md-12">
            <div class="copyrights">© 2022 Dynamites. All Rights Reserved.</div>
          </div>
        </div>

      </div>

    </div>
    <!-- Footer / End -->


    <!-- Scripts
================================================== -->
    <script type="text/javascript" src="scripts/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="scripts/chosen.min.js"></script>
    <script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
    <script type="text/javascript" src="scripts/owl.carousel.min.js"></script>
    <script type="text/javascript" src="scripts/rangeSlider.js"></script>
    <script type="text/javascript" src="scripts/sticky-kit.min.js"></script>
    <script type="text/javascript" src="scripts/slick.min.js"></script>
    <script type="text/javascript" src="scripts/masonry.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.jpanelmenu.js"></script>
    <script type="text/javascript" src="scripts/tooltips.min.js"></script>
    <script type="text/javascript" src="scripts/custom.js"></script>


  </div>
  <?php
  //  require "includes/footer.php";
  ?>
</body>

</html>