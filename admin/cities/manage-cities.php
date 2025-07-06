<?php
session_start();
error_reporting(0);
include('../includes/config.php');

if (strlen($_SESSION['id']) == 0) {
    header('location:../auth/logout.php');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/images/favicon.ico">
        <title>Manage cities | Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
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
            <a href="../dashboard.php" class="text-white text-decoration-none">
                <img src="../assets/images/logo.png" width="30" height="30" alt="CARE">
            </a>
            <a href="../dashboard.php" class="text-white text-decoration-none">Back to Dashboard</a>
        </div>
        <!-- Main Content -->
        <div class="container py-5">
            <h2 class="mb-4 pt-5">Manage Cities</h2>

            <a href="add-cities.php" class="btn btn-primary mb-4">+ Add City</a>

            <!-- Cities Table -->
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>City Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM cities ORDER BY name ASC");
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo "<tr>
                    <td>{$i}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['status']}</td>
                    <td>
                        <a href='edit-cities.php?id={$row['id']}' class='btn btn-sm btn-secondary'>Edit</a>
                        <a href='delete-cities.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure you want to delete this city?')\">Delete</a>
                    </td>
                  </tr>";
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php include('../includes/footer.php'); ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/main.js"></script>
    </body>

    </html>
<?php } ?>