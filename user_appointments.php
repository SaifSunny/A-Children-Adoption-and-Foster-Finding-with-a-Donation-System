<?php
include_once("./database/config.php");

session_start();

$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
  header("Location: user_login.php");
}

$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$image=$row['user_img'];

$_SESSION['image'] = $image;
$_SESSION['user_id'] = $row['user_id'];
$_SESSION['username'] = $row['username'];
$zip = $row['zip'];
$user_id = $row['user_id'];
?>

<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
  <meta charset="UTF-8">
  <title>Manage Meetings</title>

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

  <section class="inner-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12 sec-title colored text-center">
          <h2>Manage Meetings</h2>
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
            <h4 style="padding:30px;">My Meetings</h4>
            <div class="card-body text-center" style="padding:0 60px;">
              <table class="table" style="font-size: 14px;">
                <thead>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Orphanage Name</th>
                  <th>Meeting Time</th>
                  <th>Contact</th>
                  <th>Action</th>
                </thead>

                <tbody>
                  <?php 
                      $sql = "SELECT * FROM adoption_meetings WHERE user_id=$user_id";
                      $result = mysqli_query($conn, $sql);
                      if($result){
                        while($row=mysqli_fetch_assoc($result)){

                          $child_img=$row['child_image'];
                          $child_name=$row['child_name'];
                          $orphanage_name=$row['orphanage_name'];
                          $orphanage_id=$row['orphanage_id'];
                          $date=$row['date'];
                          $contact=$row['contact'];
                          $time=$row['time'];
                          $meeting_id=$row['meeting_id'];

                    ?>
                  <tr>
                    <td><img src="./img/children/<?php echo $child_img ?>" style="width:50px;border-radius: 20%;"
                        alt="profile"> <span style="padding-left:20px;"></span></td>
                    <td><?php echo $child_name ?></td>
                    <td><?php echo $orphanage_name ?></td>
                    <td><?php $part = explode('-', $date); echo $part[2]."-".$part[1]."-".$part[0]." ".$time ?></td>
                    <td><?php echo $contact ?></td>
                    <td>
                      <a href="user_appointment_update.php?id=<?php echo $meeting_id?>" class="btn btn-success">Update</a>
                      <a href="user_delete_appointment.php?id=<?php echo $meeting_id?>" class="btn btn-danger">Delete</a>
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