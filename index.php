<?php
include_once('./include/db.php');
if (isset($_POST['submit'])) {
    $name = $_POST['fullname'];
    $email = $_POST['emailid'];
    $mobileno = $_POST['mobileno'];
    $dscrption = $_POST['description'];
    $query = mysqli_query($con, "INSERT INTO tblcontactus(fullname,email,contactno,message) VALUES ('$name','$email','$mobileno','$dscrption')");
    echo "<script>alert('Your information successfully submitted');</script>";
    echo "<script>window.location.href='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARE - Hospital Management</title>
    <link rel="shortcut icon" href="./assests/img/favicon.ico">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="./assests/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="plugin/owl-carouse/owl.carousel.min.css">
    <link rel="stylesheet" href="plugin/owl-carouse/owl.theme.default.min.css">
    <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="plugin/process-bar/tox-progress.css">
    <link rel="stylesheet" href="plugin/animsition/css/animate.css">
    <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="plugin/mediaelement/mediaelementplayer.css">
    <link rel="stylesheet" href="plugin/datetimepicker/bootstrap-datepicker3.css">
    <link rel="stylesheet" href="plugin/datetimepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="plugin/lightgallery/lightgallery.css">
</head>

<body>

    <!-- Header -->
    <header id="menu-jk">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-3">
            <div class="container">
                <a class="navbar-brand fw-bold fs-3 logo" href="index.php">
                    <img src="./assests/img/logo-dark.png" width="35" height="35" alt="HMS">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about_us">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact_us">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="#news">News</a></li>
                        <li class="nav-item"><a class="nav-link" href="patient/book_appointment.php">Book Appointment</a></li>
                    </ul>
                    <div class="d-lg-block">
                        <a class="btn btn-primary" href="#logins">Login</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Carousel -->
    <div class="slider-detail">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('./assests/images/home1/banner/background.jpg');">
                    <div class="carousel-overlay">
                        <div class="carousel-caption-content">
                            <h1 class="animated bounceInDown">LET US PROTECT YOUR HEALTH</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a class="btn btn-outline-primary text-light" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('./assests/images/home1/banner/background1.jpg');">
                    <div class="carousel-overlay">
                        <div class="carousel-caption-content">
                            <h1 class="animated bounceInDown">LET US PROTECT YOUR HEALTH</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a class="btn btn-outline-primary text-light" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('./assests/images/home1/banner/background2.jpg');">
                    <div class="carousel-overlay">
                        <div class="carousel-caption-content">
                            <h1 class="animated bounceInDown">LET US PROTECT YOUR HEALTH</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a class="btn btn-outline-primary text-light" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-down">
                <h2 class="fw-bold">Our Healthcare Services</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    We provide comprehensive healthcare services designed to ensure patient satisfaction, safety, and quality care.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="service-box text-center p-4 shadow-sm rounded bg-light">
                        <div class="service-icon mb-3">
                            <i class="bi bi-calendar-check-fill fs-1 text-primary"></i>
                        </div>
                        <h5>Appointment Booking</h5>
                        <p>Seamlessly book appointments with our expert doctors anytime.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up">
                    <div class="service-box text-center p-4 shadow-sm rounded bg-light">
                        <div class="service-icon mb-3">
                            <i class="bi bi-person-badge-fill fs-1 text-success"></i>
                        </div>
                        <h5>Doctor Consultation</h5>
                        <p>Consult with specialized doctors for personalized advice.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up">
                    <div class="service-box text-center p-4 shadow-sm rounded bg-light">
                        <div class="service-icon mb-3">
                            <i class="bi bi-hospital-fill fs-1 text-danger"></i>
                        </div>
                        <h5>Inpatient Services</h5>
                        <p>Comfortable inpatient facilities with 24/7 nursing care.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up">
                    <div class="service-box text-center p-4 shadow-sm rounded bg-light">
                        <div class="service-icon mb-3">
                            <i class="bi bi-shield-check fs-1 text-warning"></i>
                        </div>
                        <h5>Emergency Services</h5>
                        <p>Rapid response emergency care available 24/7.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up">
                    <div class="service-box text-center p-4 shadow-sm rounded bg-light">
                        <div class="service-icon mb-3">
                            <i class="bi bi-heart-pulse-fill fs-1 text-info"></i>
                        </div>
                        <h5>Patient Care Management</h5>
                        <p>Track your medical history and care plans securely online.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up">
                    <div class="service-box text-center p-4 shadow-sm rounded bg-light">
                        <div class="service-icon mb-3">
                            <i class="bi bi-cloud-arrow-up-fill fs-1 text-secondary"></i>
                        </div>
                        <h5>Medical Records Online</h5>
                        <p>Access your medical reports and prescriptions securely anytime.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="contact_us" class="py-5 bg-light" id="contact">
        <div class="container">
            <!-- Section Heading -->
            <div class="text-center mb-5">
                <h2 class="fw-bold">Contact Us</h2>
                <p class="text-muted">We'd love to hear from you! Fill out the form below or find us at our location.
                </p>
            </div>

            <!-- Form and Map Row -->
            <div class="row g-4">
                <!-- Contact Form -->
                <div class="col-md-6">
                    <div class="p-4 bg-white shadow-sm rounded">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="5"
                                    placeholder="Your message..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary px-4">Send Message</button>
                        </form>
                    </div>
                </div>

                <!-- Map -->
                <div class="col-md-6">
                    <div class="h-100 rounded shadow-sm overflow-hidden">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.086877249681!2d-122.41941568468003!3d37.774929779759825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809c5bb1cdab%3A0x7f1eea1f31b20e45!2sSan%20Francisco%20City%20Hall!5e0!3m2!1sen!2sus!4v1639336340957!5m2!1sen!2sus"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ################# #Footer Starts Here  #######################--->
    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>Quick Links</h3>
                <a href="index.php"> <i class="fas fa-chevron-right"></i> Home </a>
                <a href="about.php"> <i class="fas fa-chevron-right"></i> About </a>
                <a href="services.php"> <i class="fas fa-chevron-right"></i> Services </a>
                <a href="doctor_list.php"> <i class="fas fa-chevron-right"></i> Doctors </a>
                <a href="patient/book_appointment.php"> <i class="fas fa-chevron-right"></i> Appointment </a>
            </div>

            <div class="box">
                <h3>Our Services</h3>
                <a href="#"> <i class="fas fa-chevron-right"></i> Dental Care </a>
                <a href="#"> <i class="fas fa-chevron-right"></i> Cardiology </a>
                <a href="#"> <i class="fas fa-chevron-right"></i> Diagnosis </a>
                <a href="news.php"> <i class="fas fa-chevron-right"></i> News & Blogs </a>
                <a href="feedback.php"> <i class="fas fa-chevron-right"></i> Review </a>
            </div>

            <div class="box">
                <h3>Appointment Info</h3>
                <a href="#"> <i class="fas fa-phone"></i> +8801782546979 </a>
                <a href="#"> <i class="fas fa-phone"></i> +8801782546978 </a>
                <a href="mailto:wincoder9@gmail.com"> <i class="fas fa-envelope"></i> wincoder9@gmail.com </a>
                <a href="mailto:sujoncse26@gmail.com"> <i class="fas fa-envelope"></i> sujoncse26@gmail.com </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> Karachi, Pakistan </a>
            </div>

            <div class="box">
                <h3>Follow Us</h3>
                <a href="#"> <i class="fab fa-twitter"></i> Twitter </a>
                <a href="#"> <i class="fab fa-instagram"></i> Instagram </a>
                <a href="#"> <i class="fab fa-linkedin"></i> LinkedIn </a>
                <a href="#"> <i class="fab fa-pinterest"></i> Pinterest </a>
            </div>

        </div>

        <div class="credit"> Created by <span>CARE & Team</span> | All Rights Reserved </div>

    </section>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/Chart.bundle.js"></script>
<script src="assets/js/chart.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/plugins/scroll-nav/js/jquery.easing.min.js"></script>
<script src="assets/plugins/scroll-nav/js/scrolling-nav.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="plugin/jquery/jquery-2.0.2.min.js"></script>
<script src="plugin/jquery-ui/jquery-ui.min.js"></script>
<script src="plugin/bootstrap/js/bootstrap.js"></script>
<script src="plugin/process-bar/tox-progress.js"></script>
<script src="plugin/waypoint/jquery.waypoints.min.js"></script>
<script src="plugin/counterup/jquery.counterup.min.js"></script>
<script src="plugin/owl-carouse/owl.carousel.min.js"></script>
<script src="plugin/jquery-ui/jquery-ui.min.js"></script>
<script src="plugin/mediaelement/mediaelement-and-player.js"></script>
<script src="plugin/masonry/masonry.pkgd.min.js"></script>
<script src="plugin/datetimepicker/moment.min.js"></script>
<script src="plugin/datetimepicker/bootstrap-datepicker.min.js"></script>
<script src="plugin/datetimepicker/bootstrap-datepicker.tr.min.js"></script>
<script src="plugin/datetimepicker/bootstrap-datetimepicker.js"></script>
<script src="plugin/datetimepicker/bootstrap-datetimepicker.fr.js"></script>

<script src="plugin/lightgallery/picturefill.min.js"></script>
<script src="plugin/lightgallery/lightgallery.js"></script>
<script src="plugin/lightgallery/lg-pager.js"></script>
<script src="plugin/lightgallery/lg-autoplay.js"></script>
<script src="plugin/lightgallery/lg-fullscreen.js"></script>
<script src="plugin/lightgallery/lg-zoom.js"></script>
<script src="plugin/lightgallery/lg-hash.js"></script>
<script src="plugin/lightgallery/lg-share.js"></script>
<script src="plugin/sticky/jquery.sticky.js"></script>

</html>