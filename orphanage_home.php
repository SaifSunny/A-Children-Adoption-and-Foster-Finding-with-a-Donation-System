<?php
include_once("./database/config.php");

session_start();

$username = $_SESSION['or_name'];

if (!isset($_SESSION['or_name'])) {
    header("Location: orphanage_login.php");
}

$sql = "SELECT * FROM orphanage WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$image=$row['orphanage_img'];

$_SESSION['image'] = $image;
$_SESSION['orphanage_id'] = $row['orphanage_id'];
$_SESSION['orphanage_name'] = $row['orphanage_name'];
$zip = $row['zip'];
$orphanage_id = $row['orphanage_id'];


?>

<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <meta charset="UTF-8">
    <title>Orphanage Home</title>

    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- master stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- responsive stylesheet -->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/header.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <!-- Navigation  -->
    <?php include_once("./templates/orphanage_header.php");?>
    <!-- Navigation  -->

    <section class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 sec-title colored text-center">
                    <h2>Home</h2>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-home blog-page blog-details">
        <div class="container">

            <div class="row">
                <div class="col-md-6"
                    style="padding-top:30px;margin-bottom:100px; padding:50px;">
                    <div class="side-bar-widget">
                        <div class="single-sidebar-widget popular-post">
                            <h3 class="title">Adoption Appointments</h3>
                            <hr>
                            <ul>
                                <?php 
                                $sql = "SELECT * FROM adoption_meetings WHERE `orphanage_id`= $orphanage_id And status='0' ORDER by meeting_id DESC";
                                $result = mysqli_query($conn, $sql);
                                if($result){
                                    while($row=mysqli_fetch_assoc($result)){

                                    $child_img=$row['child_image'];
                                    $child_name=$row['child_name'];
                                    $user_name=$row['user_name'];
                                    $user_id=$row['user_id'];
                                    $date=$row['date'];
                                    $time=$row['time'];
                                    $meeting_id=$row['meeting_id'];
                            ?>
                                <li>
                                    <div class="img-box">
                                        <div class="inner-box">
                                            <img src="img/children/<?php echo $child_img ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="content-box">
                                        <a href="#">
                                            <h4 style="font-weight:700;">Child Name: <?php echo $child_name ?></h4>
                                        </a>
                                        <a href="#">
                                            <h4 style="font-weight:700;">Meeting with: <?php echo $user_name ?></h4>
                                        </a>
                                        <span
                                            style="font-weight:700;"><?php $part = explode('-', $date); echo $part[2]."-".$part[1]."-".$part[0]." | " .$time ?></span>
                                    </div>
                                </li>

                                <?php 
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>



                </div>
                <div class="col-md-6 "
                    style="padding-top:30px;margin-bottom:100px; padding:50px;">
                    <div class="side-bar-widget">
                        <div class="single-sidebar-widget popular-post">
                            <h3 class="title">Foster Appointments</h3>
                            <hr>
                            <ul>
                                <?php 
                                $sql = "SELECT * FROM foster_meetings WHERE `orphanage_id`= $orphanage_id And status='0' ORDER by meeting_id DESC";
                                $result = mysqli_query($conn, $sql);
                                if($result){
                                    while($row=mysqli_fetch_assoc($result)){

                                    $child_img=$row['child_image'];
                                    $child_name=$row['child_name'];
                                    $foster_name=$row['foster_name'];
                                    $foster_id=$row['foster_id'];
                                    $date=$row['date'];
                                    $time=$row['time'];
                                    $meeting_id=$row['meeting_id'];
                            ?>
                                <li>
                                    <div class="img-box">
                                        <div class="inner-box">
                                            <img src="img/children/<?php echo $child_img ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="content-box">
                                        <a href="#">
                                            <h4 style="font-weight:700;">Child Name: <?php echo $child_name ?></h4>
                                        </a>
                                        <a href="#">
                                            <h4 style="font-weight:700;">Meeting with: <?php echo $foster_name ?></h4>
                                        </a>
                                        <span
                                            style="font-weight:700;"><?php $part = explode('-', $date); echo $part[2]."-".$part[1]."-".$part[0]." | " .$time ?></span>
                                    </div>
                                </li>

                                <?php 
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>




    <!-- Navigation  -->
    <?php include_once("./templates/footer.php");?>
    <!-- Navigation  -->


    <!-- main jQuery -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- bx slider -->
    <script src="js/jquery.bxslider.min.js"></script>
    <!-- owl carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- validate -->
    <script src="js/jquery-parallax.js"></script>
    <!-- validate -->
    <script src="js/validate.js"></script>
    <!-- mixit up -->
    <script src="js/jquery.mixitup.min.js"></script>
    <!-- fancybox -->
    <script src="js/jquery.fancybox.pack.js"></script>
    <!-- easing -->
    <script src="js/jquery.easing.min.js"></script>
    <!-- circle progress -->
    <script src="js/circle-progress.js"></script>
    <!-- appear js -->
    <script src="js/jquery.appear.js"></script>
    <!-- count to -->
    <script src="js/jquery.countTo.js"></script>
    <!-- gmap helper -->
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <!-- gmap main script -->
    <script src="js/gmap.js"></script>

    <!-- isotope script -->
    <script src="js/isotope.pkgd.min.js"></script>
    <!-- jQuery ui js -->
    <script src="js/jquery-ui-1.11.4/jquery-ui.js"></script>

    <!-- revolution scripts -->

    <script src="revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>


    <!-- thm custom script -->
    <script src="js/custom.js"></script>


</body>

</html>