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
        <title>Admin | Manage Patients</title>
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
            <h4 class="my-5">Manage Patients</h4>
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Patient Name</th>
                        <th>Contact Number</th>
                        <th>Gender</th>
                        <th>Created On</th>
                        <th>Updated On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($con, "SELECT * FROM tblpatient");
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
                                <a href="view-patient.php?viewid=<?php echo $row['ID']; ?>" class="btn btn-sm btn-primary" target="_blank">View</a>
                            </td>
                        </tr>
                    <?php $cnt++;
                    } ?>
                </tbody>
            </table>
        </div>
        <?php include('../includes/footer.php'); ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/main.js"></script>
    </body>

    </html>
<?php } ?>