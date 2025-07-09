<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location: auth/logout.php');
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <title>Search Patient | Doctor</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        <div class="container mt-5 py-4">
            <div class="row mb-4">
                <div class="col-md-8 mx-auto">
                    <h4 class="mb-3">Search Patient</h4>
                    <form method="post" name="search">
                        <div class="input-group">
                            <input type="text" name="searchdata" id="searchdata" class="form-control" placeholder="Search by Name or Mobile No." required>
                            <button type="submit" name="search" id="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            if (isset($_POST['search'])) {
                $sdata = $_POST['searchdata'];
                echo '<div class="mb-4 text-center"><h5>Result against "<strong>' . htmlentities($sdata) . '</strong>" keyword</h5></div>';

                $sql = mysqli_query($con, "SELECT * FROM tblpatient WHERE PatientName LIKE '%$sdata%' OR PatientContno LIKE '%$sdata%'");
                $num = mysqli_num_rows($sql);

                echo '<div class="table-responsive">';
                echo '<table class="table table-bordered table-striped">';
                echo '<thead class="table-light">';
                echo '<tr>
                <th>#</th>
                <th>Patient Name</th>
                <th>Contact Number</th>
                <th>Gender</th>
                <th>Creation Date</th>
                <th>Updation Date</th>
                <th>Action</th>
              </tr>';
                echo '</thead><tbody>';

                if ($num > 0) {
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                        echo '<tr>
                        <td>' . $cnt . '.</td>
                        <td>' . htmlentities($row['PatientName']) . '</td>
                        <td>' . htmlentities($row['PatientContno']) . '</td>
                        <td>' . htmlentities($row['PatientGender']) . '</td>
                        <td>' . htmlentities($row['CreationDate']) . '</td>
                        <td>' . htmlentities($row['UpdationDate']) . '</td>
                        <td>
                            <a href="edit-patient.php?editid=' . $row['ID'] . '" class="btn btn-sm btn-primary mb-1" target="_blank">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="view-patient.php?viewid=' . $row['ID'] . '" class="btn btn-sm  btn-outline-info mb-1" target="_blank">
                                <i class="fa fa-eye"></i> View
                            </a>
                        </td>
                    </tr>';
                        $cnt++;
                    }
                } else {
                    echo '<tr><td colspan="7" class="text-center text-muted">No record found against this search</td></tr>';
                }
                echo '</tbody></table></div>';
            }
            ?>
        </div>


        <?php include('includes/footer.php'); ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>

    </html>
<?php } ?>