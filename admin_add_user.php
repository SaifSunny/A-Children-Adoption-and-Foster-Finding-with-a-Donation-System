<?php
include_once("./database/config.php");

session_start();

$username = $_SESSION['adminname'];

if (!isset($_SESSION['adminname'])) {
    header("Location: admin_login.php");
}

$sql = "SELECT * FROM `admin` WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$img=$row['admin_img'];

$_SESSION['admin_id'] = $row['admin_id'];

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $username = $_POST['username'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $blood_group = $_POST['blood_group'];


    $p = $_POST['password'];
    $error = "";
    $cls="";
 
    $name = $_FILES['file']['name'];
    $target_dir = "img/users/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    if (strlen($p) > 5) {
    
        $query = "SELECT * FROM users WHERE username = '$username'";
        $query_run = mysqli_query($conn, $query);
        if (!$query_run->num_rows > 0) {

            $query = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
            $query_run = mysqli_query($conn, $query);
            if(!$query_run->num_rows > 0){

                // Check extension
                if( in_array($imageFileType,$extensions_arr) ){

                    // Upload file
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){

                        // Convert to base64 
                        $image_base64 = base64_encode(file_get_contents('img/users/'.$name));
                        $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

                        // Insert record

                        $query2 = "INSERT INTO users(username ,email,`password`,firstname,lastname,contact,gender,birthday,user_img, `address`, city, zip, blood_group)
                        VALUES ('$username', '$email', '$password', '$firstname', '$lastname', '$contact', '$gender', '$birthday', '$name', '$address', '$city', '$zip', '$blood_group')";
                        $query_run2 = mysqli_query($conn, $query2);
            
                        if ($query_run2) {
                            $cls="success";
                            $error = "users Successfully Added.";
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
                $error = "users Already Exists";
            }
            
        }else{
            $cls="danger";
            $error = "usersname Already Exists";
        }
    }else{
        $cls="danger";
        $error = 'Password has to be minimum of 6 charecters.';
    }
   
}

?>


<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
  <meta charset="UTF-8">
  <title>Add Users</title>

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
          <h2>Add Users</h2>
          <span class="decor"><span class="inner"></span></span>
        </div>
      </div>
    </div>
  </section>

  <section class="blog-home blog-page blog-details">
    <div class="container">
      <form action="" method="POST" enctype='multipart/form-data'>
        <div class="row" style="padding-top:30px;margin-bottom:90px;">
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
              <h4 class="card-title">Add Users</h4>
              <div class="card-body" style="padding:0 60px;">

                <div class="alert alert-<?php echo $cls;?>">
                  <?php 
                      if (isset($_POST['submit'])){
                        echo $error;
                      }?>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">First Name</label>
                      <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">Last Name</label>
                      <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">Gender</label>
                      <select class="form-control" name="gender" id="gender" placeholder="Gender" required>
                        <option>-- Select Gender --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">Birthday</label>
                      <input type="date" class="form-control" name="birthday" id="birthday" placeholder="Birthday">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">Blood Group</label>
                      <input type="text" class="form-control" name="blood_group" id="blood_group"
                        placeholder="Blood Group">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">Contact</label>
                      <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">Email</label>
                      <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">Username</label>
                      <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">Password</label>
                      <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">Address</label>
                      <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">City</label>
                      <input type="text" class="form-control" name="city" id="city" placeholder="City">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" style="padding:10px">
                      <label style="padding-bottom:10px;">Zip</label>
                      <input type="text" class="form-control" name="zip" id="zip" placeholder="Zip">
                    </div>
                  </div>
                </div>


                <div class="d-flex justify-content-end" style="padding-top:20px;">
                  <button type="submit" name="submit" class="btn btn-success" style="margin-right:10px;"><i
                      class="fas fa-plus-square"></i>&nbsp;&nbsp;Add
                    users</button>
                  <a href="admin_userss.php" class="btn btn-primary">Go Back</a>
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