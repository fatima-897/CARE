<?php
session_start();
error_reporting(0);
include("includes/config.php");

if (isset($_POST['submit'])) {
    $uname = $_POST['username'];
    $dpassword = md5($_POST['password']);
    $ret = mysqli_query($con, "SELECT * FROM doctors WHERE docEmail='$uname' and password='$dpassword'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        $_SESSION['dlogin'] = $_POST['username'];
        $_SESSION['id'] = $num['id'];
        $uid = $num['id'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;
        //Code Logs
        $log = mysqli_query($con, "insert into doctorslog(uid,username,userip,status) values('$uid','$uname','$uip','$status')");

        header("location:dashboard.php");
    } else {

        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 0;
        mysqli_query($con, "insert into doctorslog(username,userip,status) values('$uname','$uip','$status')");
        echo "<script>alert('Invalid username or password');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Doctor Login | CARE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="assets\images\favicon.ico">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form class="form-signin" method="post">
                        <div class="account-logo">
                            <a href="../index.php"><img src="assets/images/logo-dark.png" alt="CARE"></a>
                        </div>

                        <h4 class="text-center">Doctor Login</h4>

                        <p style="color:red;" class="text-center">
                            <?php echo htmlentities($_SESSION['errmsg']); ?>
                            <?php echo htmlentities($_SESSION['errmsg'] = ""); ?>
                        </p>

                        <div class="form-group">
                            <label>Email</label>
                            <input name="username" type="text" class="form-control" placeholder="Enter Email"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Enter password"
                                required>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" name="submit" class="btn btn-primary account-btn">Login</button>
                        </div>

                        <div class="text-center register-link">
                            <a href="../index.php">Back to Home Page</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/login.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            Login.init();
        });
    </script>
</body>

</html>