<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location: auth/logout.php');
} else {

    if (isset($_POST['submit'])) {
        $eid = $_GET['editid'];
        $patname = $_POST['patname'];
        $patcontact = $_POST['patcontact'];
        $patemail = $_POST['patemail'];
        $gender = $_POST['gender'];
        $pataddress = $_POST['pataddress'];
        $patage = $_POST['patage'];
        $medhis = $_POST['medhis'];
        $sql = mysqli_query($con, "update tblpatient set PatientName='$patname',PatientContno='$patcontact',PatientEmail='$patemail',PatientGender='$gender',PatientAdd='$pataddress',PatientAge='$patage',PatientMedhis='$medhis' where ID='$eid'");
        if ($sql) {
            echo "<script>alert('Patient info updated Successfully');</script>";
            header('location: manage-patient.php');
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <title>Edit Patient | Doctor</title>
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
        <div class="container mt-5 py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="row mb-2 d-flex justify-content-between">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <h4 class="page-title">Edit Patient</h4>
                              <ol class="breadcrumb bg-light rounded px-3 py-2">
                                <li class="breadcrumb-item">
                                    <a href="manage-patient.php" class="text-decoration-none">Manage Patients</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Patient
                                </li>
                            </ol>
                        </div>
                    </div>
                    <form role="form" method="post">
                        <?php
                        $eid = $_GET['editid'];
                        $ret = mysqli_query($con, "SELECT * FROM tblpatient WHERE ID='$eid'");
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                            <div class="mb-3">
                                <label class="form-label">Patient Name</label>
                                <input type="text" name="patname" class="form-control" value="<?php echo $row['PatientName']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Patient Contact No</label>
                                <input type="text" name="patcontact" class="form-control" value="<?php echo $row['PatientContno']; ?>" required maxlength="10" pattern="[0-9]+">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Patient Email</label>
                                <input type="email" name="patemail" class="form-control" value="<?php echo $row['PatientEmail']; ?>" readonly>
                                <div id="email-availability-status" class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label d-block">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Female" <?php if ($row['Gender'] == "Female") echo "checked"; ?>>
                                    <label class="form-check-label">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Male" <?php if ($row['Gender'] == "Male") echo "checked"; ?>>
                                    <label class="form-check-label">Male</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Patient Address</label>
                                <textarea name="pataddress" class="form-control" required><?php echo $row['PatientAdd']; ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Patient Age</label>
                                <input type="text" name="patage" class="form-control" value="<?php echo $row['PatientAge']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Medical History</label>
                                <textarea name="medhis" class="form-control" placeholder="Enter Patient Medical History" required><?php echo $row['PatientMedhis']; ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Creation Date</label>
                                <input type="text" class="form-control" value="<?php echo $row['CreationDate']; ?>" readonly>
                            </div>

                            <div class="text-end">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        <?php } ?>
                    </form>
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