<?php
session_start();
// error_reporting(0); // Optional: comment out for debugging
include('includes/config.php');
include('includes/checklogin.php');
check_login();

$msg = ""; // default message

if (isset($_POST['submit'])) {
    $fname   = $_POST['fname'];
    $address = $_POST['address'];
    $city    = $_POST['city'];
    $gender  = $_POST['gender'];

    $sql = mysqli_query($con, "UPDATE users SET fullName='$fname', address='$address', city='$city', gender='$gender' WHERE id='" . $_SESSION['id'] . "'");

    if ($sql) {
        $msg = "Your profile has been updated successfully.";
    } else {
        $msg = "Update failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <title>Edit Profile | Patient</title>
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
    <div class="main-content">
        <div class="container mt-5 pt-5">
            <h3>Edit Profile</h3>

            <?php if ($msg): ?>
                <div class="alert alert-info"><?php echo htmlentities($msg); ?></div>
            <?php endif; ?>

            <?php
            $sql = mysqli_query($con, "SELECT * FROM users WHERE id='" . $_SESSION['id'] . "'");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <form method="POST">
                    <div class="mb-3">
                        <label>Full Name</label>
                        <input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['fullName']); ?>">
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control"><?php echo htmlentities($data['address']); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label>City</label>
                        <input type="text" name="city" class="form-control" value="<?php echo htmlentities($data['city']); ?>">
                    </div>
                    <div class="mb-3">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="<?php echo htmlentities($data['gender']); ?>"><?php echo htmlentities($data['gender']); ?></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </form>
            <?php } ?>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>