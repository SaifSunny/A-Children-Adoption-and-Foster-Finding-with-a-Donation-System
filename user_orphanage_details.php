<?php
include_once("./database/config.php");

session_start();

$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header("Location: user_login.php");
}

$orphanage_id = $_GET['orphanage_id'];

	$sql = "SELECT * FROM orphanage WHERE orphanage_id='$orphanage_id'";
	$result = mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);

    $orphanage_id =$row['orphanage_id'];
    $orphanage_img=$row['orphanage_img'];
    $orphanage_name	=$row['orphanage_name'];
    $about=$row['about'];
    $email=$row['email'];
    $contact=$row['contact'];
    $address=$row['address'];
    $city=$row['city'];
    $zip=$row['zip'];

    
    $query1 = "SELECT child_id from for_adoption WHERE orphanage_id=$orphanage_id AND adopted=0";
    $result1 = mysqli_query($conn, $query1);
    $row_cnt1 = $result1->num_rows;

    $query = "SELECT child_id from for_adoption WHERE orphanage_id=$orphanage_id AND adopted=1";
    $result = mysqli_query($conn, $query1);
    $row_cnt = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Orphanage Details</title>

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
    <!-- donation  -->
    <?php include_once("./templates/donation_form.php");?>
    <!-- donation  -->

    <section class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 sec-title colored text-center">
                    <h2>Orphanage Details</h2>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>


    <section class="event-feature sec-padding ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="featured-causes">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="thumb">
                                    <img class="full-width" src="img/orphanages/<?php echo $orphanage_img?>" alt="">
                                </div>
                                <h2 class="text-black mb_20"><?php echo $orphanage_name?></h2>
                                <ul class="list-inline">
                                    <li class="causes-goal">CHILDREN FOR ADOPTION: <?php echo $row_cnt1?></li>
                                    <li class="causes-goal">ADOPTED: <?php echo $row_cnt?></li>
                                </ul>
                                <div style="margin-top:20px;">
                                    <div class="pull-left">
                                        <a class="thm-btn btn-xs" data-toggle="modal" href="#modal-donate-now">Donate Now</a>
                                        <a class="thm-btn inverse btn-xs"
                                            href="user_childrens.php?orphanage_id=<?php echo $orphanage_id?>">Children
                                            List</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="causes-details clearfix p_30">
                                    <h2 class="text-black mb_20">About the Orphanage</h2>
                                    <p class="p-title font-16 mt_15">Established : 2003</p>

                                    <p class="font-16"><?php echo $about?></p>

                                    <div class="row mt_20">
                                        <div class="col-sm-12">
                                            <p class="p-title font-16 mt_15" style="margin-bottom:5px;">Address : <span
                                                    style="color:#222"><?php echo $address." ".$city ."-". $zip?></p>
                                            <p class="p-title font-16" style="margin-bottom:5px;">Contact : <span
                                                    style="color:#222"><?php echo $contact?></p>
                                            <p class=" p-title font-16">Email : <span
                                                    style="color:#222"><?php echo $email?></span></p>

                                        </div>
                                    </div>

                                </div>
                            </div>
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