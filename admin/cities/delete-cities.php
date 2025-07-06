<?php
session_start();
error_reporting(0);
include('../includes/config.php');

if (strlen($_SESSION['id']) == 0) {
    header('location:../auth/logout.php');
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    mysqli_query($con, "DELETE FROM cities WHERE id = $id");
}

header("Location: manage-cities.php");
exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <title>Delete City | Admin</title>
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
        <h2 class="mb-4">Delete Cities</h2>
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this city?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // JavaScript to trigger the modal with the correct delete URL
            function confirmDelete(cityId) {
                const deleteLink = document.getElementById('confirmDeleteBtn');
                deleteLink.href = 'delete-cities.php?id=' + cityId;
                const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.show();
            }
        </script>
    </div>
    <?php include('../includes/footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>