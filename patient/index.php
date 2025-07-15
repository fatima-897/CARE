<?php
session_start();
error_reporting(0);
include("includes/config.php");
if (isset($_POST['submit'])) {
    $puname = $_POST['email'];
    $ppwd = md5($_POST['password']);

    $ret = mysqli_query($con, "SELECT * FROM users WHERE email='$puname' and password='$ppwd'");
    $num = mysqli_fetch_array($ret);

    if ($num > 0) {
        $_SESSION['login'] = $_POST['email'];
        $_SESSION['id'] = $num['id'];
        $pid = $num['id'];
        $host = $_SERVER['HTTP_HOST'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;

        // Successful login log
        $log = mysqli_query($con, "insert into userlog(uid,username,userip,status) values('$pid','$puname','$uip','$status')");
        header("location:dashboard.php");
    } else {
        // Failed login log
        $_SESSION['login'] = $_POST['email'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 0;
        mysqli_query($con, "insert into userlog(username,userip,status) values('$puname','$uip','$status')");

        echo "<script>alert('Invalid username or password');</script>";
        echo "<script>window.location.href='user-login.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <title>User Registration | Patient</title>

    <!-- CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <div class="main-wrapper account-wrapper py-5 bg-light">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box shadow">
                    <form class="form-signin p-4" method="post">
                        <div class="account-logo text-center mb-4">
                            <a href="../index.php"><img src="assets/images/logo-dark.png" alt="CARE Logo" class="img-fluid" style="height: 60px;"></a>
                        </div>

                        <h4 class="text-center mb-4">Patient Login</h4>

                        <p class="text-center text-danger">
                            <?php echo htmlentities($_SESSION['errmsg']); ?>
                            <?php echo htmlentities($_SESSION['errmsg'] = ""); ?>
                        </p>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                        </div>

                        <div class="form-group text-start mb-3">
                            Don't have an account? <a href="auth/register.php">Create an account</a>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
                        </div>

                        <div class="text-center">
                            <a href="../index.php">Back to Home Page</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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