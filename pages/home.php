<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <title>Home Page</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../styles/templatemo-art-factory.css?<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="../styles/owl-carousel.css">

</head>

<body>

    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Nav ***** -->

    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="#" class="logo">Career Guider</a>
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#welcome" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">Career Guide</a></li>
                            <li class="scroll-to-section"><a href="#about2">Career Test</a></li>
                            <li class="scroll-to-section"><a href="#services">College Info</a></li>
                            <li class="submenu">
                                <a href="javascript:;">More</a>
                                <ul>
                                    <li><a href="#frequently-question">About Us</a></li>
                                    <li class="scroll-to-section"><a href="#contact-us">Contact Us</a></li>
                                    <li><a href="./change_password.php">Change
                                            Password</a></li>
                                    <li><a href="./login.php">Log Out</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="./profile.php">Profile</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>


    <div class="welcome-area" id="welcome">
        <!-- ***** Page 1 ***** -->

        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12"
                        data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <h1>Career Guidance is free <strong>for YOU</strong></h1>
                        <p>Seeking career guidance from a professional can provide valuable insights and support to help
                            navigate the job market and achieve long-term career success.</p>
                        <a href="#about" class="main-button-slider">Find Out More</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
                        data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img src="../assets/images/slider-icon.png" class="rounded img-fluid d-block mx-auto"
                            alt="First Vector Graphic">
                    </div>
                </div>
            </div>
        </div>

        <!-- ***** Page 2 ***** -->
    </div>
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-5 col-md-12 col-sm-12 mobile-bottom-fix">
                    <div class="left-heading">
                        <h5>Careers to choose after 12th</h5>
                    </div>
                    <p> In today's competitive job market, having a higher degree can give individuals a competitive
                        edge over their peers.
                    </p>
                    <ul>
                        <li>
                            <img src="../assets/images/about-icon-01.png" alt="">
                            <div class="text">
                                <h6>Engineering</h6>
                                <p> Pursuing a degree in engineering can lead to careers in various fields such as
                                    civil, mechanical, electrical, and computer engineering.</p>
                            </div>
                        </li>
                        <li>
                            <img src="../assets/images/about-icon-02.png" alt="">
                            <div class="text">
                                <h6>Medicine</h6>
                                <p>Students who are interested in healthcare can pursue degrees in medicine, nursing, or
                                    other allied health professions.</p>
                            </div>
                        </li>
                        <li>
                            <img src="../assets/images/about-icon-03.png" alt="">
                            <div class="text">
                                <h6>Business and Management</h6>
                                <p>Pursuing a degree in business and management can lead to careers in finance,
                                    marketing, human resources, and other areas of business.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="right-image col-lg-7 col-md-12 col-sm-12 mobile-bottom-fix-big"
                    data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="../assets/images/right-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Page 3 ***** -->
    <section class="section" id="about2">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="../assets/images/left-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                    <div class="left-heading">
                        <h5>Take a Career Test</h5>
                    </div>
                    <div class="left-text">
                        <p>A career test, also known as a career assessment, is a tool used to help individuals identify
                            their skills, interests, personality traits, and values to explore potential career paths
                            that align with their strengths and goals. <br><br>
                            Career tests typically involve a series of questions or tasks that assess an individual's
                            strengths, weaknesses, and preferences. The results of the test can provide valuable
                            insights into potential career paths that may be a good fit for the individual.</p>
                        <a href="#about2" class="main-button">Take Career Test</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>

    </section>


    <!-- ***** Page 4 ***** -->
    <section class="section" id="services">
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-theme">
                    <?php
                    getCollegeDetails()
                    ?>
                </div>
            </div>
        </div>
    </section>


    <!-- ***** Page 5 ***** -->
    <section class="section" id="frequently-question">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>About Us</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="section-heading">
                        <p>We Provide Career guidance that helps individuals identify their skills, interests, and
                            values to make informed decisions about their professional goals.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="left-text col-lg-6 col-md-6 col-sm-12">
                    <h5>Hello learners, </h5>
                    <div class="accordion-text">
                        <p>We are a group of 2 who are passionate about education and helping others achieve their
                            goals.
                            Our names are <strong>Rutuja Naik</strong> and <strong>Imran Shaikh</strong> we are
                            currently Students studying IT.</p>
                        <p>Our career guidance project involves researching different career options and providing
                            information about the skills, education, and experience required for each career path. We
                            also provide aptitude tests, and networking with
                            professionals in different industries.</p>
                        <span>Email: <a
                                href="https://mail.google.com/mail/?view=cm&fs=1&to=rutujanaik.22022000@gmail.com"
                                target="_blank">rutujanaik.22022000@gmail.com</a><br></span>
                        <span>Email: <a href="https://mail.google.com/mail/?view=cm&fs=1&to=imranmshaikh4@gmail.com"
                                target="_blank">imranmshaikh4@gmail.com</a><br></span>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=rutujanaik.22022000@gmail.com"
                            target="_blank" class="main-button">Contact Us</a>
                    </div>
                </div>

    </section>

    <!-- ***** Page 6 ***** -->
    <section class="section" id="contact-us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div id="map">
                        <!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d517.5870239737193!2d72.93890027785687!3d19.120026330099854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c79be3ca4569%3A0x5b9add60d909e77c!2sAsmita%20College%20Building%2C%20Kannamwar%20Nagar%20II%2C%20Vikhroli%2C%20Mumbai%2C%20Maharashtra%20400083!5e0!3m2!1sen!2sin!4v1679126244301!5m2!1sen!2sin"
                            width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="contact-form">
                        <form id="contact" action="" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="name" type="text" id="name" placeholder="Full Name" required=""
                                            class="contact-field">
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="text" id="email" placeholder="E-mail" required=""
                                            class="contact-field">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" id="message" placeholder="Your Message"
                                            required="" class="contact-field"></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Send It</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ***** Footer ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <p class="copyright">Copyright &copy; 2023 Career Guider Company
                        . </p>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://mail.google.com/mail/?view=cm&fs=1&to=rutujanaik.22022000@gmail.com"
                                target="_blank"><i class="fa fa-google"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="../js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="../js/owl-carousel.js"></script>
    <script src="../js/scrollreveal.min.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    <script src="../js/imgfix.min.js"></script>
    <script src="https://kit.fontawesome.com/8b2513931f.js" crossorigin="anonymous"></script>

    <!-- Global Init -->
    <script src="../js/custom.js"></script>

</body>

</html>

<?php

function getCollegeDetails()
{
    $server = "localhost";
    $username = "root";
    $password = "aryan1212";
    $database = "stream_analysis";
    $con = mysqli_connect($server, $username, $password, $database);
    if (!$con) {
        echo "Not connected";
    }
    $sql3 = "SELECT * FROM  college_info";
    $query = mysqli_query($con, $sql3);
    if (!$query) {
        echo "<div>No College Data yet...</div>";
    } else {
        while ($row = mysqli_fetch_assoc($query)) {

?>
<div class="item service-item">
    <div class="icon">
        <?php
                    $data = $row['college_photo_url'];
                    echo "<i><img src='$data' object-fit='cover' alt=''></i>";
                    ?>
    </div>
    <?php
                $data = $row['college_name'];
                echo "<h5 class='service-title'>$data</h5>";
                echo "<p>{$row['college_desc']}</p>";
                $data = $row['college_link'];
                echo "<a href='$data' target='_blank' class='main-button'>Read More</a>";
                ?>
</div>

<?php
        }
    }
    $con->close();
}

?>