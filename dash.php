

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>

    <link rel="stylesheet" type="text/css" href="dashcss.css"> <!--dash's css fiile if any-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body style="background-color:aqua;">
<div>
<!--header-->
</div>

<!--college card-->
<div class="card text-center" style="border-radius: 15px;">
  <div class="card-header" style="background-color:#CC6600;">
    <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
        <a class="nav-link active "  href="">Upcomming Events</a>
      </li>
      <li class="nav-item">
        <a class="nav-link "  href="#!">Upcomming Events</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#!">Recently Concluded</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#!">Add Events</a>
      </li>
      <li class="nav-item">
        <a class="nav-link "  href="#!">Edit Profile</a>
      </li>
    </ul>
  </div>
  <div class="card-body" >
    
    <h1>
        <img src="logo.png" alt="logo">
    </h1>
    
    <h5 class="card-title">COLLEGE NAME</h5>
     <a class="nav-link" href="#"><p class="card-text">EmailID</p></a>
     <a href="#" class="btn btn-primary">gmaps Location</a>
    <a href="#" class="btn btn-primary">college website</a>
  </div>
</div>
<div>
</section>
<section>
    <h2>Upcomming EVENTS</h2>
    <div class="card-body">
    <?php
    $i = 0;
    while ($row = pg_fetch_assoc($result)) {
    ?>
      <div class="card-grid-space" >
        <a class="card" href="view_event.php?event_id=<?php echo "" . $row['event_id'] . ""; ?>" style="  --bg-img: url('/<?php echo $row['logo']; ?>')">
          <!-- add card bg -->
          <div style="background-color: blue;">
            <h1><?php echo "" . $row['name'] . ""; ?></h1>
            <p><?php echo "" . $row['description'] . ""; ?></p>
            <div class="date"><?php echo "" . $row['start'] . ""; ?></div>
            <div class="tags">
              <div class="tag"><?php echo "" . $row['category'] . ""; ?></div>
            </div>
          </div>
        </a>
      </div>
    <?php
      $i++;
    }
    
    ?>
    </div>


 
</div>

</section>
<div>
<!--footer-->
</div>
</body>