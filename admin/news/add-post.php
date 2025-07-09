<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <title>Add News Post | Admin</title>
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
    <!-- Admin Add Blog Post-->
    <div class="content mt-5 py-5">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Add Blog / News</h4>
            </div>
        </div>

        <?php
        include('../includes/config.php');
        if (isset($_POST['submit'])) {
            $title = mysqli_real_escape_string($con, $_POST['title']);
            $description = mysqli_real_escape_string($con, $_POST['description']);
            $category = mysqli_real_escape_string($con, $_POST['category']);
            $subcategory = mysqli_real_escape_string($con, $_POST['subcategory']);
            $tags = mysqli_real_escape_string($con, $_POST['tags']);
            $status = $_POST['status'] === 'option1' ? 'active' : 'inactive';

            $insertPost = mysqli_query($con, "INSERT INTO posts (title, description, category, subcategory, tags, status) VALUES ('$title', '$description', '$category', '$subcategory', '$tags', '$status')");

            if ($insertPost) {
                $post_id = mysqli_insert_id($con);

                // Handle multiple images
                foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                    $img_name = $_FILES['images']['name'][$key];
                    $img_tmp = $_FILES['images']['tmp_name'][$key];
                    $img_path = "../uploads/" . $img_name;
                    // $img_path = "../uploads/" . $img_name;
                    if (move_uploaded_file($img_tmp, $img_path)) {
                        mysqli_query($con, "INSERT INTO post_images (post_id, image_name) VALUES ($post_id, '$img_name')");
                    }
                }

                echo "<div class='container alert alert-success'>Blog post added successfully!</div>";
            } else {
                echo "<div class='container alert alert-danger'>Error saving blog post.</div>";
            }
        }
        ?>

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Blog Title</label>
                        <input class="form-control" type="text" name="title" required>
                    </div>

                    <div class="form-group">
                        <label>Blog Images</label>
                        <input class="form-control" type="file" name="images[]" multiple required>
                        <small class="form-text text-muted">Max. 10 images. jpg, png only.</small>
                    </div>

                    <div class="form-group">
                        <label>Blog Category</label>
                        <input class="form-control" name="category" required>
                    </div>

                    <div class="form-group">
                        <label>Blog Subcategory</label>
                        <input class="form-control" name="subcategory" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="6" name="description" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Tags <small>(comma separated)</small></label>
                        <input class="form-control" name="tags" placeholder="health, fitness, hospital" required>
                    </div>

                    <div class="form-group">
                        <label>Status</label><br>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="status" value="option1" class="form-check-input" checked>
                            <label class="form-check-label">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="status" value="option2" class="form-check-input">
                            <label class="form-check-label">Inactive</label>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" name="submit" class="btn btn-primary">Publish Blog</button>
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

<?php
include('../includes/footer.php');
?>