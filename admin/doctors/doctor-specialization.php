<?php
session_start();
include('../includes/config.php');


// Redirect if not logged in
if (strlen($_SESSION['id']) == 0) {
    header('location:../auth/logout.php');
    exit();
}

// Add Specialization
if (isset($_POST['submit'])) {
    $doctorspecilization = mysqli_real_escape_string($con, $_POST['doctorspecilization']);
    mysqli_query($con, "INSERT INTO doctorspecilization(specilization) VALUES('$doctorspecilization')");
    $_SESSION['msg'] = "Doctor Specialization added successfully!";
}

// Delete Specialization
if (isset($_GET['del'])) {
    $sid = intval($_GET['id']);
    mysqli_query($con, "DELETE FROM doctorspecilization WHERE id='$sid'");
    $_SESSION['msg'] = "Specialization deleted successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Manage Doctor Specialization | Admin - CARE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- Bootstrap 5 & FontAwesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        .table td,
        .table th {
            vertical-align: middle;
        }

        @media(max-width:768px) {
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
                background: #fff;
                border-radius: 8px;
                padding: 10px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.05);
            }

            .table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: 50%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
                font-weight: 600;
                color: #555;
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
        <a href="../dashboard.php" class="text-white">Back to Dashboard</a>
    </div>

    <!-- Main Content -->
    <div class="container py-4">
        <h3 class="mt-5 mb-4">Manage Doctor Specialization</h3>

        <!-- Session Message -->
        <?php if (!empty($_SESSION['msg'])) { ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?php echo htmlentities($_SESSION['msg']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php $_SESSION['msg'] = ""; ?>
        <?php } ?>

        <!-- Add Specialization -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Add Specialization</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Doctor Specialization</label>
                        <input type="text" name="doctorspecilization" class="form-control"
                            placeholder="Enter Doctor Specialization" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Add</button>
                </form>
            </div>
        </div>

        <!-- Specializations List -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Specializations List</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Specialization</th>
                                <th>Creation Date</th>
                                <th>Updation Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = mysqli_query($con, "SELECT * FROM doctorspecilization");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo htmlentities($row['specilization']); ?></td>
                                    <td><?php echo htmlentities($row['creationDate']); ?></td>
                                    <td><?php echo htmlentities($row['updationDate'] ?? ''); ?></td>
                                    <td>
                                        <a href="edit-doctor.php?id=<?php echo $row['id']; ?>"
                                            class="btn btn-primary">Edit</a>
                                        <a href="doctor-specialization.php?id=<?php echo $row['id']; ?>&del=delete"
                                            onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
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

    <!-- Footer -->
    <?php include('../includes/footer.php'); ?>

    <!-- JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>
