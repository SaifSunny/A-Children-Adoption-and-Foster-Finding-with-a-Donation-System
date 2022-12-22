<?php
include_once("./database/config.php");

session_start();

$username = $_SESSION['adminname'];

if (!isset($_SESSION['adminname'])) {
    header("Location: admin_login.php");
}

$sql = "SELECT * FROM admin WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$image=$row['admin_img'];

$_SESSION['image'] = $image;
$_SESSION['admin_id'] = $row['admin_id'];
$_SESSION['username'] = $row['username'];
$zip = $row['zip'];
$uid = $row['admin_id'];
?>

<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <meta charset="UTF-8">
    <title>Admin Home</title>

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
    <?php include_once("./templates/admin_header.php");?>
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
            <div class="row px-4" style="">
                <div class="col-md-3">
                    <div class="card mx-auto"
                        style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                        <h5 class="card-title" style="font-family:poppins;color:black;font-size:20px">Users</h5>
                        <div class="card-body" style="text-align:center; font-size:18px;">
                            <?php
                                    $sql = "SELECT * from users";
                                    $result = mysqli_query($conn, $sql);
                                    $row_cnt = $result->num_rows;
                                ?>
                            <h1 style="font-family:poppins;color:black;"><?php echo $row_cnt?></h1>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mx-auto"
                        style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                        <h5 class="card-title" style="font-family:poppins;color:black;font-size:20px">Fosters</h5>
                        <div class="card-body" style="text-align:center; font-size:18px;">
                            <?php
                                    $sql = "SELECT * from foster WHERE `verified`='1' ";
                                    $result = mysqli_query($conn, $sql);
                                    $row_cnt = $result->num_rows;
                                ?>
                            <h1 style="font-family:poppins;color:black;"><?php echo $row_cnt?></h1>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mx-auto"
                        style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                        <h5 class="card-title" style="font-family:poppins;color:black;font-size:20px">Orphanage</h5>
                        <div class="card-body" style="text-align:center; font-size:18px;">
                            <?php
                                    $sql = "SELECT * from orphanage WHERE `verified`='1'";
                                    $result = mysqli_query($conn, $sql);
                                    $row_cnt = $result->num_rows;
                                ?>
                            <h1 style="font-family:poppins;color:black;"><?php echo $row_cnt?></h1>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mx-auto"
                        style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                        <h5 class="card-title" style="font-family:poppins;color:black;font-size:20px">Donations</h5>
                        <div class="card-body" style="text-align:center; font-size:18px;">
                            <?php
                                    $sql = "SELECT * from donations";
                                    $result = mysqli_query($conn, $sql);
                                    $row_cnt = $result->num_rows;
                                ?>
                            <h1 style="font-family:poppins;color:black;"><?php echo $row_cnt?></h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="padding-top:30px;margin-bottom:70px;">
                <div class="col-md-8">
                    <div class="card mx-auto"
                        style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                        <h3 class="card-title" style="padding-bottom:20px;color:#222;font-weight:600;">Recent Fosters
                        </h3>
                        <div class="card-body" style="padding:20px 40px; text-align:left;font-size:18px;">
                            <table class="table" style="color:#222;">
                                <thead>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>NID No.</th>
                                    <th>Gender</th>
                                    <th>Contact</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM foster ORDER BY foster_id DESC LIMIT 10;";
                                        $result = mysqli_query($conn, $sql);
                                        if($result){
                                            while($row=mysqli_fetch_assoc($result)){
                                                                
                                                $name=$row['firstname']. " ".$row['lastname'];
                                                $id=$row['foster_id'];
                                                $nid=$row['nid'];
                                                $gender=$row['gender'];
                                                $birthday=$row['birthday'];
                                                $address=$row['address'].",".$row['city'].",".$row['zip'];
                                                $contact=$row['contact'];
                                                $email=$row['email'];
                                                $verified=$row['verified'];
                                                $image=$row['foster_img'];

                                            
                                            if($verified == 1){
                                                $type = "success";
                                                $msg = "Verified";
                                            }else{
                                                $type = "danger";
                                                $msg = "Unverified";
                                            }
                                    ?>

                                    <tr>
                                    <td><img src="./img/foster/<?php echo $image ?>" style="width:40px;border-radius: 50%;"
                        alt="profile"> <span style="padding-left:20px;"></span></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $nid ?></td>
                                        <td><?php echo $gender ?></td>
                                        <td><?php echo $contact ?></td>
                                        <td style="font-size:14px; font-weight:600;"><button
                                                style="border-radius: 40px; padding:5px 14px; font-size:10px; font-weight:600"
                                                class="btn btn-<?php echo $type?>"><?php echo $msg?></button></td>
                                    </tr>
                                    <?php 
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                        <div style="text-align:center">
                            <a href="admin_fosters.php" style="font-weight:700;margin-top:50px;">See All</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mx-auto"
                        style="text-align:center;padding:30px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                        <h3 class="title" style="font-family:poppins;color:black;">Recent Users</h3>
                        <div class="card-body" style="padding:20px 40px; text-align:left;font-size:18px;">
                            <table class="table">
                                <tbody>
                                    <?php 
                                        $sql = "SELECT DISTINCT `name`, `role`, `image` FROM logged ORDER BY sl DESC LIMIT 8;";
                                        $result = mysqli_query($conn, $sql);
                                        if($result){
                                            while($row=mysqli_fetch_assoc($result)){
                                                                
                                                $name=$row['name'];
                                                $image=$row['image'];
                                                $role=$row['role'];

                                                if($role=="Admin"){
                                                $path= "img/admin";
                                                }
                                                elseif ($role=="Orphanage"){
                                                $path= "img/orphanages";
                                                }
                                                
                                                elseif ($role=="foster"){
                                                $path= "img/foster";
                                                }
                                                else{
                                                $path= "img/users";
                                                }
                                                echo '<tr>
                                                <td style="font-size:14px; font-weight:600; "> <img src="./'.$path.'/'.$image.'" style="width:40px;border-radius: 20%;" alt="profile"> <span style="padding-left:20px;">'.$name.'</span></td>
                                                <td style="font-size:14px; font-weight:600; color:#bbb; padding-top:10px;">'.$role.'</td>
                                                </tr>';
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div style="text-align:center">
                                <a href="#" style="font-weight:700; margin-top:50px">See All</a>
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