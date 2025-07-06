<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:../auth/logout.php');
} else {

    //updating Admin Remark
    if (isset($_POST['update'])) {
        $qid = intval($_GET['id']);
        $adminremark = $_POST['adminremark'];
        $isread = 1;
        $query = mysqli_query($con, "update tblcontactus set  AdminRemark='$adminremark',IsRead='$isread' where id='$qid'");
        if ($query) {
            echo "<script>alert('Admin Remark updated successfully.');</script>";
            echo "<script>window.location.href ='read-query.php'</script>";
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/images/favicon.ico">
        <title>Query Details | Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
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
            <div class="container py-5">
                <h2 class="mb-4">Query Details</h2>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <?php
                                    $qid = intval($_GET['id']);
                                    $sql = mysqli_query($con, "SELECT * FROM tblcontactus WHERE id='$qid'");
                                    while ($row = mysqli_fetch_array($sql)) {
                                    ?>

                                        <tr>
                                            <th scope="row">Full Name</th>
                                            <td><?php echo htmlentities($row['fullname']); ?></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Email ID</th>
                                            <td><?php echo htmlentities($row['email']); ?></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Contact Number</th>
                                            <td><?php echo htmlentities($row['contactno']); ?></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Message</th>
                                            <td><?php echo htmlentities($row['message']); ?></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Query Date</th>
                                            <td><?php echo htmlentities($row['PostingDate']); ?></td>
                                        </tr>

                                        <?php if ($row['AdminRemark'] == "") { ?>
                                            <form method="post">
                                                <tr>
                                                    <th scope="row">Admin Remark</th>
                                                    <td><textarea name="adminremark" class="form-control" required></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <button type="submit" class="btn btn-success mt-2" name="update">Update <i class="fa fa-check-circle"></i></button>
                                                    </td>
                                                </tr>
                                            </form>
                                        <?php } else { ?>

                                            <tr>
                                                <th scope="row">Admin Remark</th>
                                                <td><?php echo htmlentities($row['AdminRemark']); ?></td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Last Updation Date</th>
                                                <td><?php echo htmlentities($row['LastupdationDate']); ?></td>
                                            </tr>

                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
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

<?php
}
include('../includes/footer.php');
?>