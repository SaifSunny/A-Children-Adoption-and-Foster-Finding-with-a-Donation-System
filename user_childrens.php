<?php
include_once("./database/config.php");

session_start();

$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header("Location: user_login.php");
}

$orphanage_id = $_GET['orphanage_id'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Orphanage Childrens</title>

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
					<h2>Childrens</h2>
					<ul class="breadcumb">
						<li><a href="user_home.php">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><a href="user_orphanages.php">Orphanage</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><span>Childrens</span></li>
					</ul>
					<span class="decor"><span class="inner"></span></span>
				</div>
			</div>
		</div>
	</section>


	<section class="blog-home sec-padding blog-page">
		<div class="container">
			<div class="row">
				<div class="col-md-8 pull-left">

					<?php
                        $sql = "SELECT * FROM for_adoption WHERE orphanage_id='$orphanage_id' AND adopted=0";
                        $result = mysqli_query($conn, $sql);
                        
                        if($result){
                            while($row=mysqli_fetch_assoc($result)){

								$child_id =$row['child_id'];
								$child_img=$row['child_img'];
								$child_name	=$row['child_name'];
								$age=$row['age'];
								$gender=$row['gender'];
								$birthday=$row['birthday'];
								$background=$row['background'];
								$religion=$row['religion'];
								$hobby=$row['hobby'];

                    ?>
					<div class="col-md-6">
						<div class="single-blog-post">
							<div class="img-box">
								<a href="#"><img src="img/children/<?php echo $child_img?>" alt="" width="350px"></a>
							</div>
							<div class="content-box">
								<div class="date-box">
									<div class="inner">
										<div class="date">
											<b><?php echo $age?></b> Age
										</div>
									</div>
								</div>
								<div class="content">
									<a href="#">
										<h3><?php echo $child_name?></h3>
									</a>

									<p>
										<h5>Gender: <?php echo $gender?></h5>
										<h5>Religion: <?php echo $religion?></h5>
										<h5>Hobby: <?php echo $hobby?></h5>
									</p>
									<p>
										<?php echo $background?>
									</p>

								</div>
								<div style="padding-top:20px;padding-left:20px;">
									<a href="user_book_meeting.php?orphanage_id=<?php echo $orphanage_id?>&child_id=<?php echo $child_id?>" class="thm-btn btn-xs">Set a Meeting with the child</a>
								</div>
							</div>
						</div>
					</div>
					<?php
                            }
                        }
                    ?>

					<!--Pagination
					<div class="pager-outer clearfix mt_30 mb_0">
						<ul class="pagination mb_0">
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li class="active"><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">-</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>-->
				</div>
				<div class="col-md-4 pull-right">
					<div class="side-bar-widget">

						<div class="single-sidebar-widget category">
							<h3 class="title">Age</h3>
							<ul>
								<li><a href="user_children_sort.php?orphanage_id=<?php echo $orphanage_id?>&age=2">0-2
										Years</a></li>
								<li><a href="user_children_sort.php?orphanage_id=<?php echo $orphanage_id?>&age=4">2-4
										Years</a></li>
								<li><a href="user_children_sort.php?orphanage_id=<?php echo $orphanage_id?>&age=6">4-6
										years</a></li>
								<li><a href="user_children_sort.php?orphanage_id=<?php echo $orphanage_id?>&age=8">6-8
										Years</a></li>
								<li><a href="user_children_sort.php?orphanage_id=<?php echo $orphanage_id?>&age=10">8-10
										Years</a></li>
							</ul>
						</div>
						<div class="single-sidebar-widget popular-post">
							<h3 class="title">Recently Adopted</h3>
							<ul>
								<?php
									$sql = "SELECT * FROM for_adoption WHERE adopted=1 ORDER BY child_id DESC LIMIT 6";
									$result = mysqli_query($conn, $sql);
									
									if($result){
										while($row=mysqli_fetch_assoc($result)){

											$child_id =$row['child_id'];
											$child_img=$row['child_img'];
											$child_name	=$row['child_name'];
											$orphanage_id	=$row['orphanage_id'];
											$orphanage_name	=$row['orphanage_name'];
											$age=$row['age'];
											$post_date=$row['post_date'];

								?>
								<li>
									<div class="img-box">
										<div class="inner-box">
											<img src="img/children/<?php echo $child_img?>" alt="">
										</div>
									</div>
									<div class="content-box">
										<a href="user_childrens.php?orphanage_id=<?php echo $orphanage_id?>">
											<h4 style="font-weight:700;"><?php echo $child_name?></h4>
										</a>
										<a href="user_orphanage_details.php?orphanage_id=<?php echo $orphanage_id?>">
											<h4 style="font-weight:700;"><?php echo $orphanage_name?></h4>
										</a>
										<span style="font-weight:700;"><?php echo $post_date?></span>
									</div>
								</li>
								<?php
										}
									}
								?>
							</ul>
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