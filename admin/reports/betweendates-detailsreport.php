<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/images/favicon.ico">
        <title>Between Dates Details Reports | Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

                .table thead {
                    background-color: #0d6efd;
                    color: white;
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

            .card {
                border: none;
                border-radius: 0.5rem;
                box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
                margin-bottom: 2rem;
            }

            .card-header {
                background-color: #0d6efd;
                color: white;
                padding: 1rem 1.5rem;
                border-bottom: 1px solid rgba(0, 0, 0, .125);
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

        <div class="container mt-5 py-5">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="p-2 mb-0">Patient Report - Between Dates</h5>
                </div>
                <div class="card-body">
                    <?php
                    $fdate = $_POST['fromdate'];
                    $tdate = $_POST['todate'];
                    ?>
                    <h6 class="mb-4 text-center text-secondary">Report from <strong><?php echo $fdate ?></strong> to <strong><?php echo $tdate ?></strong></h6>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Patient Name</th>
                                    <th>Contact Number</th>
                                    <th>Gender</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = mysqli_query($con, "SELECT * FROM tblpatient WHERE date(CreationDate) BETWEEN '$fdate' AND '$tdate'");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $cnt; ?>.</td>
                                        <td><?php echo $row['PatientName']; ?></td>
                                        <td><?php echo $row['PatientContno']; ?></td>
                                        <td><?php echo $row['PatientGender']; ?></td>
                                        <td><?php echo $row['CreationDate']; ?></td>
                                        <td><?php echo $row['UpdationDate']; ?></td>
                                        <td>
                                            <a href="../patients/view-patient.php?viewid=<?php echo $row['ID']; ?>" class="btn btn-sm btn-outline-primary" target="_blank">View</a>
                                        </td>
                                    </tr>
                                <?php
                                    $cnt++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php include('../includes/footer.php'); ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/main.js"></script>
    </body>

    </html>
<?php } ?>