<?php
// Database connection
include('includes/config.php');

$query = mysqli_query($con, "SELECT COUNT(*) AS total FROM tblpatient");
$row = mysqli_fetch_array($query);
$total_patients = $row['total'];
//doctors
$query = mysqli_query($con, "SELECT COUNT(*) AS total_doctors FROM doctors");
$row = mysqli_fetch_array($query);
$total_doctors = $row['total_doctors'];
//pending
$pending = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS pending FROM appointment WHERE userStatus=0 OR doctorStatus=0"))['pending'];
//attend
$attended = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS attended FROM appointment WHERE userStatus=1 AND doctorStatus=1"))['attended'];
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
                            <img class="rounded-circle" src="assets/images/user.jpg" width="24" alt="Admin">
                            <span class="status online"></span>
                        </span>
                        <span>Admin</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="includes/setting.php">Settings</a>
                        <a class="dropdown-item" href="auth/logout.php">Logout</a>
                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                        class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="includes/setting.php">Settings</a>
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
                        <li class="submenu">
                            <a href="#"><i class="fa fa-user-md"></i> <span> Doctors</span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="doctors/doctor-specialization.php">Doctor Specialization</a></li>
                                <li><a href="doctors/add-doctor.php">Add Doctor</a></li>
                                <li><a href="doctors/manage-doctors.php"Manage Doctors Specialization</a></li>
                                <li><a href="doctors/doctor-logs.php">Doctor logs</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="patients/manage-patient.php"><i class="fa fa-wheelchair"></i>
                                <span>Patients</span></a>
                        </li>
                        <li>
                            <a href="manage-users.php"><i class="fa fa-users"></i> <span> Users</span></a>
                        </li>
                         <li>
                            <a href="auth/user-logs.php"><i class="fa fa-users"></i> <span>User Session</span></a>
                        </li>
                        <li>
                            <a href="appointments/appointment-history.php"><i class="fa fa-calendar"></i>
                                <span>Appointments</span></a>
                        </li>
                        <li>
                            <a href="appointments/manage-appointment-request.php"><i class="fa fa-calendar"></i>
                                <span>ManageAppointments</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-envelope"></i> <span>Contact Queries</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="queries/unread-queries.php">Unread Queries</a></li>
                                <li><a href="queries/read-queries.php">Read Queries</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="reports/between-dates-report.php"><i class="fa fa-file-text-o"></i>
                                <span>Reports</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-hospital-o"></i> <span>Cities</span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="cities/manage-cities.php">Manage cities</a></li>
                                <li><a href="cities/add-cities.php">Add City</a></li>
                            </ul>
                        </li>
                         <li class="submenu">
                            <a href="#"><i class="fa fa-commenting-o"></i> <span>Blog News</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="news/add-post.php">Add Post</a></li>
                                <li><a href="news/manage-news.php">View Post</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="patients/patient-search.php"><i class="fa fa-search"></i> <span>Patient
                                    Search</span></a>
                        </li>

                        <li class="menu-title">Settings</li>
                        <li>
                            <a href="includes/setting.php"><i class="fa fa-cog"></i> <span>Settings</span></a>
                        </li>
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
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-user-md"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo htmlentities($total_doctors); ?></h3>
                                <span class="widget-title1">Doctors <i class="fa fa-check"
                                        aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo htmlentities($total_patients); ?></h3>
                                <span class="widget-title2">Patients <i class="fa fa-check"
                                        aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo htmlentities($pending); ?></h3>
                                <span class="widget-title4">Pending <i class="fa fa-check"
                                        aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-calendar-check-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo htmlentities($attended); ?></h3>
                                <span class="widget-title3">Attend <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
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

