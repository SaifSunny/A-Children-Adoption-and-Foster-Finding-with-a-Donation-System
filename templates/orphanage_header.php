<?php
include_once("./database/config.php");

$username = $_SESSION['or_name'];

$sql = "SELECT * FROM orphanage WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$image=$row['orphanage_img'];

?>

<header class="header">
    <div class="container">
        <div class="logo pull-left" style="padding-top:8px;">
            <a href="orphanage_home.php" style="font-weight:700;font-family:rubik;color:black;font-size:26px;">FOSTER<span
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
                <div class="dropdown" style="margin-top:10px;">
                    <a><img src="./img/orphanages/<?php echo $image?>" alt="" height="40" style="border-radius:20%;">
                        <span
                            style="color:black;font-weight: 600;font-family: 'Exo', sans-serif;text-transform: capitalize; font-size:16px;">
                            &nbsp;&nbsp;&nbsp;<?php echo $username?></span>
                    </a>
                    <div class="dropdown-content">
                        <a href="orphanage_profile.php">My Profile</a>
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
                    <li><a href="orphanage_home.php">Home</a></li>
                    <li><a href="orphanage_adoption_appointment.php">Adoption Appointments</a></li>
                    <li><a href="orphanage_foster_appointment.php">Foster Appointments</a></li>
                    <li><a href="orphanage_adoption.php">For Adoption</a></li>
                    <li><a href="orphanage_foster.php">For Foster</a></li>
                    <li><a href="orphanage_adopted.php">Adopted</a></li>
                    <li><a href="orphanage_fostered.php">In Fosercare</a></li>
                    <li><a href="orphanage_donations.php">Donations</a></li>
                </ul>
            </div>
            <div class="nav-footer">
                <button><i class="fa fa-bars"></i></button>
            </div>
        </div>

    </div>
</nav>
<!-- /.mainmenu-area -->