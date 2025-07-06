<?php
session_start();
error_reporting(0);
include('../includes/config.php');

if (strlen($_SESSION['id']) == 0) {
    header('location:../auth/logout.php');
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = mysqli_real_escape_string($con, $_POST['city_name']);
        $status = $_POST['status'];

        $check = mysqli_query($con, "SELECT * FROM cities WHERE name = '$name'");
        if (mysqli_num_rows($check) == 0) {
            mysqli_query($con, "INSERT INTO cities (name, status) VALUES ('$name', '$status')");
            header("Location: manage-cities.php");
            exit;
        } else {
            $error = "City already exists.";
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/images/favicon.ico">
        <title>Add city | Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
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
        <div class="container py-5">
            <h2 class="mb-4 pt-5">Add City</h2>
            <?php if (isset($error)) echo "<div class='alert alert-warning'>$error</div>"; ?>
            <form method="post" class="row g-3">
                <div class="col-md-6">
                    <label for="city_name" class="form-label">City Name</label>
                    <input type="text" class="form-control" name="city_name" required>
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" name="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="col-md-2 align-self-end">
                    <button type="submit" class="btn btn-success w-100">Add</button>
                </div>
            </form>
        </div>
        <?php include('../includes/footer.php'); ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/main.js"></script>
    </body>

    </html>
<?php } ?>