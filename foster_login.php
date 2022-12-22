<?php

include './database/config.php';
error_reporting(0);

session_start();

if (isset($_SESSION['fostername'])) {
    header("Location: foster_home.php");
}

if (isset($_POST['signin'])) {

    $error = "";
    $cls="";

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM foster WHERE username='$username'";
	$result = mysqli_query($conn, $sql);

	if ($result->num_rows > 0) {

        $sql = "SELECT * FROM foster WHERE `password`='$password'";
        $result = mysqli_query($conn, $sql);
    
        if ($result->num_rows > 0) {
            $sql = "SELECT * FROM foster WHERE username='$username' AND password='$password' AND verified='1'";
            $result = mysqli_query($conn, $sql);
        
            if ($result->num_rows > 0) {
                $_SESSION['fostername'] = $_POST['username'];

                $sql = "INSERT INTO logged(`image`, `name`, `role`) VALUES ((SELECT `foster_img` FROM foster WHERE username='$username'), '$username', 'Foster')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    header("Location: foster_home.php");
                }
                
            } else {
                $error="You are Not Verified yet. Plaese try again later.";
                $cls="danger";

            }
    
        } else {
            $error= "Woops! Password is Incorrect.";
            $cls="danger";

        }

	} else {
		$error= "Woops! fostername is Incorrect.";
        $cls="danger";

	}
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Foster Sign In</title>
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
                <h1 style="margin-bottom:20px;">Sign in</h1>
                <div class="<?php echo $cls;?>">
                    <?php 
                        if (isset($_POST['signin'])){
                            echo $error;
                    }?>
                </div>
                <input type="text" name="username" placeholder="username" />
                <input type="password" name="password" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <button type="submit" name="signin">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Dont have an account?</h1>
                    <p>Sign up now and start using our services.</p>
                    <button class="ghost" id="signUp"> <a href="foster_signup.php" style="text-decoration:none;color:white;">Sign Up</a></button>
                </div>
            </div>
        </div>
    </div>




</body>

</html>