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
$orphanage_name = $row['orphanage_name'];


?>

<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
  <meta charset="UTF-8">
  <title>Adopted</title>

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
          <h2>Adopted</h2>
          <span class="decor"><span class="inner"></span></span>
        </div>
      </div>
    </div>
  </section>

  <section class="blog-home blog-page blog-details">
    <div class="container">
      <div class="row" style="margin-bottom:90px;">
        <div class="col-md-12">
          <div class="card mx-auto"
            style="text-align:center;padding-top:30px;padding-bottom:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); color:#222;">
            <h4 style="padding:30px;">Adopted</h4>

            <div class="card-body text-center" style="padding:0 60px;">
              <table class="table" style="font-size: 14px;">
                <thead>
                  <th>Image</th>
                  <th>Child Name</th>
                  <th>Age</th>
                  <th>Gender</th>
                  <th>Birthday</th>
                  <th>Religion</th>
                  <th>Hobby</th>
                  <th>Background</th>
                </thead>

                <tbody>
                  <?php 
                      $sql = "SELECT * FROM for_adoption WHERE `orphanage_id`= $orphanage_id AND adopted='1'";
                      $result = mysqli_query($conn, $sql);
                      if($result){
                        while($row=mysqli_fetch_assoc($result)){

                          $child_img=$row['child_img'];
                          $child_name=$row['child_name'];
                          $age=$row['age'];
                          $birthday=$row['birthday'];
                          $gender=$row['gender'];
                          $religion=$row['religion'];
                          $hobby=$row['hobby'];
                          $background=$row['background'];
                          $child_id=$row['child_id'];
                    ?>
                  <tr>
                    <td><img src="./img/children/<?php echo $child_img ?>" style="width:50px;border-radius: 20%;"
                        alt="profile"> <span style="padding-left:20px;"></span></td>
                    <td><?php echo $child_name ?></td>
                    <td><?php echo $age ?></td>
                    <td><?php echo $gender ?></td>
                    <td><?php echo $birthday ?></td>
                    <td><?php echo $religion ?></td>
                    <td><?php echo $hobby ?></td>
                    <td><?php echo $background ?></td>

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