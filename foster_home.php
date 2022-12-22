<?php
include_once("./database/config.php");

session_start();

$username = $_SESSION['fostername'];

if (!isset($_SESSION['fostername'])) {
    header("Location: foster_login.php");
}

$sql = "SELECT * FROM foster WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$image=$row['foster_img'];

$_SESSION['image'] = $image;
$_SESSION['foster_id'] = $row['foster_id'];
$_SESSION['fostername'] = $row['username'];
$zip = $row['zip'];
$uid = $row['foster_id'];
?>

<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <meta charset="UTF-8">
    <title>Foster Home</title>

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
    <?php include_once("./templates/foster_header.php");?>
    <!-- Navigation  -->

    <!-- Donation Form  -->
    <?php include_once("./templates/donation_form.php");?>
    <!-- Donation Form   -->

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
                <div class="col-md-6 pull-left"
                    style="padding-top:30px;margin-bottom:100px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); padding:50px;">
                    <div class="side-bar-widget">
                        <div class="single-sidebar-widget popular-post">
                            <h3 class="title">Fostering </h3>
                            <hr>
                            <ul>
                            <?php 
                                $sql = "SELECT * FROM foster_meetings WHERE `foster_id`= $uid ORDER by meeting_id DESC";
                                $result = mysqli_query($conn, $sql);
                                if($result){
                                    while($row=mysqli_fetch_assoc($result)){

                                    $child_img=$row['child_image'];
                                    $child_name=$row['child_name'];
                                    $orphanage_name=$row['orphanage_name'];
                                    $orphanage_id=$row['orphanage_id'];
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
                                            <h4 style="font-weight:700;"><?php echo $child_name ?></h4>
                                        </a>
                                        <a href="#">
                                            <h4 style="font-weight:700;"><?php echo $orphanage_name ?></h4>
                                        </a>
                                        <span style="font-weight:700;"><?php $part = explode('-', $date); echo $part[2]."-".$part[1]."-".$part[0]." | " .$time ?></span>
                                    </div>
                                </li>

                                <?php 
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                        <div style="text-align:center">
                                <a href="foster_appointments.php" style="font-weight:700; margin-top:50px">See All</a>
                            </div>
                    </div>



                </div>
                <div class="col-md-5 pull-right"
                    style="padding-top:30px;margin-bottom:100px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); padding:50px;">
                    <div class="side-bar-widget">
                        <div class="single-sidebar-widget popular-post">
                            <h3 class="title">Foster Process</h3>
                            <hr>
                            <ul>
                               
                                <li>
                                    <div class="content-box" style="font-weight:700;">
                                        <span>1. Set up a meeting with the orphanage to meet the children you want to
                                        foster.</span>

                                    </div>
                                </li>
                                <li>
                                    <div class="content-box" style="font-weight:700;">
                                        <span>2. Visit the orphanage at the scheduled time and spend time with the
                                            children.</span>

                                    </div>
                                </li>
                                <li>
                                    <div class="content-box" style="font-weight:700;">
                                        <span>3. If you are happy with your choice, the orphanage will visit your home
                                            with your approved child.</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="content-box" style="font-weight:700;">
                                        <span>4. Then, you will be asked to complete all the necessary forms to complete
                                            the foster.</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Donate   -->
    <section class="overlay-white sec-padding parallax-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 promote-project text-center">
                    <h3>Save Children</h3>
                    <div class="sec-title colored text-center">
                        <span class="decor">
                            <span class="inner"></span>
                        </span>
                    </div>
                    <h2>Become a part of a greater cause</h2>
                    <p>Providing a home where infants are brought up to serve as alternative actors in welfare,
                        development and to save the failed role of the state in child protection</p>
                        <?php include_once("./templates/donation_form.php");?>
                     <a href="#modal-donate-now" data-toggle="modal" class="thm-btn inverse">Donate Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Donate  -->



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