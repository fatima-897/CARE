<?php

include('../includes/header.php');
// Database connection
include('../includes/config.php');

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
<?php
include('../includes/footer.php'); 
?>