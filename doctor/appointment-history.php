<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location: auth/logout.php');
} else {

    if (isset($_GET['cancel'])) {
        mysqli_query($con, "update appointment set doctorStatus='0' where id ='" . $_GET['id'] . "'");
        $_SESSION['msg'] = "Appointment canceled !!";
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <title>Add Patient | Doctor</title>
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
            <div class="row my-5">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h4 class="page-title">Appointment history</h4>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-lights">
                        <tr>
                            <th>#</th>
                            <th>Patient Name</th>
                            <th>Specialization</th>
                            <th>Consultancy Fee</th>
                            <th>Appointment Date / Time</th>
                            <th>Created On</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = mysqli_query($con, "SELECT users.fullName as fname, appointment.* FROM appointment JOIN users ON users.id = appointment.userId WHERE appointment.doctorId='" . $_SESSION['id'] . "'");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                            <tr>
                                <td data-label="#"><?php echo $cnt; ?>.</td>
                                <td data-label="Patient Name"><?php echo htmlentities($row['fname']); ?></td>
                                <td data-label="Specialization"><?php echo htmlentities($row['doctorSpecialization']); ?></td>
                                <td data-label="Consultancy Fee">Rs. <?php echo htmlentities($row['consultancyFees']); ?></td>
                                <td data-label="Appointment Date / Time">
                                    <?php echo htmlentities($row['appointmentDate']); ?><br>
                                    <small class="text-muted"><?php echo htmlentities($row['appointmentTime']); ?></small>
                                </td>
                                <td data-label="Created On"><?php echo htmlentities($row['postingDate']); ?></td>
                                <td data-label="Status">
                                    <?php
                                    if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                                        echo '<span class="badge bg-success">Active</span>';
                                    } elseif (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                                        echo '<span class="badge bg-danger">Cancelled by Patient</span>';
                                    } elseif (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                                        echo '<span class="badge bg-warning text-dark">Cancelled by You</span>';
                                    }
                                    ?>
                                </td>
                                <td data-label="Action">
                                    <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>
                                        <a href="appointment-history.php?id=<?php echo $row['id']; ?>&cancel=update"
                                            onclick="return confirm('Are you sure you want to cancel this appointment?');"
                                            class="btn btn-sm btn-primary mb-1">
                                            <i class="fa fa-times"></i> Cancel
                                        </a>
                                    <?php } else { ?>
                                        <span class="text-muted">Canceled</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php $cnt++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>




        <?php include('includes/footer.php'); ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>

    </html>
<?php } ?>