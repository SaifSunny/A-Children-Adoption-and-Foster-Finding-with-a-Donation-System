<?php
include_once("./database/config.php");

$username = $_SESSION['adminname'];

$sql = "SELECT * FROM admin WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$image=$row['admin_img'];

?>

<header class="header">
    <div class="container">
        <div class="logo pull-left" style="padding-top:8px;">
            <a href="admin_home.php" style="font-weight:700;font-family:rubik;color:black;font-size:26px;">FOSTER<span
                    style="color:#eb5310;">CARE</span></a>
        </div>
        <div class="header-right-info pull-right clearfix">
            <div class="single-header-info" style="padding-top:8px;">
                <div class="icon-box">
                    <div class="inner-box">
                        <i class="fa fa-envelope"></i>
                    </div>
                </div>
                <div class="content">
                    <h3>EMAIL</h3>
                    <p>fostercare.bd@gmail.com</p>
                </div>
            </div>
            <div class="single-header-info" style="padding-top:8px;padding-right:70px">
                <div class="icon-box">
                    <div class="inner-box">
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
                <div class="content">
                    <h3>Call Now</h3>
                    <p><b>+8801740702147</b></p>
                </div>
            </div>
            <div class="single-header-info">
                <div class="dropdown">
                    <a><img src="./img/admin/<?php echo $image?>" alt="" height="40" style="border-radius:50%;">
                    <span style="color:black;font-weight: 600;font-family: 'Exo', sans-serif;text-transform: capitalize; font-size:16px;"> &nbsp;&nbsp;&nbsp;<?php echo $username?></span>
                </a>
                    <div class="dropdown-content">
                        <a href="admin_profile.php">My Profile</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
</header>
<!-- /.header -->


<nav class="mainmenu-area stricky">
    <div class="container">
        <div class="navigation pull-left">
            <div class="nav-header">

                <ul>
                    <li><a href="admin_home.php">Home</a></li>
                    <li><a href="admin_orphanages.php">Manage Orphanages</a></li>
                    <li><a href="admin_fosters.php">Manage Fosters</a></li>
                    <li><a href="admin_users.php">Manage Users</a></li>
                    <li><a href="admin_donations.php">Donations</a></li>
                </ul>
            </div>
            <div class="nav-footer">
                <button><i class="fa fa-bars"></i></button>
            </div>
        </div>

    </div>
</nav>
<!-- /.mainmenu-area -->