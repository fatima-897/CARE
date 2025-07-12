<?php
session_start();
include('../includes/config.php');
include('../includes/checklogin.php');

date_default_timezone_set('Asia/Karachi');

if (isset($_POST['submit'])) {
    $currentTime = date('Y-m-d H:i:s');

    $cpass = md5($_POST['current_password']);
    $npass = md5($_POST['new_password']);
    $cfpass = md5($_POST['confirm_password']);

    $did = $_SESSION['id']; // same as used in your original reference

    if ($_POST['new_password'] !== $_POST['confirm_password']) {
        $_SESSION['msg'] = "❌ New Password and Confirm Password do not match!";
    } else {
        $sql = mysqli_query($con, "SELECT password FROM doctors WHERE password='$cpass' AND id='$did'");
        $row = mysqli_fetch_array($sql);

        if ($row) {
            $update = mysqli_query($con, "UPDATE doctors SET password='$npass', updationDate='$currentTime' WHERE id='$did'");

            if ($update) {
                $_SESSION['msg'] = "✅ Password Changed Successfully!";
            } else {
                $_SESSION['msg'] = "❌ Failed to update password in DB.";
            }
        } else {
            $_SESSION['msg'] = "❌ Current Password is incorrect!";
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon.ico">
    <title>Doctor | Change Password</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="main-wrapper">

        <div class="header">
            <div class="header-left">
                <a href="#" class="logo">
                    <img src="../assets/images/logo.png" width="35" height="35" alt="care">
                </a>
            </div>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="../assets/images/user.jpg" width="24" alt="Doctor">
                            <span class="status online"></span>
                        </span>
                        <span>Doctor</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../auth/logout.php">Logout</a>
                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                        class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="../auth/logout.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h4 class="page-title">Change Password</h4>

                        <!-- Display Message -->
                        <?php if (!empty($_SESSION['msg'])) { ?>
                            <div class="alert alert-info text-center">
                                <?php echo htmlentities($_SESSION['msg']); ?>
                                <?php $_SESSION['msg'] = ""; ?>
                            </div>
                        <?php } ?>

                        <form method="post">
                            <div class="form-group">
                                <label>Current Password</label>
                                <input type="password" name="current_password" class="form-control"
                                    placeholder="Enter current password" required>
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="new_password" class="form-control"
                                    placeholder="Enter new password" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm New Password</label>
                                <input type="password" name="confirm_password" class="form-control"
                                    placeholder="Confirm new password" required>
                            </div>

                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary">Update Password</button>
                            </div>
                            <div class="text-center mt-2 register-link">
                                <a href="../dashboard.php">Back to Dashboard</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.js"></script>
    <script src="../assets/js/app.js"></script>
</body>

</html>