<?php
session_start();
include("../includes/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <title>Manage Appointment Requests | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4@5.0.12/bootstrap-4.min.css">
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
    <div class="header bg-primary mb-5 p-3 d-flex justify-content-between">
        <a href="./dashboard.php" class="text-white text-decoration-none">
            <img src="../assets/images/logo.png" width="30" height="30" alt="CARE">
        </a>
        <a href="../dashboard.php" class="text-white text-decoration-none">Back to Dashboard</a>
    </div>
    <div class="container bg-white mt-5 pt-5 pb-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-primary">Appointment Requests</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Requested Date</th>
                        <th>Requested At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cnt = 1;
                    $query = mysqli_query($con, "SELECT * FROM appointment_requests ORDER BY created_at DESC");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $cnt++; ?>.</td>
                            <td><?php echo htmlentities($row['name']); ?></td>
                            <td><?php echo htmlentities($row['number']); ?></td>
                            <td><?php echo htmlentities($row['email']); ?></td>
                            <td><?php echo htmlentities($row['appointment_date']); ?></td>
                            <td><?php echo date("M d, Y - h:i A", strtotime($row['created_at'])); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>



    <?php include('../includes/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="../assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>