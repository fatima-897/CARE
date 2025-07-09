<?php 
session_start();
include("../includes/config.php");

// 1. Get post ID from query string
$post_id = $_GET['id'] ?? null;
if (!$post_id) {
    echo "<div class='alert alert-danger'>Invalid post ID.</div>";
    exit;
}

// 2. Fetch post and images
$post = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM posts WHERE id = $post_id"));
$images = mysqli_query($con, "SELECT * FROM post_images WHERE post_id = $post_id");

// 3. Handle update form
if (isset($_POST['update'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $subcategory = mysqli_real_escape_string($con, $_POST['subcategory']);
    $tags = mysqli_real_escape_string($con, $_POST['tags']);
    $status = ($_POST['status'] === 'option1') ? 'active' : 'inactive';

    $update_sql = "UPDATE posts SET 
        title='$title', 
        description='$description', 
        category='$category', 
        subcategory='$subcategory', 
        tags='$tags', 
        status='$status' 
        WHERE id='$post_id'";

    $update = mysqli_query($con, $update_sql);

    if ($update) {
        // 4. Upload new images
        if (!empty($_FILES['images']['name'][0])) {
            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                $img_name = $_FILES['images']['name'][$key];
                $img_tmp = $_FILES['images']['tmp_name'][$key];
                $img_path = "../uploads/" . basename($img_name);

                if (move_uploaded_file($img_tmp, $img_path)) {
                    mysqli_query($con, "INSERT INTO post_images (post_id, image_name) VALUES ('$post_id', '$img_name')");
                }
            }
        }

        echo "<div class='alert alert-success'>Blog post updated successfully!</div>";

        // Refresh post data
        $post = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM posts WHERE id = $post_id"));
        $images = mysqli_query($con, "SELECT * FROM post_images WHERE post_id = $post_id");
    } else {
        echo "<div class='alert alert-danger'>Error updating blog post: " . mysqli_error($con) . "</div>";
        echo "<pre>$update_sql</pre>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit News Post | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
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
<div class="content mt-5 py-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Edit Blog / News</h4>

            <?php if (isset($_GET['deleted'])): ?>
                <div class="alert alert-success">Image deleted successfully.</div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label>Blog Title</label>
                    <input class="form-control" type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label>Existing Images</label><br>
                    <?php while ($img = mysqli_fetch_assoc($images)): ?>
                        <div class="d-inline-block text-center me-2 mb-2">
                            <img src="../uploads/<?= $img['image_name'] ?>" width="80" class="rounded">
                            <br>
                            <a href="delete-image.php?id=<?= $img['id'] ?>&post_id=<?= $post_id ?>"
                               onclick="return confirm('Delete this image?')"
                               class="btn btn-sm btn-danger mt-1">Delete</a>
                        </div>
                    <?php endwhile; ?>
                </div>

                <div class="form-group mb-3">
                    <label>Upload New Images</label>
                    <input class="form-control" type="file" name="images[]" multiple>
                    <small class="form-text text-muted">You may upload additional images (jpg, png).</small>
                </div>

                <div class="form-group mb-3">
                    <label>Blog Category</label>
                    <input class="form-control" name="category" value="<?= htmlspecialchars($post['category']) ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label>Blog Subcategory</label>
                    <input class="form-control" name="subcategory" value="<?= htmlspecialchars($post['subcategory']) ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label>Description</label>
                    <textarea rows="6" name="description" class="form-control" required><?= htmlspecialchars($post['description']) ?></textarea>
                </div>

                <div class="form-group mb-3">
                    <label>Tags <small>(comma separated)</small></label>
                    <input class="form-control" name="tags" value="<?= htmlspecialchars($post['tags']) ?>" required>
                </div>

                <div class="form-group mb-4">
                    <label>Status</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="status" value="option1" class="form-check-input" <?= $post['status'] === 'active' ? 'checked' : '' ?>>
                        <label class="form-check-label">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="status" value="option2" class="form-check-input" <?= $post['status'] === 'inactive' ? 'checked' : '' ?>>
                        <label class="form-check-label">Inactive</label>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" name="update" class="btn btn-success">Update Blog</button>
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
