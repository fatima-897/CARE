<?php
session_start();
include("includes/config.php");
include("includes/checklogin.php");
check_login();

$msg = "";

if (isset($_POST['submit'])) {
    $specilization = $_POST['Doctorspecialization'];
    $doctorid = $_POST['doctor'];
    $userid = $_SESSION['id'];
    $fees = $_POST['fees'];
    $appdate = $_POST['appdate'];
    $time = $_POST['apptime'];
    $userstatus = 1;
    $docstatus = 1;

    $query = mysqli_query($con, "INSERT INTO appointment(doctorSpecialization, doctorId, userId, consultancyFees, appointmentDate, appointmentTime, userStatus, doctorStatus)
                             VALUES('$specilization', '$doctorid', '$userid', '$fees', '$appdate', '$time', '$userstatus', '$docstatus')");

    if ($query) {
        $msg = "Your appointment has been successfully booked.";
    } else {
        $msg = "Something went wrong. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <title>Book Appointment | Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        @media(max-width: 768px) {
            .table thead {
                display: none;
            }

            .table,
            .table tbody,
            .table tr,
            .table td {
                display: block;
                width: 100%;
            }

            .table tr {
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 10px;
            }

            .table td {
                text-align: left;
                position: relative;
            }

            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
                font-weight: bold;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header bg-primary mb-4 p-3 d-flex justify-content-between">
        <a href="dashboard.php" class="text-white text-decoration-none">
            <img src="assets/images/logo.png" width="30" height="30" alt="CARE">
        </a>
        <a href="dashboard.php" class="text-white text-decoration-none">Back to Dashboard</a>
    </div>
    <div class="container mt-4">
        <!-- Breadcrumb Navigation -->
        <section class="mt-3">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Book Appointment</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <!-- Booking Form -->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="border rounded p-4 shadow-sm bg-white">
                    <h4 class="mb-4 text-primary">Book an Appointment</h4>

                    <?php if (!empty($msg)): ?>
                        <div class="alert alert-info"><?php echo htmlentities($msg); ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Doctor Specialization</label>
                            <select name="Doctorspecialization" class="form-select" onchange="getdoctor(this.value);" required>
                                <option value="">Select Specialization</option>
                                <?php
                                $ret = mysqli_query($con, "SELECT * FROM doctorspecilization");
                                while ($row = mysqli_fetch_array($ret)) {
                                    echo '<option value="' . htmlentities($row['specilization']) . '">' . htmlentities($row['specilization']) . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Select Doctor</label>
                            <select name="doctor" class="form-select" id="doctor" onchange="getfee(this.value);" required>
                                <option value="">Select Doctor</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Consultancy Fees</label>
                            <input type="text" name="fees" class="form-control" id="fees" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Appointment Date</label>
                            <input type="date" name="appdate" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Appointment Time</label>
                            <input type="time" name="apptime" class="form-control" required>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-calendar-check"></i> Book Appointment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include('includes/footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
       function getdoctor(val) {
    $.ajax({
        type: "POST",
        url: "get_doctor.php",
        data: 'specilizationid=' + val,
        success: function(data) {
            $("#doctor").html(data);
        }
    });
}

        function getfee(val) {
            $.ajax({
                type: "POST",
                url: "get_doctor.php",
                data: 'doctor=' + val,
                success: function(data) {
                    $("#fees").val(data);
                }
            });
        }
    </script>
</body>

</html>