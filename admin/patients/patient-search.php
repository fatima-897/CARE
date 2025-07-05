<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:../auth/logout.php');
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <title>Patient Search| Admin</title>

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
                </div>
                <div class="container py-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Search Patients</h4>
        </div>
        <div class="card-body">
            <form role="form" method="post" name="search">
                <div class="row g-3">
                    <div class="col-md-10 col-sm-9">
                        <label for="searchdata" class="form-label">Search by Name or Mobile No.</label>
                        <input type="text" name="searchdata" id="searchdata" class="form-control" required>
                    </div>
                    <div class="col-md-2 col-sm-3 d-grid align-items-end">
                        <label class="form-label invisible">Submit</label>
                        <button type="submit" name="search" id="submit" class="btn btn-success">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php if (isset($_POST['search'])) {
        $sdata = $_POST['searchdata'];
        $sql = mysqli_query($con, "SELECT * FROM tblpatient WHERE PatientName LIKE '%$sdata%' OR PatientContno LIKE '%$sdata%'");
        $num = mysqli_num_rows($sql);
    ?>

    <div class="card">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Results for: "<?php echo htmlentities($sdata); ?>"</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Gender</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($num > 0) {
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <td><?php echo $cnt; ?>.</td>
                            <td><?php echo htmlentities($row['PatientName']); ?></td>
                            <td><?php echo htmlentities($row['PatientContno']); ?></td>
                            <td><?php echo htmlentities($row['PatientGender']); ?></td>
                            <td><?php echo htmlentities($row['CreationDate']); ?></td>
                            <td><?php echo htmlentities($row['UpdationDate']); ?></td>
                            <td>
                                <a href="view-patient.php?viewid=<?php echo $row['ID']; ?>" class="btn btn-sm btn-primary" target="_blank">View</a>
                            </td>
                        </tr>
                    <?php $cnt++; } } else { ?>
                        <tr>
                            <td colspan="7" class="text-center text-danger">No records found</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php } ?>
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