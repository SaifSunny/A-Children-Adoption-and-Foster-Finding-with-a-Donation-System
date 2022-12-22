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

if(isset($_POST['submit'])){

  $childname = $_POST['childname'];
  $gender = $_POST['gender'];
  $birthday = $_POST['birthday'];
  $age = $_POST['age'];
  $religion = $_POST['religion'];
  $hobby = $_POST['hobby'];
  $background = $_POST['background'];
  $post_date = date("Y/m/d");

  $error = "";
  $cls="";

  $name = $_FILES['file']['name'];
  $target_dir = "img/children/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

          $query = "SELECT * FROM for_foster WHERE child_name = '$childname' AND background = '$background'";
          $query_run = mysqli_query($conn, $query);
          if(!$query_run->num_rows > 0){

              // Check extension
              if( in_array($imageFileType,$extensions_arr) ){

                  // Upload file
                  if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){

                      // Convert to base64 
                      $image_base64 = base64_encode(file_get_contents('img/children/'.$name));
                      $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

                      // Insert record

                      $query2 = "INSERT INTO for_foster(orphanage_id ,orphanage_name,`child_img`,child_name,age,gender,birthday,background, `religion`, hobby, post_date)
                      VALUES ('$orphanage_id', '$orphanage_name', '$name', '$childname', '$age', '$gender', '$birthday', '$background', '$religion', '$hobby', '$post_date')";
                      $query_run2 = mysqli_query($conn, $query2);
          
                      if ($query_run2) {
                          $cls="success";
                          $error = "Child Successfully Added for foster.";
                      } 
                      else {
                          $cls="danger";
                          $error = mysqli_error($conn);
                      }

                  }else{
                      $cls="danger";
                      $error = 'Unknown Error Occurred.';
                  }
              }else{
                  $cls="danger";
                  $error = 'Invalid File Type';
              }
          }
          else{
              $cls="danger";
              $error = "Child Already Exists";
          }
 
}

?>

<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
  <meta charset="UTF-8">
  <title>Add for Foster</title>

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
          <h2>For foster</h2>
          <span class="decor"><span class="inner"></span></span>
        </div>
      </div>
    </div>
  </section>

  <section class="blog-home blog-page blog-details">
    <div class="container">
      <form action="" method="POST" enctype='multipart/form-data'>
        <div class="row" style="padding-top:30px;margin-bottom:90px;color:#222">
          <div class="col-md-4">
            <div class="card mx-auto"
              style="text-align:center;padding-top:50px;padding-bottom:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
              <h4 class="card-title" style="padding-bottom:20px;">Profile Image</h4>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-12" style="width: 200px; height: 200px;">
                      <img src="./img/users/user.png" width="100%" height="100%"
                        style="text-align:center; margin-left:90px;">
                    </div>
                    <div class="col-md-12" style="padding-top:20px;">
                      <label for="file" class="form-label">Profile Image</label>
                      <div class="d-flex justify-content-center" style="padding-top:10px; padding-left:75px;">
                        <input type="file" name="file" id="file">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">

            <div class="card mx-auto"
              style="text-align:center;padding:50px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
              <h4 class="card-title">For Foster</h4>
              <div class="card-body" style="padding:0 60px;">

                <div class="alert alert-<?php echo $cls;?>">
                  <?php 
                      if (isset($_POST['submit'])){
                        echo $error;
                      }?>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">Child Name</label>
                      <input type="text" class="form-control" name="childname" id="childname" placeholder="Child Name">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">Gender</label>
                      <select class="form-control" name="gender" id="gender" placeholder="Gender" required>
                        <option>-- Select Gender --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">Birthday</label>
                      <input type="date" class="form-control" name="birthday" id="birthday" placeholder="Birthday">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">age</label>
                      <input type="text" class="form-control" name="age" id="age" placeholder="Age">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">Religion</label>
                      <input type="text" class="form-control" name="religion" id="religion" placeholder="Religion">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">Hobby</label>
                      <input type="text" class="form-control" name="hobby" id="hobby" placeholder="Hobby">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">Background</label><br>
                      <textarea name="background" id="" cols="90" rows="4"
                        placeholder="Write something about the child.." style="padding:10px;"></textarea>
                    </div>
                  </div>
                </div>


                <div class="d-flex justify-content-end" style="padding-top:20px;">
                  <button type="submit" name="submit" class="btn btn-success" style="margin-right:10px;"><i
                      class="fas fa-plus-square"></i>&nbsp;&nbsp;Put for foster</button>
                  <a href="orphanage_home.php" class="btn btn-primary">Go Back</a>
                </div>


              </div>
            </div>
          </div>


        </div>

      </form>

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