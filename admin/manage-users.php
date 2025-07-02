<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Authentication Check
if (!isset($_SESSION['id']) || $_SESSION['id'] == '') {
    header('location:logout.php');
    exit();
}

// Delete User
if (isset($_GET['del'])) {
    $uid = intval($_GET['id']);
    mysqli_query($con, "DELETE FROM users WHERE id ='$uid'");
    $_SESSION['msg'] = "User deleted successfully!";
    header("Location: manage-users.php");
    exit();
}

// Update User
if (isset($_POST['update'])) {
    $userid = intval($_POST['userid']);
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];

    $query = mysqli_query($con, "UPDATE users SET fullName='$fullname', address='$address', city='$city', gender='$gender', email='$email', updationDate=NOW() WHERE id='$userid'");

    if ($query) {
        $_SESSION['msg'] = "User updated successfully!";
    } else {
        $_SESSION['msg'] = "Error updating user.";
    }
    header("Location: manage-users.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Manage Users | CARE Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
                text-align: right;
                padding-left: 50%;
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
    <div class="header bg-primary mb-4 p-3 d-flex justify-content-between">
        <a href="dashboard.php" class="text-white text-decoration-none">
            <img src="assets/images/logo.png" width="30" height="30" alt="CARE">
        </a>
        <a href="dashboard.php" class="text-white">Back to Dashboard</a>
    </div>

    <div class="container">
        <h3 class="mt-5 pt-5 mb-4">Manage Users</h3>

        <?php if ($_SESSION['msg']) { ?>
            <div class="alert alert-info"><?php echo htmlentities($_SESSION['msg']); ?></div>
            <?php $_SESSION['msg'] = ""; ?>
        <?php } ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-lights">
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Registered</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($con, "SELECT * FROM users");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <td data-label="#"><?php echo $cnt; ?></td>
                            <td data-label="Full Name"><?php echo htmlentities($row['fullName']); ?></td>
                            <td data-label="Address"><?php echo htmlentities($row['address']); ?></td>
                            <td data-label="City"><?php echo htmlentities($row['city']); ?></td>
                            <td data-label="Gender"><?php echo htmlentities($row['gender']); ?></td>
                            <td data-label="Email"><?php echo htmlentities($row['email']); ?></td>
                            <td data-label="Registered"><?php echo htmlentities($row['regDate']); ?></td>
                            <td data-label="Updated"><?php echo htmlentities($row['updationDate']); ?></td>
                            <td data-label="Action">
                                <!-- Delete Button -->
                                <a href="manage-users.php?id=<?php echo $row['id']; ?>&del=delete" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-sm btn-primary mb-1">
                                    <i class="fa fa-trash"></i> Delete
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

    <!-- JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
