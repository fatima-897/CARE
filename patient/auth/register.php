<?php
include_once('../includes/config.php');

if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($con, $_POST['full_name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $gender = $_POST['gender'];
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['password_again'];

    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        $hashedPassword = md5($password);

        $query = mysqli_query($con, "INSERT INTO users(fullname, address, city, gender, email, password) 
            VALUES ('$fname', '$address', '$city', '$gender', '$email', '$hashedPassword')");

        if ($query) {
            echo "<script>alert('Successfully Registered. You can login now');</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
        }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="login">
    
<div class="main-wrapper account-wrapper py-5 bg-light">
    <div class="account-page">
        <div class="account-center">
            <div class="account-box shadow">
                <form name="registration" id="registration" method="post" class="form-signin p-4">
                    <div class="account-logo text-center mb-4">
                        <a href="../index.php"><img src="../assets/images/logo-dark.png" alt="HMS Logo" class="img-fluid" style="height: 60px;"></a>
                    </div>

                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="full_name" id="full_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="address" required>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" name="city" id="city" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Gender</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender_female" value="female">
                            <label class="form-check-label" for="gender_female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender_male" value="male">
                            <label class="form-check-label" for="gender_male">Male</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()" required>
                        <div id="user-availability-status1" class="form-text small text-muted"></div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_again" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_again" required>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="agree" value="agree">
                        <label class="form-check-label" for="agree">
                            I have read and agree to the Terms & Conditions
                        </label>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary" id="submit" name="submit">
                            Register
                        </button>
                    </div>

                    <div class="text-center login-link">
                        Already have an account? <a href="../index.php">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <?php include('../includes/footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            Login.init();
        });

        function userAvailability() {
            $("#loaderIcon").show();
            $.ajax({
                url: "check_availability.php",
                data: 'email=' + $("#email").val(),
                type: "POST",
                success: function(data) {
                    $("#user-availability-status1").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>
</body>

</html>