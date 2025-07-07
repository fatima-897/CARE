<?php
include('../includes/config.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = mysqli_query($con, "SELECT * FROM posts WHERE id = $id");

    if (mysqli_num_rows($query) > 0) {
        $post = mysqli_fetch_assoc($query);

        // Fetch first image from post_images
        $imgQuery = mysqli_query($con, "SELECT image_name FROM post_images WHERE post_id = $id LIMIT 1");
        $imgRow = mysqli_fetch_assoc($imgQuery);
        $imagePath = $imgRow ? "../uploads/" . $imgRow['image_name'] : "../uploads/default.jpg";
    } else {
        echo "<div class='alert alert-danger'>No post found.</div>";
        exit;
    }
} else {
    echo "<div class='alert alert-warning'>Invalid blog post ID.</div>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <title>Content News | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <!-- Header -->
    <div class="header bg-primary mb-4 p-3 d-flex justify-content-between">
        <a href="../../index.php" class="text-white text-decoration-none">
            <img src="../assets/images/logo.png" width="30" height="30" alt="CARE">
        </a>
    </div>
    <!-- Main Content -->
    <!-- News Content Section -->
    <div class="content mt-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title"><?php echo htmlspecialchars($post['title']); ?></h4>

                    <div class="mb-3">
                        <img src="<?php echo $imagePath; ?>" class="img-fluid rounded" alt="Blog Image">
                    </div>

                    <p class="text-muted"><i class="fa fa-calendar"></i>
                        <?php echo date("F j, Y", strtotime($post['created_at'])); ?>
                    </p>

                    <div class="form-group mt-4">
                        <label><strong>Full Content:</strong></label>
                        <div class="bg-white p-3 border rounded" style="min-height:200px;">
                            <?php echo nl2br(htmlspecialchars($post['description'])); ?>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label><strong>Status:</strong></label>
                        <div>
                            <span class="badge bg-<?php echo $post['status'] === 'active' ? 'success' : 'secondary'; ?>">
                                <?php echo ucfirst($post['status']); ?>
                            </span>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="form-group mt-3">
                        <label><strong>Tags:</strong></label>
                        <div class="text-muted"><?php echo htmlspecialchars($post['tags']); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('../includes/footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>

<?php
include('../includes/footer.php');
?>