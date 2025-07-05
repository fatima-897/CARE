<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/images/favicon.ico">
        <title>Between Dates Reports | Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <style>
             .table thead {
            background-color: #0d6efd;
            color: white;
        }
            .card {
                border: none;
                border-radius: 0.5rem;
                box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
                margin-bottom: 2rem;
            }

            .card-header {
                background-color: #0d6efd;
                color: white;
                padding: 1rem 1.5rem;
                border-bottom: 1px solid rgba(0, 0, 0, .125);
            }
        </style>
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
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 mt-5 text-dark">Generate Report Between Dates</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="betweendates-detailsreport.php">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="fromdate" class="form-label">From Date</label>
                                <input type="date" class="form-control" name="fromdate" id="fromdate" required>
                            </div>
                            <div class="col-md-6">
                                <label for="todate" class="form-label">To Date</label>
                                <input type="date" class="form-control" name="todate" id="todate" required>
                            </div>
                        </div>
                        <div class="mt-4 text-end">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include('../includes/footer.php'); ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/main.js"></script>
    </body>

    </html>
<?php } ?>