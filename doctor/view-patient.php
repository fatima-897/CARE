   <?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
    if (strlen($_SESSION['id'] == 0)) {
        header('location: auth/logout.php');
    } else {
        if (isset($_POST['submit'])) {
            $vid = $_GET['viewid'];
            $bp = $_POST['bp'];
            $bs = $_POST['bs'];
            $weight = $_POST['weight'];
            $temp = $_POST['temp'];
            $pres = $_POST['pres'];
            $query .= mysqli_query($con, "insert   tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$pres')");
            if ($query) {
                echo '<script>alert("Medicle history has been added.")</script>';
                echo "<script>window.location.href ='manage-patient.php'</script>";
            } else {
                echo '<script>alert("Something Went Wrong. Please try again")</script>';
            }
        }
    ?>
       <!DOCTYPE html>
       <html lang="en">

       <head>
           <meta charset="UTF-8">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <link rel="shortcut icon" href="assets/images/favicon.ico">
           <title>View Patient | Doctor</title>
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
           <div class="container mt-5 py-4">
               <!-- Breadcrumb & Page Header -->
               <div class="row mb-4">
                   <div class="col d-flex justify-content-between align-items-center">
                       <h4 class="page-title">Patient Details</h4>
                       <a href="manage-patient.php" class="btn btn-outline-primary btn-sm">← Back to Manage Patients</a>
                   </div>
               </div>

               <!-- Patient Details -->
               <?php
                $vid = $_GET['viewid'];
                $ret = mysqli_query($con, "SELECT * FROM tblpatient WHERE ID='$vid'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                   <div class="table-responsive mb-4">
                       <table class="table table-bordered table-striped">
                           <thead class="table-light">
                               <tr>
                                   <th colspan="4" class="text-primary h6">Patient Information</th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <th>Name</th>
                                   <td><?= $row['PatientName'] ?></td>
                                   <th>Email</th>
                                   <td><?= $row['PatientEmail'] ?></td>
                               </tr>
                               <tr>
                                   <th>Contact No.</th>
                                   <td><?= $row['PatientContno'] ?></td>
                                   <th>Address</th>
                                   <td><?= $row['PatientAdd'] ?></td>
                               </tr>
                               <tr>
                                   <th>Gender</th>
                                   <td><?= $row['PatientGender'] ?></td>
                                   <th>Age</th>
                                   <td><?= $row['PatientAge'] ?></td>
                               </tr>
                               <tr>
                                   <th>Medical History</th>
                                   <td colspan="3"><?= $row['PatientMedhis'] ?></td>
                               </tr>
                               <tr>
                                   <th>Registration Date</th>
                                   <td><?= $row['CreationDate'] ?></td>
                                   <th>Last Updated</th>
                                   <td><?= $row['UpdationDate'] ?? '<span class="text-muted">N/A</span>' ?></td>
                               </tr>
                           </tbody>
                       </table>
                   </div>
               <?php } ?>

               <!-- Medical History Header -->
               <div class="row mb-3">
                   <div class="col d-flex justify-content-between align-items-center">
                       <h4 class="page-title">Medical History</h4>
                       <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addMedicalModal">
                           + Add Medical History
                       </button>
                   </div>
               </div>

               <!-- Medical History Table -->
               <div class="table-responsive">
                   <table class="table table-bordered table-striped">
                       <thead class="table-light">
                           <tr>
                               <th>#</th>
                               <th>Blood Pressure</th>
                               <th>Weight</th>
                               <th>Blood Sugar</th>
                               <th>Temperature</th>
                               <th>Prescription</th>
                               <th>Visit Date</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php
                            $ret = mysqli_query($con, "SELECT * FROM tblmedicalhistory WHERE PatientID='$vid'");
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>
                               <tr>
                                   <td><?= $cnt++ ?></td>
                                   <td><?= $row['BloodPressure'] ?></td>
                                   <td><?= $row['Weight'] ?></td>
                                   <td><?= $row['BloodSugar'] ?></td>
                                   <td><?= $row['Temperature'] ?></td>
                                   <td><?= $row['MedicalPres'] ?></td>
                                   <td><?= $row['CreationDate'] ?></td>
                               </tr>
                           <?php } ?>
                       </tbody>
                   </table>
               </div>
           </div>

           <!-- Modal: Add Medical History -->
           <div class="modal fade" id="addMedicalModal" tabindex="-1" aria-labelledby="addMedicalModalLabel" aria-hidden="true" data-bs-backdrop="false">
               <div class="modal-dialog modal-lg">
                   <form method="post" name="submit">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title">Add Medical History</h5>
                               <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                           </div>
                           <div class="modal-body">
                               <div class="row g-3">
                                   <div class="col-md-6">
                                       <label>Blood Pressure</label>
                                       <input name="bp" class="form-control" required placeholder="e.g. 120/80">
                                   </div>
                                   <div class="col-md-6">
                                       <label>Blood Sugar</label>
                                       <input name="bs" class="form-control" required placeholder="e.g. 90 mg/dL">
                                   </div>
                                   <div class="col-md-6">
                                       <label>Weight</label>
                                       <input name="weight" class="form-control" required placeholder="e.g. 70 kg">
                                   </div>
                                   <div class="col-md-6">
                                       <label>Temperature</label>
                                       <input name="temp" class="form-control" required placeholder="e.g. 98.6°F">
                                   </div>
                                   <div class="col-12">
                                       <label>Medical Prescription</label>
                                       <textarea name="pres" class="form-control" rows="4" required></textarea>
                                   </div>
                               </div>
                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                               <button type="submit" name="submit" class="btn btn-primary">Save History</button>
                           </div>
                       </div>
                   </form>
               </div>
           </div>


           <?php include('includes/footer.php'); ?>
           <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
           <script src="assets/js/main.js"></script>
       </body>

       </html>
   <?php } ?>