<?php
include_once('./include/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARE - Hospital Management</title>
    <link rel="shortcut icon" href="./assests/img/favicon.ico">

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="./assests/css/style.css">
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
                        <li class="nav-item"><a class="nav-link" href="#cities">Cities</a></li>
                        <li class="nav-item"><a class="nav-link" href="#appointment">Book
                                Appointment</a></li>
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
                <div class="carousel-item active"
                    style="background-image: url('./assests/images/home1/banner/background.jpg');">
                    <div class="carousel-overlay">
                        <div class="carousel-caption-content">
                            <h1 class="animated bounceInDown">LET US PROTECT YOUR HEALTH</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a class="btn btn-outline-primary text-light" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item"
                    style="background-image: url('./assests/images/home1/banner/background1.jpg');">
                    <div class="carousel-overlay">
                        <div class="carousel-caption-content">
                            <h1 class="animated bounceInDown">LET US PROTECT YOUR HEALTH</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a class="btn btn-outline-primary text-light" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item"
                    style="background-image: url('./assests/images/home1/banner/background2.jpg');">
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


    <!-- Logins  -->

    <section id="logins" class="our-blog container-fluid">
        <div class="container">
            <div class="inner-title">
                <h2 class="my-2" style="text-align:center;">Logins</h2>
            </div>
            <div class="col-sm-12 blog-cont">
                <div class="row no-margin">
                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">
                            <img class="img-thumbnail" src="./assests/images/patient.jpg" alt="">
                            <div class="blog-single-det">
                                <h6>Patient Login</h6>
                                <a href="hms/user-login.php" target="_blank">
                                    <button class="btn btn-primary btn-sm">Click Here</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">
                            <img class="img-thumbnail" src="./assests/images/doctor.jpg" alt="">
                            <div class="blog-single-det">
                                <h6>Doctors login</h6>
                                <a href="hms/doctor" target="_blank">
                                    <button class="btn btn-primary btn-sm">Click Here</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 blog-smk">
                        <div class="blog-single">
                            <img class="img-thumbnail" src="./assests/images/admin.jpg" alt="">
                            <div class="blog-single-det">
                                <h6>Admin Login</h6>
                                <a href="admin/index.php" target="_blank">
                                    <button class="btn btn-primary btn-sm">Click Here</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-down">
                <h2 class="fw-bold">Our Healthcare Services</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    We provide comprehensive healthcare services designed to ensure patient satisfaction, safety, and
                    quality care.
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
    <!-- About Us Section -->
    <section id="about_us" class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">About <span class="text-primary">Us</span></h2>
            </div>

            <div class="row align-items-center">
                <!-- Image -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="./assests/images/about.jpg" alt="About Us"
                        class="img-fluid animate__animated animate__fadeInLeft">
                </div>

                <!-- Content -->
                <div class="col-md-6">
                    <h3 class="fw-bold mb-3">Providing the Best Healthcare Solutions</h3>
                    <p>
                        We are committed to delivering high-quality healthcare services with compassion, care, and
                        cutting-edge technology. Our hospital management system is designed to simplify operations,
                        improve patient experiences, and support doctors with efficient tools.
                    </p>
                    <p>
                        From appointment scheduling to patient record management, our goal is to make healthcare
                        accessible, reliable, and efficient for everyone. Our dedicated team works round the clock to
                        ensure that patients get the best medical support possible.
                    </p>
                    <a href="#services" class="btn btn-outline-primary">
                        Learn More <i class="fas fa-chevron-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <!-- <section id="news" class="py-5 bg-light">
        <div class="row"> -->
            <!-- Section Heading -->
            <!-- <div class="text-center mb-5">
                <h2 class="fw-bold">Latest News</h2>
                <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio, eligendi!
                </p>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="blog grid-blog">
                    <div class="blog-image">
                        <a href="blog-details.html"><img class="img-fluid" src="./assests/img/blog/blog-01.jpg"
                                alt=""></a>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title"><a href="blog-details.html">Do You Know the ABCs of Health Care?</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore etmis dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco sit laboris.</p>
                        <a href="blog-details.html" class="read-more"><i class="fa fa-long-arrow-right"></i> Read
                            More</a>
                        <div class="blog-info clearfix">
                            <div class="post-left">
                                <ul>
                                    <li><a href="#."><i class="fa fa-calendar"></i> <span>December 6, 2017</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-right"><a href="#."><i class="fa fa-heart-o"></i>21</a> <a href="#."><i
                                        class="fa fa-eye"></i>8</a> <a href="#."><i class="fa fa-comment-o"></i>17</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="blog grid-blog">
                    <div class="blog-image">
                        <a href="blog-details.html"><img class="img-fluid" src="./assests/img/blog/blog-02.jpg"
                                alt=""></a>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title"><a href="blog-details.html">Do You Know the ABCs of Health Care?</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore etmis dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco sit laboris.</p>
                        <a href="blog-details.html" class="read-more"><i class="fa fa-long-arrow-right"></i> Read
                            More</a>
                        <div class="blog-info clearfix">
                            <div class="post-left">
                                <ul>
                                    <li><a href="#."><i class="fa fa-calendar"></i> <span>December 6, 2017</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-right"><a href="#."><i class="fa fa-heart-o"></i>21</a> <a href="#."><i
                                        class="fa fa-eye"></i>8</a> <a href="#."><i class="fa fa-comment-o"></i>17</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="blog grid-blog">
                    <div class="blog-image">
                        <a href="blog-details.html"><img class="img-fluid" src="./assests/img/blog/blog-03.jpg"
                                alt=""></a>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title"><a href="blog-details.html">Do You Know the ABCs of Health Care?</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore etmis dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco sit laboris.</p>
                        <a href="blog-details.html" class="read-more"><i class="fa fa-long-arrow-right"></i> Read
                            More</a>
                        <div class="blog-info clearfix">
                            <div class="post-left">
                                <ul>
                                    <li><a href="#."><i class="fa fa-calendar"></i> <span>December 6, 2017</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-right"><a href="#."><i class="fa fa-heart-o"></i>21</a> <a href="#."><i
                                        class="fa fa-eye"></i>8</a> <a href="#."><i class="fa fa-comment-o"></i>17</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section id="news" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Latest News</h2>
            <p class="text-muted">Stay updated with the latest health news.</p>
        </div>

        <div class="row">
            <?php
            $posts = mysqli_query($con, "SELECT * FROM posts WHERE status='active' ORDER BY created_at DESC LIMIT 3");

            while ($post = mysqli_fetch_assoc($posts)) {
                $post_id = $post['id'];
                $title = $post['title'];
                $description = substr(strip_tags($post['description']), 0, 100) . "...";
                $created_at = date("F j, Y", strtotime($post['created_at']));

                // Get first image
                $img = mysqli_query($con, "SELECT image_name FROM post_images WHERE post_id=$post_id LIMIT 1");
                $img_row = mysqli_fetch_assoc($img);
                $image = $img_row ? $img_row['image_name'] : 'default.jpg';
            ?>
                <div class="col-lg-4">
                    <div class="blog grid-blog">
                        <div class="blog-image">
                            <a href="admin/news/content_news.php?id=<?php echo $post_id; ?>">
                                <img src="admin/uploads/<?php echo $image; ?>" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h3 class="blog-title"><a href="admin/news/content_news.php?id=<?php echo $post_id; ?>"><?php echo $title; ?></a></h3>
                            <p><?php echo $description; ?></p>
                            <a href="admin/news/content_news.php?id=<?php echo $post_id; ?>" class="read-more">
                                <i class="fa fa-long-arrow-right"></i> Read More
                            </a>
                            <div class="blog-info clearfix mt-2">
                                <span><i class="fa fa-calendar"></i> <?php echo $created_at; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


    <!-- City Section-->
    <section id="cities" class="py-5 bg-white">
        <div class="container">
            <!-- Section Heading -->
            <div class="text-center mb-5">
                <h2 class="fw-bold">Healthcare Services in Your <span class="text-primary">City</span></h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    CARE Group connects you with hospitals, clinics, and doctors in your city. Find specialists, view
                    their profiles, and book appointments online without waiting in queues.
                </p>
            </div>

            <!-- Tabs -->
            <ul class="nav justify-content-center mb-4" id="cityTabs" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#karachi">Karachi</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#lahore">Lahore</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#islamabad">Islamabad</button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="cityTabsContent">

                <!-- Karachi -->
                <div class="tab-pane fade show active" id="karachi">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm">
                                <img src="./assests/images/cities/city (7).jpg" class="card-img-top"
                                    alt="Care Hospital">
                                <div class="card-body">
                                    <h5 class="card-title">Care Hospital</h5>
                                    <p class="card-text">Top-rated multi-specialty hospital offering advanced medical
                                        services.</p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm">
                                <img src="./assests/images/cities/city (6).jpg" class="card-img-top"
                                    alt="City Care Clinic">
                                <div class="card-body">
                                    <h5 class="card-title">City Care Clinic</h5>
                                    <p class="card-text">Leading cardiologists available for consultations and checkups.
                                    </p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm">
                                <img src="./assests/images/cities/city (5).jpg" class="card-img-top"
                                    alt="Smile Dental Care">
                                <div class="card-body">
                                    <h5 class="card-title">Smile Dental Care</h5>
                                    <p class="card-text">Best dental clinic in Karachi with experienced dental surgeons.
                                    </p>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lahore -->
                <div class="tab-pane fade" id="lahore">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm position-relative">
                                <img src="./assests/images/cities/city (4).jpg" class="card-img-top"
                                    alt="Care Hospital">
                                <div class="card-body">
                                    <h5 class="card-title">Care Hospital</h5>
                                    <p class="card-text">Comprehensive cancer treatment and specialty healthcare
                                        services.</p>
                                    <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">Coming
                                        Soon</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm position-relative">
                                <img src="./assests/images/cities/city (3).jpg" class="card-img-top"
                                    alt="Lahore General Care Hospital">
                                <div class="card-body">
                                    <h5 class="card-title">Lahore General Care Hospital</h5>
                                    <p class="card-text">Affordable medical services and specialist doctors available.
                                    </p>
                                    <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">Coming
                                        Soon</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Islamabad -->
                <div class="tab-pane fade" id="islamabad">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm position-relative">
                                <img src="./assests/images/cities/city (2).jpg" class="card-img-top"
                                    alt="Care Hospital">
                                <div class="card-body">
                                    <h5 class="card-title">Care Hospital</h5>
                                    <p class="card-text">Leading hospital in Islamabad with 24/7 emergency care.</p>
                                    <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">Coming
                                        Soon</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm position-relative">
                                <img src="./assests/images/cities/city (1).jpg" class="card-img-top"
                                    alt="Islamabad Medical Care Center">
                                <div class="card-body">
                                    <h5 class="card-title">Islamabad Medical Care Center</h5>
                                    <p class="card-text">Experienced general physicians and specialists for all needs.
                                    </p>
                                    <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">Coming
                                        Soon</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Appointment Section -->
    <section id="appointment" class="py-5 bg-light">
        <div class="container">
            <!-- Heading -->
            <div class="text-center mb-5">
                <h2 class="fw-bold"> <span class="text-primary">
                        <img src="./assests/img/logo-dark.png" width="35" height="35" alt="HMS">
                        <br>Make Appointment</span> Now</h2>
            </div>

            <div class="row align-items-center">
                <!-- Image Section -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="./assests/images/appointment.png" alt="Appointment"
                        class="img-fluid animate__animated animate__fadeInLeft">
                </div>

                <!-- Form Section -->
                <div class="col-md-6">
                    <div class="p-4 bg-white shadow-sm rounded">
                        <!-- PHP Message (Session Based) -->
                        <?php
                        if (isset($message)) {
                            foreach ($message as $msg) {
                                echo '<div class="alert alert-info py-1 px-2 mb-3">' . $msg . '</div>';
                            }
                        }

                        if (isset($_POST['submit'])) {
                            $name = $_POST['name'];
                            $number = $_POST['number'];
                            $email = $_POST['email'];
                            $date = $_POST['date'];

                            // basic validation
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                $message[] = "Invalid email format.";
                            } else {
                                $query = mysqli_query($con, "INSERT INTO appointment_requests(name, number, email, appointment_date) VALUES('$name', '$number', '$email', '$date')");

                                if ($query) {
                                    $message[] = "Your appointment has been booked successfully.";
                                } else {
                                    $message[] = "Something went wrong. Please try again.";
                                }
                            }
                        }
                        ?>

                        <!--Appointment Form -->
                        <h3 class="fw-bold mb-3">Make an Appointment</h3>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="mb-3">
                                <input type="tel" name="number" class="form-control" placeholder="Your Number" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                            </div>
                            <div class="mb-3">
                                <input type="date" name="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <input type="submit" name="submit" value="Book Appointment" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Contact Us Section -->
    <section id="contact_us" class="py-5 bg-light">
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
                        <?php
                        if (isset($_POST['submit'])) {
                            $name = $_POST['fullname'];
                            $email = $_POST['emailid'];
                            $mobileno = $_POST['mobileno'];
                            $dscrption = $_POST['description'];
                            $query = mysqli_query($con, "insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
                            echo "<script>alert('Your information succesfully submitted');</script>";
                            echo "<script>window.location.href ='index.php'</script>";
                        }
                        ?>
                        <form method="post">
                            <div class="mb-3">
                                <div class="col-sm-3"><label>Your Name :</label></div>
                                <div class="col-sm-8"><input type="text" placeholder="Enter Name" name="fullname" class="form-control input-sm" required></div>
                            </div>
                            <div class="mb-3">
                                <div class="col-sm-3"><label>Email Address :</label></div>
                                <div class="col-sm-8"><input type="text" name="emailid" placeholder="Enter Email Address" class="form-control input-sm" required></div>
                            </div>
                            <div class="mb-3">
                                <div class="col-sm-3"><label>Mobile Number:</label></div>
                                <div class="col-sm-8"><input type="text" name="mobileno" placeholder="Enter Mobile Number" class="form-control input-sm" required></div>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="5"
                                    placeholder="Enter your message..." class="form-control input-sm" name="description" required></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary px-4">Send Message</button>
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

    <!-- Doctors Section -->
    <section id="doctors" class="py-5 bg-light">
        <div class="container">
            <!-- Section Heading -->
            <div class="text-center mb-5">
                <h2 class="fw-bold">Our <span class="text-primary">Doctors</span></h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    Meet our expert team of highly qualified and experienced doctors, committed to delivering the best
                    medical care and treatment for you.
                </p>
            </div>

            <!-- Doctors Grid -->
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card text-center shadow-sm">
                        <img src="./assests/images/doctors/doctor-thumb-10.jpg" class="rounded-circle mx-auto mt-2"
                            alt="Doctor" width="150" height="150">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Ayesha Khan</h5>
                            <p class="text-muted mb-2">Cardiologist</p>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="https://facebook.com" target="_blank" aria-label="Facebook"><i
                                        class="fab fa-facebook-f text-primary"></i></a>
                                <a href="https://twitter.com" target="_blank" aria-label="Twitter"><i
                                        class="fab fa-twitter text-info"></i></a>
                                <a href="https://instagram.com" target="_blank" aria-label="Instagram"><i
                                        class="fab fa-instagram text-danger"></i></a>
                                <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn"><i
                                        class="fab fa-linkedin text-secondary"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center shadow-sm">
                        <img src="./assests/images/doctors/doctor-thumb-12.jpg" class="rounded-circle mx-auto mt-2"
                            alt="Doctor" width="150" height="150">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Ali Raza</h5>
                            <p class="text-muted mb-2">Neurologist</p>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="https://facebook.com" target="_blank" aria-label="Facebook"><i
                                        class="fab fa-facebook-f text-primary"></i></a>
                                <a href="https://twitter.com" target="_blank" aria-label="Twitter"><i
                                        class="fab fa-twitter text-info"></i></a>
                                <a href="https://instagram.com" target="_blank" aria-label="Instagram"><i
                                        class="fab fa-instagram text-danger"></i></a>
                                <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn"><i
                                        class="fab fa-linkedin text-secondary"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center shadow-sm">
                        <img src="./assests/images/doctors/doctor-thumb-02.jpg" class="rounded-circle mx-auto mt-2"
                            alt="Doctor" width="150" height="150">
                        <div class="card-body">
                            <h5 class="card-title">Dr. Fatima Noor</h5>
                            <p class="text-muted mb-2">Dermatologist</p>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="https://facebook.com" target="_blank" aria-label="Facebook"><i
                                        class="fab fa-facebook-f text-primary"></i></a>
                                <a href="https://twitter.com" target="_blank" aria-label="Twitter"><i
                                        class="fab fa-twitter text-info"></i></a>
                                <a href="https://instagram.com" target="_blank" aria-label="Instagram"><i
                                        class="fab fa-instagram text-danger"></i></a>
                                <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn"><i
                                        class="fab fa-linkedin text-secondary"></i></a>
                            </div>
                        </div>
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

        <div class="credit"> Created by <span>CARE & Team</span> | All Rights Reserved &copy;</div>

    </section>
    <!-- JS Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>