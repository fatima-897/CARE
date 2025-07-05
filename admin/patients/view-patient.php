<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:../auth/logout.php');
} else {
    if (isset($_POST['submit'])) {

        $vid = $_GET['viewid'];
        $bp = $_POST['bp'];
        $bs = $_POST['bs'];
        $weight = $_POST['weight'];
        $temp = $_POST['temp'];
        $pres = $_POST['pres'];


        $query .= mysqli_query($con, "insert   tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$pres')");
        if ($query) {
            echo '<script>alert("Medicle history has been added.")</script>';
            echo "<script>window.location.href ='manage-patient.php'</script>";
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <title>View Patient| Admin</title>

        <!-- Bootstrap 5 & FontAwesome -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
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
            <a href="./dashboard.php" class="text-white text-decoration-none">
                <img src="../assets/images/logo.png" width="30" height="30" alt="CARE">
            </a>
            <a href="../dashboard.php" class="text-white text-decoration-none">Back to Dashboard</a>
        </div>
        <!-- Main Content -->
        <div class="container mt-5 pt-4">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h4 class="page-title mb-4">Patient Details</h4>
                    <?php
                    $vid = $_GET['viewid'];
                    $ret = mysqli_query($con, "SELECT * FROM tblpatient WHERE ID='$vid'");
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">Patient Information</div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6"><strong>Patient Name:</strong> <?php echo $row['PatientName']; ?></div>
                                    <div class="col-md-6"><strong>Email:</strong> <?php echo $row['PatientEmail']; ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6"><strong>Mobile Number:</strong> <?php echo $row['PatientContno']; ?></div>
                                    <div class="col-md-6"><strong>Address:</strong> <?php echo $row['PatientAdd']; ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6"><strong>Gender:</strong> <?php echo $row['PatientGender']; ?></div>
                                    <div class="col-md-6"><strong>Age:</strong> <?php echo $row['PatientAge']; ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6"><strong>Medical History:</strong> <?php echo $row['PatientMedhis']; ?></div>
                                    <div class="col-md-6"><strong>Registration Date:</strong> <?php echo $row['CreationDate']; ?></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php
                    $ret = mysqli_query($con, "SELECT * FROM tblmedicalhistory WHERE PatientID='$vid'");
                    ?>
                    <div class="card">
                        <div class="card-header bg-success text-white">Medical History</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Blood Pressure</th>
                                            <th>Weight</th>
                                            <th>Blood Sugar</th>
                                            <th>Temperature</th>
                                            <th>Prescription</th>
                                            <th>Visit Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $row['BloodPressure']; ?></td>
                                                <td><?php echo $row['Weight']; ?></td>
                                                <td><?php echo $row['BloodSugar']; ?></td>
                                                <td><?php echo $row['Temperature']; ?></td>
                                                <td><?php echo $row['MedicalPres']; ?></td>
                                                <td><?php echo $row['CreationDate']; ?></td>
                                            </tr>
                                        <?php $cnt++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
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