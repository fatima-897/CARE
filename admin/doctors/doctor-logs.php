<?php
session_start();
//error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:../auth/logout.php');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Admin | Doctor Session Logs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- Bootstrap 5 & FontAwesome -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>

    <body>
        <div class="page-wrapper">
            <!-- Header -->
            <div class="header bg-primary mb-4 p-3 d-flex justify-content-between">
                <a href="./dashboard.php" class="text-white text-decoration-none">
                    <img src="../assets/images/logo.png" width="30" height="30" alt="CARE">
                </a>
                <a href="../dashboard.php" class="text-white text-decoration-none">Back to Dashboard</a>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="page-title">Doctor Session Logs</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User ID</th>
                                        <th>Username</th>
                                        <th>User IP</th>
                                        <th>Login Time</th>
                                        <th>Logout Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = mysqli_query($con, "SELECT * FROM doctorslog");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $cnt; ?>.</td>
                                            <td><?php echo $row['uid']; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['userip']; ?></td>
                                            <td><?php echo $row['loginTime']; ?></td>
                                            <td><?php echo $row['logout']; ?></td>
                                            <td>
                                                <?php if ($row['status'] == 1) {
                                                    echo '<span class="badge badge-success">Success</span>';
                                                } else {
                                                    echo '<span class="badge badge-danger">Failed</span>';
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
            <?php include('../includes/footer.php'); ?>
        </div>

        <!-- Scripts -->
        <script src="../assets/js/jquery-3.6.0.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/app.js"></script>
    </body>

    </html>
<?php } ?>