   <?php
    session_start();
    error_reporting(0);
    include('includes/config.php');

    $userId = $_SESSION['id'];
    $query = mysqli_query($con, "SELECT fullName FROM users WHERE id='$userId'");
    $row = mysqli_fetch_array($query);
    $userName = htmlentities($row['fullName']);


    if (strlen($_SESSION['id'] == 0)) {
        header('location: auth/logout.php');
    } else {

    ?>

       <!DOCTYPE html>
       <html lang="en">



       <head>
           <meta charset="utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
           <link rel="shortcut icon" type="image/x-icon" href="assets\images\favicon.ico">
           <title>Care</title>
           <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
           <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
           <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
           <link rel="stylesheet" type="text/css" href="assets/css/style.css">


       </head>

       <body>
           <div class="main-wrapper">
               <div class="header">
                   <div class="header-left">
                       <a href="#" class="logo">
                           <img src="assets/images/logo.png" width="35" height="35" alt="care">
                       </a>
                   </div>
                   <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
                   <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
                   <ul class="nav user-menu float-right">
                       <li class="nav-item dropdown has-arrow">
                           <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                               <span class="user-img">
                                   <img class="rounded-circle" src="assets/images/user.jpg" width="24" alt="Patient">
                                   <span class="status online"></span>
                               </span>
                               <span>Patient</span>
                           </a>
                           <div class="dropdown-menu">
                               <a class="dropdown-item" href="auth/logout.php">Logout</a>
                           </div>
                       </li>
                   </ul>
                   <div class="dropdown mobile-user-menu float-right">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                               class="fa fa-ellipsis-v"></i></a>
                       <div class="dropdown-menu dropdown-menu-right">
                           <a class="dropdown-item" href="auth/logout.php">Logout</a>
                       </div>
                   </div>
               </div>

               <div class="sidebar" id="sidebar">
                   <div class="sidebar-inner slimscroll">
                       <div id="sidebar-menu" class="sidebar-menu">
                           <ul>
                               <li class="menu-title">Main</li>
                               <li>
                                   <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                               </li>

                               <li>
                                   <a href="appointment-history.php"><i class="fa fa-calendar"></i> <span>Appointment History</span></a>
                               </li>

                               <li>
                                   <a href="medical-history.php"><i class="fa fa-search"></i> <span>Medical history</span></a>
                               </li>

                               <li>
                                   <a href="book-appointment.php"><i class="fa fa-calendar-plus-o"></i> <span>Book Appointment</span></a>
                               </li>
                               <li class="menu-title">Settings</li>
                               <li>
                                   <a href="auth/change-password.php"><i class="fa fa-lock"></i> <span>Change
                                           Password</span></a>
                               </li>
                               <li>
                                   <a href="auth/logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a>
                               </li>
                           </ul>
                       </div>
                   </div>
               </div>

               <div class="page-wrapper">
                   <div class="content">

                       <!-- Breadcrumb with User Name -->
                       <div class="row mb-4">
                           <div class="col-12 d-flex justify-content-between align-items-center">
                               <h4 class="page-title">Dashboard</h4>
                               <nav aria-label="breadcrumb">
                                   <ol class="breadcrumb">
                                       <li class="breadcrumb-item">Welcome, <strong><?php echo $userName; ?></strong></li>
                                       <li class="breadcrumb-item active" aria-current="page">Home</li>
                                   </ol>
                               </nav>
                           </div>
                       </div>

                       <!-- Dashboard Cards Styled -->
                       <div class="row">

                           <!-- My Profile -->
                           <div class="col-sm-4 col-lg-6 col-xl-3">
                               <div class="dash-widget panel panel-white text-center">
                                   <div class="panel-body">
                                       <span class="fa-stack fa-2x">
                                           <i class="fa fa-square fa-stack-2x text-primary"></i>
                                           <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i>
                                       </span>
                                       <h4 class="StepTitle">My Profile</h4>
                                       <p class="links cl-effect-1">
                                           <a href="edit-profile.php">Update Profile</a>
                                       </p>
                                   </div>
                               </div>
                           </div>

                           <!-- My Appointments -->
                           <div class="col-sm-4 col-lg-6 col-xl-3">
                               <div class="dash-widget panel panel-white text-center">
                                   <div class="panel-body">
                                       <span class="fa-stack fa-2x">
                                           <i class="fa fa-square fa-stack-2x text-primary"></i>
                                           <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i>
                                       </span>
                                       <h4 class="StepTitle">My Appointments</h4>
                                       <p class="cl-effect-1">
                                           <a href="appointment-history.php">View Appointment History</a>
                                       </p>
                                   </div>
                               </div>
                           </div>

                           <!-- Book Appointment -->
                           <div class="col-sm-4 col-lg-6 col-xl-3">
                               <div class="dash-widget panel panel-white text-center">
                                   <div class="panel-body">
                                       <span class="fa-stack fa-2x">
                                           <i class="fa fa-square fa-stack-2x text-primary"></i>
                                           <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
                                       </span>
                                       <h4 class="StepTitle">Book My Appointments</h4>
                                       <p class="cl-effect-1">
                                           <a href="book-appointment.php">Book Appointment</a>
                                       </p>
                                   </div>
                               </div>
                           </div>

                       </div>
                   </div>
               </div>


               <div class="sidebar-overlay" data-reff=""></div>
               <script src="assets/js/jquery-3.2.1.min.js"></script>
               <script src="assets/js/popper.min.js"></script>
               <script src="assets/js/bootstrap.min.js"></script>
               <script src="assets/js/jquery.slimscroll.js"></script>
               <script src="assets/js/Chart.bundle.js"></script>
               <script src="assets/js/chart.js"></script>
               <script src="assets/js/app.js"></script>

       </body>

       </html>
   <?php } ?>