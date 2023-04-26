<?php
	require "includes/common.php";
    $keywrd=$_REQUEST['type'];
    $id=$_REQUEST['id'];
    if($keywrd)
    $sql ="select * from public.institute_events where type='".$keywrd."'";
    else
    $sql ="select * from public.institute_events where event_id='".$id."'";
    $result = pg_query($dbconn,$sql );
?>

<!doctype html>
<html>
  <head>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title><?php  echo $keywrd; ?></title>
    <meta name="description" content="">
    <meta name="author" content="Chinmay Joshi">
    <link rel="stylesheet" href="css/list.css">
 
</head>
<body>

<section class="cards-wrapper">
  
<?php
$i=0;
while($row = pg_fetch_assoc($result)) {
?>
<div class="card-grid-space">
    <a class="card" href="view_event.php?event_id=<?php  echo"".$row['event_id']."";?>" style="--bg-img: url('/<?php echo $row['logo']; ?>')">
    <!-- add card bg -->
      <div>
        <h1><?php echo"".$row['name']."";?></h1>
        <p><?php echo"".$row['description']."";?></p>
        <div class="date"><?php echo"".$row['start']."";?></div>
        <div class="tags">
          <div class="tag"><?php echo"".$row['category']."";?></div>
        </div>
      </div>
    </a>
  </div>
  <?php
$i++;
}
if($i==0)
{
    echo "<script>if(!alert('No available events')) document.location = 'home.php';</script>";
}
?>

    

</section>
<?php
  //  require "includes/footer.php";
  ?>
</body>
</html>