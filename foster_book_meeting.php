<?php
include_once("./database/config.php");

session_start();

$username = $_SESSION['fostername'];

if (!isset($_SESSION['fostername'])) {
    header("Location: foster_login.php");
}

$orphanage_id = $_GET['orphanage_id'];
$child_id = $_GET['child_id'];

$foster_id = $_SESSION['foster_id'];


if(isset($_POST['submit'])){

    $time = $_POST['time'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $message = $_POST['message'];
  
    $query = "SELECT * FROM foster_meetings WHERE foster_id = '$foster_id' AND child_id = '$child_id' AND `date` = '$date' AND `time` = '$time'";
    $query_run = mysqli_query($conn, $query);
    if(!$query_run->num_rows > 0){

        $query = "SELECT * FROM foster_meetings WHERE child_id = '$child_id' AND `date` = '$date' AND `time` = '$time'";
        $query_run = mysqli_query($conn, $query);
        if(!$query_run->num_rows > 0){
            $query2 = "INSERT INTO foster_meetings(`foster_id`, orphanage_id, child_id, foster_image, orphanage_image, child_image, `foster_name`, orphanage_name, child_name, `date`, `time`, `message`, contact, email)
            VALUES ('$foster_id', '$orphanage_id', '$child_id',(SELECT `foster_img` FROM foster WHERE foster_id='$foster_id'), (SELECT `orphanage_img` FROM orphanage WHERE orphanage_id='$orphanage_id'),
            (SELECT `child_img` FROM for_foster WHERE child_id='$child_id'), '$username', (SELECT `orphanage_name` FROM orphanage WHERE orphanage_id='$orphanage_id'),(SELECT `child_name` FROM for_foster WHERE child_id='$child_id'), '$date', '$time','$message','$contact','$email')";
            $query_run2 = mysqli_query($conn, $query2);
                    
            if ($query_run2) {
              $cls="success";
              $error = "Meeting Successfully Placed.";
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
    }else{
        $cls="danger";
        $error ="Meeting Already Placed.";
    }
  
  
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Book Meeting</title>

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


	<section class="inner-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 sec-title colored text-center">
					<h2>Childrens</h2>
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
                    <input name="date" id="date" type="date" class="form-control" placeholder="dd/mm/yyyy" required>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="time">Meeting Time</label>
                    <input name="time" id="time" type="time" class="form-control" placeholder="Time" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="Email" required>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="contact">Contact No.</label>
                    <input name="contact" id="contact" type="Number" class="form-control" placeholder="Contact Number"
                      required>
                  </div>
                </div>
              </div>
              <div class="form-group-2 mb-4">
                <label for="time">Message</label>
                <textarea name="message" id="message" class="form-control" rows="6"
                  placeholder="Your Message"></textarea>
              </div>

              <button class="thm-btn btn-xs" type="submit" name="submit" style="margin-top:40px;">Make Appoinment<i
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