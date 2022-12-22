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

$image = $row['user_img'];
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$gender=$row['gender'];
$birthday=$row['birthday'];
$blood_group=$row['blood_group'];
$contact=$row['contact'];
$address=$row['address'];
$city=$row['city'];
$zip=$row['zip'];

if (isset($_POST['submit_img'])) {

    $error = "";
    $cls="";
 
    $name = $_FILES['file']['name'];
    $target_dir = "img/users/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){

        // Upload file
        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){

            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents('img/users/'.$name));
            $image = 'data:img/'.$imageFileType.';base64,'.$image_base64;

            // Update Record
            $query2 = "UPDATE users SET `user_img`='$name' WHERE username='$username'";
            $query_run2 = mysqli_query($conn, $query2);

            $query3 = "UPDATE `logged` SET `image`='$name' WHERE `name`='$username'";
            $query_run3 = mysqli_query($conn, $query3);

            if ($query_run2 && $query_run3) {
                echo "<script> alert('Profile Image Successfully Updated.');
                window.location.href='user_home.php';</script>";
            } 
            else {
                $cls="danger";
                $error = "Cannot Update Profile Image";
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

if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender=$_POST['gender'];
    $birthday=$_POST['birthday'];
    $blood_group=$_POST['blood_group'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];

    $error = "";
    $cls="";

        // Update Record
        $query2 = "UPDATE users SET firstname='$firstname',lastname='$lastname',
        birthday='$birthday', blood_group='$blood_group', gender='$gender', contact='$contact',
        `address`='$address', city='$city', zip='$zip' WHERE username='$username'";
        $query_run2 = mysqli_query($conn, $query2);
        
        if ($query_run2) {
            $cls="success";
            $error = "Profile Successfully Updated.";
        } 
        else {
            $cls="danger";
            $error = "Cannot Update Profile";
        }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Profile</title>

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
                    <h2>My Profile</h2>
                    <ul class="breadcumb">
                        <li><span>My Profile</span></li>
                    </ul>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>


    <section class="blog-home blog-page">
        <div class="container">
            <div class="row" style="padding-top:30px;">
                <div class="col-md-4">
                    <div class="card mx-auto"
                        style="text-align:center;padding-top:30px;padding-bottom:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                        <h4 class="card-title" style="padding-bottom:20px;">Profile Image</h4>
                        <div class="card-body">
                            <form action="" method="POST" enctype='multipart/form-data' style="margin-bottom:50px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12" style="width: 200px; height: 200px;">
                                            <img src="./img/users/<?php echo $image ?>" width="100%" height="100%"
                                                style="text-align:center; margin-left:85px;">
                                        </div>
                                        <div class="col-md-12" style="padding-top:20px;">
                                            <label for="file" class="form-label">Profile Image</label>
                                            <div class="d-flex justify-content-center"
                                                style="padding-top:10px; padding-left:30px;">
                                                <input type="file" name="file" id="file" style="padding-left:40px;">

                                            </div>

                                            <div class="d-flex justify-content-center" style="padding-top:10px;">
                                                <button type="submit_img" name="submit_img" class="btn btn-success"
                                                    style="margin-top:10px;"><i class="fa fa-edit"></i> Update
                                                    Image</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mx-auto"
                        style="text-align:center;padding:50px 0px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); ">
                        <h4 class="card-title">My Profile</h4>
                        <div class="card-body" style="padding:0 40px;padding-bottom:50px;">
                            <form action="" method="POST">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-<?php echo $cls;?>">
                                            <?php 
                                                    if (isset($_POST['submit']) || isset($_POST['submit_img'])){
                                                        echo $error;
                                                }?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="padding:10px">
                                            <label style="padding-bottom:10px;">First Name</label>
                                            <input type="text" class="form-control" name="firstname" id="firstname"
                                                value="<?php echo $firstname ?>" placeholder="Firstname" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="padding:10px">
                                            <label style="padding-bottom:10px;">Last Name</label>
                                            <input type="text" class="form-control" name="lastname" id="lastname"
                                                value="<?php echo $lastname ?>" placeholder="Lastname" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="padding:10px">
                                            <label style="padding-bottom:10px;">Date of Birth</label>
                                            <input type="date" class="form-control" name="birthday" id="birthday"
                                                value="<?php echo $brithday ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="padding:10px">
                                            <label style="padding-bottom:10px;">Contact</label>
                                            <input type="text" class="form-control" name="contact" id="contact" value="<?php echo $contact ?>"
                                                placeholder="Contact" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="padding:10px">
                                            <label style="padding-bottom:10px;">Gender</label>
                                            <input type="text" class="form-control" name="gender" id="gender" value="<?php echo $gender ?>"
                                                placeholder="Gender" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="padding:10px">
                                            <label style="padding-bottom:10px;">Blood Group</label>
                                            <input type="text" class="form-control" name="blood_group" id="blood_group"
                                                value="<?php echo $blood_group ?>" placeholder="Blood Group" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" style="padding:10px">
                                            <label style="padding-bottom:10px;">Address</label>
                                            <input type="text" class="form-control" name="address" id="address" value="<?php echo $address ?>"
                                                placeholder="Address" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="padding:10px">
                                            <label style="padding-bottom:10px;">City</label>
                                            <input type="text" class="form-control" name="city" id="city" value="<?php echo $city ?>"
                                                placeholder="City" required>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="padding:10px">
                                            <label style="padding-bottom:10px;">Zip</label>
                                            <input type="text" class="form-control" name="zip" id="zip" value="<?php echo $zip ?>"
                                                placeholder="Zip" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" style="padding-top:10px;">
                                    <button type="submit" name="submit" class="btn btn-success"
                                        style="margin-right:10px;"><i class="fa fa-edit"></i> Update</button>
                                </div>

                            </form>

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