<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location: auth/logout.php');
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <title>Manage Patient | Doctor</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
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
        <!-- Main Content -->

        <div class="container mt-5 py-4">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row mb-2">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <h4 class="page-title">Manage Patient</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Patient Name</th>
                                    <th>Contact Number</th>
                                    <th>Gender</th>
                                    <th>Creation Date</th>
                                    <th>Updation Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $docid = $_SESSION['id'];
                                $sql = mysqli_query($con, "SELECT * FROM tblpatient WHERE Docid='$docid'");
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
                                            <a href="edit-patient.php?editid=<?php echo $row['ID']; ?>"
                                                class="btn btn-sm btn-primary me-2 mb-1" target="_blank">
                                                <i class="fa fa-edit me-1"></i>Edit
                                            </a>

                                            <a href="view-patient.php?viewid=<?php echo $row['ID']; ?>"
                                                class="btn btn-sm btn-outline-info mb-1" target="_blank">
                                                <i class="fa fa-eye me-1"></i>View
                                            </a>
                                        </td>
                                    </tr>
                                <?php $cnt++;
                                } ?>
                            </tbody>
                        </table>
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