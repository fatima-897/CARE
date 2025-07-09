<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location: auth/logout.php');
} else {

    if (isset($_POST['submit'])) {
        $docid = $_SESSION['id'];
        $patname = $_POST['patname'];
        $patcontact = $_POST['patcontact'];
        $patemail = $_POST['patemail'];
        $gender = $_POST['gender'];
        $pataddress = $_POST['pataddress'];
        $patage = $_POST['patage'];
        $medhis = $_POST['medhis'];
        $sql = mysqli_query($con, "insert into tblpatient(Docid,PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientAge,PatientMedhis) values('$docid','$patname','$patcontact','$patemail','$gender','$pataddress','$patage','$medhis')");
        if ($sql) {
            echo "<script>alert('Patient info added Successfully');</script>";
            echo "<script>window.location.href ='manage-patient.php'</script>";
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <title>Add Patient | Doctor</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

    </head>

    <body>
        <!-- Header -->
        <div class="header bg-primary mb-4 p-3 d-flex justify-content-between">
            <a href="dashboard.php" class="text-white text-decoration-none">
                <img src="assets/images/logo.png" width="30" height="30" alt="CARE">
            </a>
            <a href="dashboard.php" class="text-white text-decoration-none">Back to Dashboard</a>
        </div>
        <!-- Main Content -->
        <div class="page-wrapper">
            <div class="content container mt-2 pt-2">
                <div class="row mb-4">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <h4 class="page-title">Add New Patient</h4>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="row">
                    <div class="col-lg-8 col-md-10">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h5 class="panel-title">Patient Registration Form</h5>
                            </div>
                            <div class="panel-body">
                                <form role="form" name="" method="post">

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Patient Name</label>
                                            <input type="text" name="patname" class="form-control" placeholder="Enter Patient Name" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Contact Number</label>
                                            <input type="text" name="patcontact" class="form-control" placeholder="Enter Contact No." required maxlength="10" pattern="[0-9]+">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Email</label>
                                            <input type="email" id="patemail" name="patemail" class="form-control" placeholder="Enter Email" required onBlur="userAvailability()">
                                            <span id="user-availability-status1" style="font-size:12px;"></span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Gender</label>
                                            <div class="d-flex align-items-center gap-3 mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender" id="rg-male" value="male">
                                                    <label class="form-check-label" for="rg-male">Male</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender" id="rg-female" value="female">
                                                    <label class="form-check-label" for="rg-female">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label>Address</label>
                                            <textarea name="pataddress" class="form-control" rows="2" placeholder="Enter Address" required></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Age</label>
                                            <input type="text" name="patage" class="form-control" placeholder="Enter Age" required>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label>Medical History</label>
                                            <textarea name="medhis" class="form-control" rows="3" placeholder="Enter Medical History (if any)" required></textarea>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Add Patient</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <?php include('includes/footer.php'); ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>

    </html>
<?php } ?>