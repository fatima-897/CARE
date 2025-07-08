<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
	header('location: auth/logout.php');
} else {
	if (isset($_GET['cancel'])) {
		mysqli_query($con, "update appointment set userStatus='0' where id = '" . $_GET['id'] . "'");
		$_SESSION['msg'] = "Your appointment canceled !!";
	}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <title>Appointment History | Patient</title>
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

        <div class="container mt-5 py-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Appointment History</h4>
                </div>
                <div class="card-body">
                    <p style="color:red;">
                        <?php echo htmlentities($_SESSION['msg']); ?>
                        <?php echo htmlentities($_SESSION['msg'] = ""); ?>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Doctor Name</th>
                                    <th>Specialization</th>
                                    <th>Fee</th>
                                    <th>Date / Time</th>
                                    <th>Created On</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = mysqli_query($con, "SELECT doctors.doctorName AS docname, appointment.* FROM appointment JOIN doctors ON doctors.id = appointment.doctorId WHERE appointment.userId='" . $_SESSION['id'] . "'");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $cnt; ?>.</td>
                                        <td><?php echo htmlentities($row['docname']); ?></td>
                                        <td><?php echo htmlentities($row['doctorSpecialization']); ?></td>
                                        <td><?php echo htmlentities($row['consultancyFees']); ?></td>
                                        <td><?php echo htmlentities($row['appointmentDate']); ?> / <?php echo htmlentities($row['appointmentTime']); ?></td>
                                        <td><?php echo htmlentities($row['postingDate']); ?></td>
                                        <td>
                                            <?php
                                            if ($row['userStatus'] == 1 && $row['doctorStatus'] == 1) echo "Active";
                                            elseif ($row['userStatus'] == 0 && $row['doctorStatus'] == 1) echo "Cancelled by You";
                                            elseif ($row['userStatus'] == 1 && $row['doctorStatus'] == 0) echo "Cancelled by Doctor";
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($row['userStatus'] == 1 && $row['doctorStatus'] == 1) { ?>
                                                <a href="appointment-history.php?id=<?php echo $row['id'] ?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')" class="btn btn-danger btn-sm">Cancel</a>
                                            <?php } else {
                                                echo "Canceled";
                                            } ?>
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