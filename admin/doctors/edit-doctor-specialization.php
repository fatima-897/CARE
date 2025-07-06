<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:../auth/logout.php');
} else {

    if (isset($_POST['submit'])) {
        $doctorspecilization = $_POST['doctorspecilization'];
        $sql = mysqli_query($con, "UPDATE doctorSpecilization SET specilization='$doctorspecilization' WHERE id='$id'");

        $_SESSION['msg'] = "Doctor Specialization added successfully !!";
    }
    //Code Deletion
    if (isset($_GET['del'])) {
        $sid = $_GET['id'];
        mysqli_query($con, "delete from doctorSpecilization where id = '$sid'");
        $_SESSION['msg'] = "data deleted !!";
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <title>Edit Doctor Specialization| Admin</title>

        <!-- Bootstrap 5 & FontAwesome -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
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
        <div class="container mt-5 pt-4">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h4 class="page-title mb-4">Edit Doctor Specialization</h4>
                    <p class="text-danger">
                        <?php echo htmlentities($_SESSION['msg']); ?>
                        <?php echo htmlentities($_SESSION['msg'] = ""); ?>
                    </p>
                    <div class="card">
                        <div class="card-body">
                            <form role="form" name="dcotorspcl" method="post">
                                <?php
                                $id = intval($_GET['id']);
                                if (isset($_POST['submit'])) {
                                    $doctorspecilization = $_POST['doctorspecilization'];
                                    $sql = mysqli_query($con, "UPDATE doctorSpecilization SET specilization='$doctorspecilization' WHERE id='$id'");
                                    $_SESSION['msg'] = "Doctor Specialization updated successfully !!";
                                }

                                $sql = mysqli_query($con, "SELECT * FROM doctorSpecilization WHERE id='$id'");
                                $row = mysqli_fetch_array($sql);
                                ?>
                                <div class="mb-3">
                                    <label for="doctorspecilization" class="form-label">Doctor Specialization</label>
                                    <input type="text" name="doctorspecilization" class="form-control" id="doctorspecilization" value="<?php echo htmlentities($row['specilization']); ?>" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
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