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
  <title>Donations</title>

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
          <h2>Donations</h2>
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
            style="padding-top:30px;padding-bottom:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); color:#222;">
            <h3 style="padding:30px;">Donations</h3>

            <div class="card-body text-center" style="padding:0 60px;">
              <table class="table " style="font-size: 14px;">
                <thead class="text-center">
                  <th>Donation ID</th>
                  <th>Donner Name</th>
                  <th>Amount</th>
                  <th>Donation Recieved Date</th>
                </thead>

                <tbody>
                  <?php 

                        $sql1 = "SELECT * FROM donations WHERE `donation_reciever_id`= $orphanage_id";
                        $result1 = mysqli_query($conn, $sql1);
                        $row_cnt = $result1->num_rows;

                        $sql2 = "SELECT SUM(donation_amount) as total FROM donations WHERE `donation_reciever_id`= $orphanage_id";
                        $result2 = mysqli_query($conn, $sql2);
                        $row = mysqli_fetch_assoc($result2);
                        $sum = $row['total'];

                      $sql = "SELECT * FROM donations WHERE `donation_reciever_id`= $orphanage_id";
                      $result = mysqli_query($conn, $sql);
                      if($result){
                        while($row=mysqli_fetch_assoc($result)){

                          $donation_id=$row['donation_id'];
                          $doner_name=$row['doner_name'];
                          $donation_amount=$row['donation_amount'];
                          $date=$row['date'];
                    ?>
                  <tr style="font-size: 14px;">
                    <td><?php echo $donation_id ?></td>
                    <td><?php echo $doner_name ?></td>
                    <td><?php echo $donation_amount ?></td>
                    <td><?php echo $date ?></td>
                  </tr>
                  <?php 
                        }
                      }
                    ?>
                </tbody>
              </table>
              <div style="text-align:right; padding-top:30px;;">
                <div>
                  <h4><span style="margin-right:60px;">Total Donations: <?php echo $row_cnt ?></span> <span>Total
                      Donations Ammount: <?php echo $sum ?></span>
                  </h4>
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