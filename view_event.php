<?php
$id = $_REQUEST['event_id'];
require "includes/common.php";
$sql = "select * from public.institute_events where event_id='" . $id . "'";
$result = pg_query($dbconn, $sql);
$row = pg_fetch_assoc($result);
$path=$row['logo'];
$resultName = $row['name'];
$resultCat = $row['category'];
$resultTyp = $row['type'];
$resultDes = $row['description'];
$resultViews = $row['view_count'];
$resultViews++;
$sql1 = "update public.institute_events set view_count='$resultViews' where event_id='$id'";
$res = pg_query($dbconn, $sql1);
$resultStart = $row['start'];
$resultEnd = $row['end'];
$resultLink = $row['link'];

?>
<!doctype html>
<html>

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Events</title>
    <meta name="description" content="">
    <meta name="author" content="Chinmay Joshi">
    <link rel="stylesheet" href="css/event_details.css">
</head>

<body>
    <div class="container">
        <div id="demo" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card">
                        <div class="path"><?php echo " " . $resultCat . " "; ?> / <?php echo " " . $resultTyp . " "; ?>
                            <div class="close text-right ">
                                <a href="javascript:history.go(-1)"><i class='fa fa-remove fa-2x'></i></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-center align-self-center">
                                <img class="img" src="<?php echo $path; ?>">
                            </div>
                            <div class="col-md-6 info">
                                <div class="row title">
                                    <div class="col">
                                        <h2><?php echo " " . $resultName . " "; ?></h2>
                                    </div>
                                </div>
                                <p><?php echo " " . $resultDes . " "; ?></p>
                                <span id="reviews"><?php echo "" . $resultViews . " "; ?> Views</span>
                                <div class="row price">
                                    <label class="radio">
                                        <span>
                                            <div class="row"><big><b><?php echo " " . $resultStart . " "; ?></b></big></div>
                                            <div class="row">Start</div>
                                        </span>
                                    </label>
                                    <label class="radio">
                                        <span>
                                            <div class="row"><big><b><?php echo " " . $resultEnd . " "; ?></b></big></div>
                                            <div class="row">End</div>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row lower">
                            <div class="col text-left align-self-center">
                                <span class="regtxt">Registration link:
                                    <?php
                                    if ($resultLink != null)
                                        echo " <a class='reglnk' href='$resultLink'>" . $resultLink . " </a>";
                                    else
                                        echo " N/A";
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</body>

</html>