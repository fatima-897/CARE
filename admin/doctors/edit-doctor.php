<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:../auth/logout.php');
} else {

    $did = intval($_GET['id']); // get doctor id
    if (isset($_POST['submit'])) {
        $docspecialization = $_POST['Doctorspecialization'];
        $docname = $_POST['docname'];
        $docaddress = $_POST['clinicaddress'];
        $docfees = $_POST['docfees'];
        $doccontactno = $_POST['doccontact'];
        $docemail = $_POST['docemail'];
        $sql = mysqli_query($con, "Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno',docEmail='$docemail' where id='$did'");
        if ($sql) {
            $msg = "Doctor Details updated Successfully";
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <title>Edit Doctor | Admin</title>

        <!-- Bootstrap 5 & FontAwesome -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        </style>
    </head>

    <body>

        <!-- Header -->
        <div class="header bg-primary mb-4 p-3 d-flex justify-content-between">
            <a href="../dashboard.php" class="text-white text-decoration-none">
                <img src="../assets/images/logo.png" width="30" height="30" alt="CARE">
            </a>
            <a href="../dashboard.php" class="text-white text-decoration-none">Back to Dashboard</a>
        </div>

        <!-- Main Content -->
        <div class="container mt-5 pt-5">
            <?php
            $sql = mysqli_query($con, "SELECT * FROM doctors WHERE id='$did'");
            $data = mysqli_fetch_array($sql);
            ?>
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Doctor</h4>
                        <h4><?php echo htmlentities($data['doctorName']); ?>'s Profile</h4>
                        <p><b>Profile Reg. Date: </b><?php echo htmlentities($data['creationDate']); ?></p>
                        <?php if ($data['updationDate']) { ?>
                            <p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']); ?></p>
                        <?php } ?>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Doctor Specialization <span class="text-danger">*</span></label>
                                        <select name="Doctorspecialization" class="form-control" required>
                                            <option value="<?php echo htmlentities($data['specilization']); ?>">
                                                <?php echo htmlentities($data['specilization']); ?>
                                            </option>
                                            <?php $ret = mysqli_query($con, "SELECT * FROM doctorspecilization");
                                            while ($row = mysqli_fetch_array($ret)) { ?>
                                                <option value="<?php echo htmlentities($row['specilization']); ?>">
                                                    <?php echo htmlentities($row['specilization']); ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Doctor Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="docname" value="<?php echo htmlentities($data['doctorName']); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Clinic Address <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="clinicaddress" rows="3"><?php echo htmlentities($data['address']); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Consultancy Fees (PKR)</label>
                                        <input class="form-control" type="text" name="docfees" value="<?php echo htmlentities($data['docFees']); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input class="form-control" type="text" name="doccontact" value="<?php echo htmlentities($data['contactno']); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="email" name="docemail" value="<?php echo htmlentities($data['docEmail']); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" type="submit" name="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include('../includes/footer.php'); ?>

        <!-- JS Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/main.js"></script>
        <script>
            function checkemailAvailability() {
                $.ajax({
                    url: "check_availability.php",
                    method: "POST",
                    data: {
                        emailid: $("#docemail").val()
                    },
                    success: function(data) {
                        $("#email-availability-status").html(data);
                    }
                });
            }
        </script>
    </body>

    </html>
<?php } ?>