<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location: auth/logout.php');
} else {
    if (isset($_POST['submit'])) {
        $docspecialization = $_POST['specialization'];
        $docname = $_POST['doctorName'];
        $docaddress = $_POST['clinicAddress'];
        $docfees = $_POST['fees'];
        $doccontactno = $_POST['contact'];
        $docemail = $_POST['doctorEmail'];

        $sql = mysqli_query($con, "UPDATE doctors SET specilization='$docspecialization', doctorName='$docname', address='$docaddress', docFees='$docfees', contactno='$doccontactno' WHERE id='" . $_SESSION['id'] . "'");

        if ($sql) {
            echo "<script>alert('Doctor Details updated Successfully');</script>";
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <title>Edit Profile | Doctor</title>
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
            <!-- Breadcrumb Navigation -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="manage-doctor.php">Manage Doctors</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                </ol>
            </nav>

            <div class="row mb-4">
                <div class="col-md-8 mx-auto">
                    <h4 class="mb-3">Edit Doctor Profile</h4>
                    <?php
                    $did = $_SESSION['dlogin'];
                    $sql = mysqli_query($con, "SELECT * FROM doctors WHERE docEmail='$did'");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <form method="post" name="editprofile">
                            <div class="mb-3">
                                <label for="doctorName" class="form-label">Doctor Name</label>
                                <input type="text" name="doctorName" id="doctorName" class="form-control" value="<?php echo htmlentities($data['doctorName']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="doctorEmail" class="form-label">Email</label>
                                <input type="email" name="doctorEmail" id="doctorEmail" class="form-control" value="<?php echo htmlentities($data['docEmail']); ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="specialization" class="form-label">Specialization</label>
                                <select name="specialization" id="specialization" class="form-select" required>
                                    <option value="<?php echo htmlentities($data['specilization']); ?>"><?php echo htmlentities($data['specilization']); ?></option>
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM doctorspecilization");
                                    while ($row = mysqli_fetch_array($ret)) {
                                    ?>
                                        <option value="<?php echo htmlentities($row['specilization']); ?>">
                                            <?php echo htmlentities($row['specilization']); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="clinicAddress" class="form-label">Clinic Address</label>
                                <textarea name="clinicAddress" id="clinicAddress" class="form-control" rows="3"><?php echo htmlentities($data['address']); ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="fees" class="form-label">Consultancy Fees</label>
                                <input type="number" name="fees" id="fees" class="form-control" value="<?php echo htmlentities($data['docFees']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact Number</label>
                                <input type="text" name="contact" id="contact" class="form-control" value="<?php echo htmlentities($data['contactno']); ?>" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Update Profile
                            </button>
                        </form>
                    <?php } ?>
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