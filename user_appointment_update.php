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
$meeting_id = $_GET['id'];

$_SESSION['image'] = $image;
$_SESSION['user_id'] = $row['user_id'];
$_SESSION['username'] = $row['username'];
$zip = $row['zip'];
$user_id = $row['user_id'];


$sql = "SELECT * FROM `adoption_meetings` WHERE meeting_id='$meeting_id'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$time=$row['time'];
$date=$row['date'];
$email = $row['email'];
$contact = $row['contact'];
$message = $row['message'];
$child_id = $row['child_id'];

if(isset($_POST['submit'])){

  $time = $_POST['time'];
  $date = $_POST['date'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $message = $_POST['message'];


      $query = "SELECT * FROM adoption_meetings WHERE child_id = '$child_id' AND `date` = '$date' AND `time` = '$time'";
      $query_run = mysqli_query($conn, $query);
      if(!$query_run->num_rows > 0){
          $query2 = "UPDATE adoption_meetings SET `date`='$date', `time`='$time', `message`='$message', contact='$contact', email='$email' WHERE meeting_id=$meeting_id";
          $query_run2 = mysqli_query($conn, $query2);
                  
          if ($query_run2) {
            $cls="success";
            $error = "Meeting Successfully Updated.";
          } 
          else {
            $cls="danger";
            $error = mysqli_error($conn);
          }
      }
      else{
          $cls="danger";
          $error ="Schedule Not Free. Select Another time.";
      }


}
?>

<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
  <meta charset="UTF-8">
  <title>Update Meeting</title>

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
          <h2>Update Meeting</h2>
          <span class="decor"><span class="inner"></span></span>
        </div>
      </div>
    </div>
  </section>


  <section class="blog-home blog-page">
    <div class="container">
      <div class="row" style="margin-bottom:90px;color:#222;">
        <div class="col-lg-12">
          <div class="mt-5 mt-lg-0 pl-lg-5">
            <form id="" class="appoinment-form" method="post" action="">
              <div class="alert alert-<?php echo $cls;?>">
                <?php 
                  if (isset($_POST['submit'])){
                    echo $error;
                  }?>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="date">Meeting Date</label>
                    <input name="date" id="date" type="date" class="form-control" placeholder="dd/mm/yyyy"
                      value="<?php echo $date?>" required>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="time">Meeting Time</label>
                    <input name="time" id="time" type="time" class="form-control" placeholder="Time"
                      value="<?php echo $time?>" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="Email"
                      value="<?php echo $email?>" required>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="contact">Contact No.</label>
                    <input name="contact" id="contact" type="Number" class="form-control" placeholder="Contact Number"
                      value="<?php echo $contact?>" required>
                  </div>
                </div>
              </div>
              <div class="form-group-2 mb-4">
                <label for="time">Message</label>
                <textarea name="message" id="message" class="form-control" rows="6"
                  placeholder="Your Message"><?php echo $message?></textarea>
              </div>

              <button class="thm-btn btn-xs" type="submit" name="submit" style="margin-top:40px;">Update Appoinment<i
                  class="icofont-simple-right ml-2"></i></button>
            </form>
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