<?php

include './database/config.php';
error_reporting(0);

session_start();

if (isset($_SESSION['or_name'])) {
    header("Location: orphange_home.php");
}


if (isset($_POST['signup'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$p = $_POST['password'];
    $error = "";
    $cls="";

    if ($password == $cpassword) {
            if (strlen($p) > 5) {

                $query = "SELECT * FROM orphanage WHERE username = '$username'";
                $query_run = mysqli_query($conn, $query);

                if (!$query_run->num_rows > 0) {
                    $query = "SELECT * FROM orphanage WHERE username = '$username' AND email = '$email'";
                    $query_run = mysqli_query($conn, $query);

                    if(!$query_run->num_rows > 0){
                        $query2 = "INSERT INTO orphanage(username,email,`password`)
                        VALUES ('$username', '$email', '$password')";
                        $query_run2 = mysqli_query($conn, $query2);

                        if ($query_run2) {
                            $_SESSION['or_name'] = $_POST['username'];
                            echo "<script> 
                            alert('Regestration Successfull.');
                            window.location.href='orphanage_profile.php';
                            </script>";
                            
                        } 
                        else {
                            $error = mysqli_error($conn);
                            $cls="danger";

                        }
                    }
                    else{
                        $error = "orphange Already Exists";
                        $cls="danger";
                    }

                } 
                else {
                    $error = "orphangename Already Exists";
                    $cls="danger";

                }
            } 
            else {
                $error =  "Password has to be minimum of 6 charecters";
                $cls="danger";

            }
    } 
    else {
        $error = 'Passwords did not Matched.';
        $cls="danger";

    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Orphanage Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="login/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/login.css">
    
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="#" method="post">
                <h2>Sign Up</h2>
                <div class="<?php echo $cls;?>">
                    <?php 
                        if (isset($_POST['signup'])){
                            echo $error;
                    }?>
                </div>
                <input type="text" name="username" placeholder="username" />
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <input type="password" name="cpassword" placeholder="Confirm Password" />
                <small>By Signing up you agree Our Terms and Condition.</small>
                <button style="margin-top:20px;" type="submit" name="signup">Sign Up</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Already have an Account?</h1>
                    <p>Sign In to start using our services.</p>
                    <button class="ghost" id="signUp"> <a href="orphanage_login.php" style="text-decoration:none;color:white;">Sign In</a></button>
                </div>
            </div>
        </div>
    </div>




</body>

</html>