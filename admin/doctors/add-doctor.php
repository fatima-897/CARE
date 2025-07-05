<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:../auth/logout.php');
} else {
    if (isset($_POST['submit'])) {
        $docspecialization = $_POST['Doctorspecialization'];
        $docname = $_POST['docname'];
        $docaddress = $_POST['clinicaddress'];
        $docfees = $_POST['docfees'];
        $doccontactno = $_POST['doccontact'];
        $docemail = $_POST['docemail'];
        $password = md5($_POST['npass']);

        $sql = mysqli_query($con, "INSERT INTO doctors(specilization,doctorName,address,docFees,contactno,docEmail,password) VALUES('$docspecialization','$docname','$docaddress','$docfees','$doccontactno','$docemail','$password')");
        if ($sql) {
            echo "<script>alert('Doctor info added Successfully');</script>";
            echo "<script>window.location.href ='manage-doctors.php'</script>";
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <title>Add Doctor | CARE Admin</title>

        <!-- Bootstrap 5 & FontAwesome -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>

    <body>

        <!-- Header -->
        <div class="header bg-primary mb-4 p-3 d-flex justify-content-between">
            <a href="./dashboard.php" class="text-white text-decoration-none">
                <img src="../assets/images/logo.png" width="30" height="30" alt="CARE">
            </a>
            <a href="../dashboard.php" class="text-white text-decoration-none">Back to Dashboard</a>
        </div>

        <!-- Main Content -->
        <div class="container mt-5 pt-5 ">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title my-4">Add Doctor</h4>
                    <form method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Doctor Specialization <span class="text-danger">*</span></label>
                                <select name="Doctorspecialization" class="form-select" required>
                                    <option value="">Select Specialization</option>
                                    <?php
                                    $ret = mysqli_query($con, "SELECT * FROM doctorspecilization");
                                    while ($row = mysqli_fetch_array($ret)) {
                                        echo '<option value="' . htmlentities($row['specilization']) . '">' . htmlentities($row['specilization']) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>Doctor Name <span class="text-danger">*</span></label>
                                <input type="text" name="docname" class="form-control" required>
                            </div>
                            <div class="col-sm-6">
                                <label>Clinic Address</label>
                                <input type="text" name="clinicaddress" class="form-control" required>
                            </div>
                            <div class="col-sm-6">
                                <label>Consultancy Fees (PKR)</label>
                                <input type="number" name="docfees" class="form-control" required>
                            </div>
                            <div class="col-sm-6">
                                <label>Contact Number</label>
                                <input type="tel" name="doccontact" class="form-control" pattern="[0-9]{10,15}"
                                    required>
                            </div>
                            <div class="col-sm-6">
                                <label>Email</label>
                                <input type="email" name="docemail" id="docemail" class="form-control"
                                    onBlur="checkemailAvailability()" required>
                                <small id="email-availability-status" class="form-text text-muted"></small>
                            </div>
                            <div class="col-sm-6">
                                <label>Password</label>
                                <input type="password" name="npass" class="form-control" required>
                            </div>
                            <div class="col-sm-6">
                                <label>Confirm Password</label>
                                <input type="password" name="cfpass" class="form-control" required>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" name="submit" class="btn btn-primary">Create Doctor</button>
                        </div>
                    </form>
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