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
    <title>Manage Orphanages</title>

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
                    <h2>Manage Orphanages</h2>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-home blog-page blog-details">
    <div class="container">
        <div class="row" style="margin-bottom:60px;">
          <div class="col-md-12">
            <div class="card mx-auto"
              style="text-align:center;padding-top:30px;padding-bottom:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
              <h2 style="padding:30px;color:black;">Manage Orphanages</h2>
              <div class="butt" style="text-align:right; padding-right:70px; padding-bottom:40px;">
                <a href="admin_add_orphanage.php" class="btn btn-success">Add Orphanage</a>
                <a href="admin_verify_orphanage.php" class="btn btn-primary">Verify Orphanage</a>
              </div>
              <div class="card-body text-center" style="padding:0 60px;">
                <table class="table" style="font-size: 14px;color:#222;">
                  <thead>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Registration No.</th>
                    <th>Established</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th col="2">Action</th>
                  </thead>

                  <tbody>
                  <?php 
                      $sql = "SELECT * FROM orphanage WHERE `verified`='1'";
                      $result = mysqli_query($conn, $sql);
                      if($result){
                        while($row=mysqli_fetch_assoc($result)){
                          $name=$row['orphanage_name'];
                          $id=$row['orphanage_id'];
                          $registration_id=$row['registration_id'];
                          $established=$row['established'];
                          $address=$row['address'].",".$row['city'].",".$row['zip'];
                          $contact=$row['contact'];
                          $email=$row['email'];
                          $verified=$row['verified'];
                          $image=$row['orphanage_img'];
                    ?>
                    <tr>
                      <td><img src="./img/orphanages/<?php echo $image ?>" style="width:80px;border-radius: 20%;"
                          alt="profile"> <span style="padding-left:20px;"></span></td>
                      <td><?php echo $name ?></td>
                      <td><?php echo $registration_id ?></td>
                      <td><?php echo $established ?></td>
                      <td><?php echo $contact ?></td>
                      <td><?php echo $email ?></td>
                      <td><?php echo $address ?></td>
                      <td><a href="admin_delete_orphanage.php?id=<?php echo $id ?>" class="btn btn-danger">Delete</a>
                      </td>

                    </tr>
                    <?php 
                        }
                      }
                    ?>
                  </tbody>
                </table>
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