<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:../auth/logout.php');
} else {


    if (isset($_GET['del'])) {
        $docid = $_GET['id'];
        mysqli_query($con, "delete from doctors where id ='$docid'");
        $_SESSION['msg'] = "data deleted !!";
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <title>Manage Doctor | Admin</title>

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
                display: flex;
                width: 100%;
                flex-wrap: wrap;                
                text-align: left;
            }

            .table tr {
                margin-bottom: 15px;
                border: 1px solid #ddd;
                padding: 10px;
                text-align: left;
            }

            .table td {
                position: relative;
                text-align: left;
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
            <a href="../dashboard.php" class="text-white text-decoration-none">
                <img src="../assets/images/logo.png" width="30" height="30" alt="CARE">
            </a>
            <a href="../dashboard.php" class="text-white text-decoration-none">Back to Dashboard</a>
        </div>

        <!-- Main Content -->
        <div class="container mt-5 pt-5">
            <div class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-title">Manage Doctors</h4>
                        <p class="text-danger">
                            <?php echo htmlentities($_SESSION['msg']); ?>
                            <?php echo htmlentities($_SESSION['msg'] = ""); ?>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Specialization</th>
                                        <th scope="col">Doctor Name</th>
                                        <th scope="col">Creation Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = mysqli_query($con, "SELECT * FROM doctors");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $cnt; ?>.</th>
                                            <td><?php echo htmlentities($row['specilization']); ?></td>
                                            <td><?php echo htmlentities($row['doctorName']); ?></td>
                                            <td><?php echo htmlentities($row['creationDate']); ?></td>
                                            <td>
                                                <a href="edit-doctor.php?id=<?php echo $row['id']; ?>" class="btn btn-info text-light me-1">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="manage-doctors.php?id=<?php echo $row['id'] ?>&del=delete" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
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