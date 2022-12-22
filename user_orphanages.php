<?php
include_once("./database/config.php");

session_start();

$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header("Location: user_login.php");
}


?>


<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <meta charset="UTF-8">
    <title>Orphanages</title>

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
    <?php include_once("./templates/user_header.php");?>
    <!-- Navigation  -->

    <!-- Donation Form  -->
    <?php include_once("./templates/donation_form.php");?>
    <!-- Donation Form   -->
    <section class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 sec-title colored text-center">
                    <h2>Orphanages</h2>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>


    <section class="recent-causes sec-padding pb_60">
        <div class="container">
            <div class="row">
                <?php
                        $sql = "SELECT * FROM orphanage WHERE `verified`= 1";
                        $result = mysqli_query($conn, $sql);
                        
                        if($result){
                            while($row=mysqli_fetch_assoc($result)){

                                $orphanage_id =$row['orphanage_id'];
                                $orphanage_img=$row['orphanage_img'];
                                $orphanage_name	=$row['orphanage_name'];
                                $about=$row['about'];
                                $city=$row['city'];

                                $query1 = "SELECT child_id from for_adoption WHERE orphanage_id=$orphanage_id AND adopted=0";
                                $result1 = mysqli_query($conn, $query1);
                                $row_cnt1 = $result1->num_rows;
                    ?>
                <div class="col-sm-12 col-md-4 col-lg-4" style="margin-bottom:30px;">
                    <div class="causes " style="height:55rem;">
                        <div class="thumb">
                            <a href="user_orphanage_details.php?orphanage_id=<?php echo $orphanage_id?>"><img class="full-width" alt="" src="img/orphanages/<?php echo $orphanage_img?>"></a>
                        </div>
                        <div class="causes-details clearfix">
                            <h4 class="title"><a href="user_orphanage_details.php?orphanage_id=<?php echo $orphanage_id?>"><?php echo $orphanage_name?></a></h4>
                            <ul class="about-causes list-inline clearfix">
                                <li class="causes-goal" style="padding-right:10px;">Dhaka</li>
                                <li class="causes-goal">CHILDERN FOR ADOPTION: <?php echo $row_cnt1?></li>
                            </ul>
                            <p><?php echo substr($about, 0, 183);?></p>
                            <div>
                                <a href="user_childrens.php?orphanage_id=<?php echo $orphanage_id?>" class="thm-btn btn-xs">Adopt Now</a>
                                <a class="thm-btn inverse btn-xs" data-toggle="modal" href="#modal-donate-now">Donate Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                            }
                        }
                    ?>
      
            </div>
        </div>
    </section>


    <section class="overlay-white sec-padding parallax-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 promote-project text-center">
                    <h3>Save Children From Hunger</h3>
                    <div class="sec-title colored text-center">
                        <span class="decor">
                            <span class="inner"></span>
                        </span>
                    </div>
                    <h2>Become a part of the world</h2>
                    <p>LTo implement a community-involved effort to care for orphaned, abandoned, and vulnerable babies and young children. Ensure every needy child is reached and has access to all their basic needs, including but not limited to education, health, shelter, food, and clothing.

</p>
                    <a href="#" class="thm-btn">Donate Now</a>
                    <a href="#" class="thm-btn inverse">Read More</a>
                </div>
            </div>
        </div>
    </section>



    <!-- Navigation  -->
    <?php include_once("./templates/footer.php");?>
    <!-- Navigation  -->


    <section class="footer-bottom">
        <div class="container text-center">
            <p>Theme Created By <a href="#">TEMPLATE PATH</a> with love</p>
        </div>
    </section>


    <!-- main jQuery -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- bx slider -->
    <script src="js/jquery.bxslider.min.js"></script>
    <!-- owl carousel -->
    <script src="js/owl.carousel.min.js"></script>
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


    <!-- thm custom script -->
    <script src="js/custom.js"></script>



</body>

</html>