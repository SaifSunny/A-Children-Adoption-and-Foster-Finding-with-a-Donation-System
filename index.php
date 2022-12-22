<?php
include_once("./database/config.php");
?>
<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <meta charset="UTF-8">
    <title>FosterCare</title>

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
    <?php include_once("./templates/header.php");?>
    <!-- Navigation  -->

    <!-- Home  -->
    <section class="rev_slider_wrapper">
        <div id="slider1" class="rev_slider">
            <ul>
                <li data-transition="parallaxvertical">
                    <img src="img/slides/1.jpg" alt="" width="1920" height="705" data-bgposition="top center"
                        data-bgfit="cover" data-bgrepeat="no-repeat" >

                    <div class="tp-caption sfl tp-resizeme thm-banner-h1" data-hoffset="0" data-y="top"
                        data-voffset="225" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="o:0"
                        data-transform_out="o:0" data-start="500">
                        To feed and educate!
                    </div>

                    <div class="tp-caption sfr tp-resizeme thm-banner-h1 heavy"  data-hoffset="0"
                        data-y="top" data-voffset="290" data-whitespace="nowrap" data-transform_idle="o:1;"
                        data-transform_in="o:0" data-transform_out="o:0" data-start="1000">
                        We need your support
                    </div>

                    <div class="tp-caption sfb tp-resizeme thm-banner-h3"  data-hoffset="0" data-y="top"
                        data-voffset="368" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="o:0"
                        data-transform_out="o:0" data-start="2000">
                        Become a part, to change the world
                    </div>


                    <div class="tp-caption sfl tp-resizeme"  data-hoffset="0" data-y="top"
                        data-voffset="505" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="o:0"
                        data-transform_out="o:0" data-start="2300">
                        <a href="#modal-donate-now" data-toggle="modal" class="thm-btn">Donate Now</a>
                    </div>

                    <div class="tp-caption sfr tp-resizeme"  data-hoffset="185" data-y="top"
                        data-voffset="505" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="o:0"
                        data-transform_out="o:0" data-start="2600">
                        <a href="#" class="thm-btn inverse">Learn More</a>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Home  -->

    <!-- Donation Form  -->
    <?php include_once("./templates/donation_form.php");?>
    <!-- Donation Form   -->

    <!-- Service  -->
    <section class="call-to-action" id="about">
        <div class="container-fluid">
            <div class="clearfix">
                <div class="call-to-action-corner col-md-4"
                    style="background-image: url(img/call-to-action/left-box-bg.jpg);">
                    <div class="single-call-to-action">
                        <div class="icon-box">
                            <div class="inner-box">
                                <img src="img/adoption.png" alt="">
                            </div>
                        </div>
                        <div class="content-box">
                            <h3>Adoption</h3>
                            <p> Socially, emotionally, and legally raise orphans</p>
                            <a href="user_login.php" class="thm-btn inverse">Adopt Now</a>
                        </div>
                    </div>
                </div>
                <div class="call-to-action-center col-md-4"
                    style="background-image: url(img/call-to-action/center-box-bg.jpg);">
                    <div class="single-call-to-action">
                        <div class="icon-box">
                            <div class="inner-box">
                                <img src="img/foster.png" alt="">
                            </div>
                        </div>
                        <div class="content-box">
                            <h3>Foster</h3>
                            <p>Afford, receive, share nurture and parental care</p>
                            <a href="user_login.php" class="thm-btn inverse">Foster Now</a>
                        </div>
                    </div>
                </div>
                <div class="call-to-action-corner col-md-4"
                    style="background-image: url(img/call-to-action/right-box-bg.jpg);">
                    <div class="single-call-to-action">
                        <div class="icon-box">
                            <div class="inner-box">
                                <img src="img/donate.png" alt="">
                            </div>
                        </div>
                        <div class="content-box">
                            <h3>Donate</h3>
                            <p>Your donation can also contribute to helping more than one orphan</p>
                            <a href="#modal-donate-now" data-toggle="modal" class="thm-btn inverse">Donate Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service  -->

    <!-- Our Mission  -->
    <section class="home-serivce sec-padding">
        <div class="container">
            <div class="sec-title text-center">
                <h2>Our Mission</h2>
                <p>To implement a community-involved effort to care for orphaned, abandoned, and vulnerable babies and
                    young children. Ensure every needy child is reached and has access to all their basic needs,
                    including but not limited to education, health, shelter, food, and clothing</p>
                <span class="decor"><span class="inner"></span></span>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="single-service-home">
                        <div class="icon-box">
                            <div class="inner-box">
                                <i class="fa-solid fa-baby-carriage"></i>
                            </div>
                        </div>
                        <div class="content">
                            <h3>Home For Orphans</h3>
                            <p>To strive to relocate children into their family units </p>
                            <a href="">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-service-home">
                        <div class="icon-box">
                            <div class="inner-box">
                                <i class="fa-solid fa-child"></i>
                            </div>
                        </div>
                        <div class="content">
                            <h3>Feed hungry childrens</h3>
                            <p>To use local resources and seek to become self-reliant in energy and food</p>
                            <a href="">Read More</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-service-home">
                        <div class="icon-box">
                            <div class="inner-box">
                                <i class="fa-solid fa-person-shelter"></i>
                            </div>
                        </div>
                        <div class="content">
                            <h3>Shelter for homeless</h3>
                            <p>To strive to relocate children into their family units</p>
                            <a href="">Read More</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-service-home">
                        <div class="icon-box">
                            <div class="inner-box">
                                <i class="fa-solid fa-bowl-food"></i>
                            </div>
                        </div>
                        <div class="content">
                            <h3>Donation for food</h3>
                            <p>To use local resources and seek to become self-reliant in energy and food</p>
                            <a href="">Read More</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-service-home">
                        <div class="icon-box">
                            <div class="inner-box">
                                <i class="fa-solid fa-shirt"></i>
                            </div>
                        </div>
                        <div class="content">
                            <h3>Donation for Clothings</h3>
                            <p>To give orphan children their deserved education and care to have a safer life</p>
                            <a href="">Read More</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-service-home">
                        <div class="icon-box">
                            <div class="inner-box">
                                <i class="fa-solid fa-book"></i>
                            </div>
                        </div>
                        <div class="content">
                            <h3>Donation For Education</h3>
                            <p>To give orphan children their deserved education and care to have a safer life</p>
                            <a href="">Read More</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Mission  -->

    <!-- Orphanages  -->
    <section class="recent-causes sec-padding">
        <div class="container">
            <div class="sec-title text-center">
                <h2>Orphanages</h2>
                <span class="decor"><span class="inner"></span></span>
            </div>
            <div class="row">
                <?php
                        $sql = "SELECT * FROM orphanage WHERE `verified`= 1 limit 3";
                        $result = mysqli_query($conn, $sql);
                        
                        if($result){
                            while($row=mysqli_fetch_assoc($result)){

                                $orphanage_id =$row['orphanage_id'];
                                $orphanage_img=$row['orphanage_img'];
                                $orphanage_name	=$row['orphanage_name'];
                                $about=$row['about'];
                                $city=$row['city'];


                                $query1 = "SELECT child_id from for_adoption WHERE orphanage_id=$orphanage_id AND adopted=0";
                                $result1 = mysqli_query($conn, $query1);
                                $row_cnt1 = $result1->num_rows;
                    ?>
                <div class=" col-md-4 ">
                    <div class="causes sm-col5-center">
                        <div class="thumb">
                            <a href="user_login.php"><img class="full-width" alt="" src="img/orphanages/<?php echo $orphanage_img?>"></a>
                        </div>
                        <div class="causes-details clearfix">
                            <h4 class="title"><a href="user_orphanage_detail.php"><?php echo $orphanage_name?></a></h4>
                            <ul class="about-causes list-inline clearfix">
                                <li class="causes-goal" style="padding-right:10px;">Dhaka</li>
                                <li class="causes-goal">CHILDERN FOR ADOPTION: <?php echo $row_cnt1?></li>
                            </ul>
                            <p><?php echo substr($about, 0, 183);?></p>
                            <div>
                                <a href="user_login.php" class="thm-btn btn-xs">Adopt Now</a>
                                <a class="thm-btn inverse btn-xs" data-toggle="modal" href="#modal-donate-now">Donate Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                            }
                        }
                    ?>
            </div>
            <div style="padding-top:40px;">
                <a href="user_login.php"><h5 class="text-center" style="color:#eb5310; font-weight:700;">SEE ALL</h5></a>
            </div>
        </div>
    </section>
    <!-- Orphanages  -->

    <!-- Donate Food  -->
    <section class="overlay-white sec-padding parallax-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 promote-project text-center">
                    <h3>Save Children From Hunger</h3>
                    <div class="sec-title colored text-center">
                        <span class="decor">
                            <span class="inner"></span>
                        </span>
                    </div>
                    <h2>Become a part of a greater cause</h2>
                    <p>Providing a home where infants are brought up to serve as alternative actors in welfare,
                        development and to save the failed role of the state in child protection.</p>
                    <a href="#modal-donate-now" data-toggle="modal" class="thm-btn">Donate Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Donate Food  -->

    <!-- Gallary  -->
    <section class="gallery-section pb_2" id="gallary">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Our Gallery</h2>
                <p>Over the yrars we have helped many childrens</p>
                <span class="decor"><span class="inner"></span></span>
            </div>
        </div>

        <div class="clearfix">
            <!--Image Box-->
            <div class="image-box">
                <div class="inner-box">
                    <figure class="image"><a href="img/gallery/s1.jpg" class="lightbox-image"><img
                                src="img/gallery/s1.jpg" alt=""></a></figure>
                    <a href="img/gallery/s1.jpg" class="lightbox-image btn-zoom" title="Children getting New Books"><span
                            class="icon fa fa-dot-circle-o"></span></a>
                </div>
            </div>

            <!--Image Box-->
            <div class="image-box">
                <div class="inner-box">
                    <figure class="image"><a href="img/gallery/s8.jpg" class="lightbox-image"><img
                                src="img/gallery/s8.jpg" alt=""></a></figure>
                    <a href="img/gallery/s8.jpg" class="lightbox-image btn-zoom" title="Dhaka Orphanage"><span
                            class="icon fa fa-dot-circle-o"></span></a>
                </div>
            </div>

            <!--Image Box-->
            <div class="image-box">
                <div class="inner-box">
                    <figure class="image"><a href="img/gallery/s2.jpg" class="lightbox-image"><img
                                src="img/gallery/s2.jpg" alt=""></a></figure>
                    <a href="img/gallery/s2.jpg" class="lightbox-image btn-zoom" title="Children Studying"><span
                            class="icon fa fa-dot-circle-o"></span></a>
                </div>
            </div>

            <!--Image Box-->
            <div class="image-box">
                <div class="inner-box">
                    <figure class="image"><a href="img/gallery/s3.jpg" class="lightbox-image"><img
                                src="img/gallery/s3.jpg" alt=""></a></figure>
                    <a href="img/gallery/s3.jpg" class="lightbox-image btn-zoom" title="Girl Smiling"><span
                            class="icon fa fa-dot-circle-o"></span></a>
                </div>
            </div>

            <!--Image Box-->
            <div class="image-box">
                <div class="inner-box">
                    <figure class="image"><a href="img/gallery/s4.jpg" class="lightbox-image"><img
                                src="img/gallery/s4.jpg" alt=""></a></figure>
                    <a href="img/gallery/s4.jpg" class="lightbox-image btn-zoom" title="Girl Smiling"><span
                            class="icon fa fa-dot-circle-o"></span></a>
                </div>
            </div>

            <!--Image Box-->
            <div class="image-box">
                <div class="inner-box">
                    <figure class="image"><a href="img/gallery/s5.jpg" class="lightbox-image"><img
                                src="img/gallery/s5.jpg" alt=""></a></figure>
                    <a href="img/gallery/s5.jpg" class="lightbox-image btn-zoom" title="Babies"><span
                            class="icon fa fa-dot-circle-o"></span></a>
                </div>
            </div>

            <!--Image Box-->
            <div class="image-box">
                <div class="inner-box">
                    <figure class="image"><a href="img/gallery/s6.jpg" class="lightbox-image"><img
                                src="img/gallery/s6.jpg" alt=""></a></figure>
                    <a href="img/gallery/s6.jpg" class="lightbox-image btn-zoom" title="Children having Dinner"><span
                            class="icon fa fa-dot-circle-o"></span></a>
                </div>
            </div>

            <!--Image Box-->
            <div class="image-box">
                <div class="inner-box">
                    <figure class="image"><a href="img/gallery/s7.jpg" class="lightbox-image"><img
                                src="img/gallery/s7.jpg" alt=""></a></figure>
                    <a href="img/gallery/s7.jpg" class="lightbox-image btn-zoom" title="Little Girl Smiling"><span
                            class="icon fa fa-dot-circle-o"></span></a>
                </div>
            </div>



        </div>
    </section>
    <!-- Gallary  -->

    

    <!-- Testimonials  -->
    <section class="sec-padding testimonials-wrapper parallax-section" id="testimonial">
        <div class="container">
            <div class="sec-title colored text-center">
                <h2>Testimonials</h2>
                <span class="decor">
                    <span class="inner"></span>
                </span>
            </div>
            <div class="testimonaials-carousel owl-carousel owl-theme">
                <div class="item">
                    <div class="single-testimonaials">
                        <div class="qoute-box">
                            <i class="qoute">“</i>
                        </div>
                        <p>Along each step of adding to our family, we have actively included our kids; they have been
                            100 percent supportive as our family has grown. Foster care and adoption have enriched our
                            lives and helped us to be more compassionate human beings.Honestly, it feels good to help
                            and know that you have forever touched a child's life.
                        </p>
                        <h3>Rebeka Begum</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="single-testimonaials">
                        <div class="qoute-box">
                            <i class="qoute">“</i>
                        </div>
                        <p>The article touched me when I read an article about the need for foster parents in our local
                            paper. I decided foster care was calling my name. Being a foster parent has filled my void.
                            Fred and I have welcomed 17 children into our home in the past three years, including a
                            newborn and a teenager.
                        </p>
                        <h3>Karim Alam</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="single-testimonaials">
                        <div class="qoute-box">
                            <i class="qoute">“</i>
                        </div>
                        <p> In June of 2015, we learned that a child we knew and cared about had been placed into
                            protective custody; it was she who gave us the motivation and courage to step into action
                            and get licensed as foster parents. That child was irene, now our adopted daughter, a
                            blessing and beacon of light that forever changed our lives.
                        </p>
                        <h3>Nafisa Khatun</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials  -->


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