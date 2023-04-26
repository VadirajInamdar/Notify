<nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                        </button>
                        <a class="navbar-brand" <?php if(!isset($_SESSION['email'])){ echo'href="index.php"';}?>>Team Dynamites</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <?php 
                            if(isset($_SESSION['email'])){?>
                            <li><a href="about_us.html"><span class="glyphicon glyphicon-earphone"></span> Contact Us</a></li>
                            <li><a href="profile.php" target="_self"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                            <li><a href="logout.php" target="_self"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>

    