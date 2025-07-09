<?php
include('../includes/config.php');

// Fetch all posts
$posts = mysqli_query($con, "SELECT * FROM posts ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage News Posts | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<!-- Header -->
<div class="header bg-primary mb-4 p-3 d-flex justify-content-between">
    <a href="./dashboard.php" class="text-white text-decoration-none">
        <img src="../assets/images/logo.png" width="30" height="30" alt="CARE">
    </a>
    <a href="add-post.php" class="text-white text-decoration-none">+ Add New Post</a>
</div>

<div class="container">
    <h3 class="mb-4">Manage Blog / News Posts</h3>

    <?php if (mysqli_num_rows($posts) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Thumbnail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($post = mysqli_fetch_assoc($posts)): ?>
                        <?php
                        // Fetch first image for thumbnail
                        $img_q = mysqli_query($con, "SELECT image_name FROM post_images WHERE post_id = " . $post['id'] . " LIMIT 1");
                        $thumb = mysqli_fetch_assoc($img_q);
                        ?>
                        <tr>
                            <td><?= $post['id'] ?></td>
                            <td><?= htmlspecialchars($post['title']) ?></td>
                            <td><?= htmlspecialchars($post['category']) ?></td>
                            <td>
                                <span class="badge <?= $post['status'] === 'active' ? 'bg-success' : 'bg-danger' ?>">
                                    <?= ucfirst($post['status']) ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($thumb): ?>
                                    <img src="../uploads/<?= $thumb['image_name'] ?>" width="60" class="rounded">
                                <?php else: ?>
                                    <span class="text-muted">No Image</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="content_news.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-info">View</a>
                                <a href="edit-post.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="delete-post.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-danger"
                                   onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info">No blog/news posts found.</div>
    <?php endif; ?>
</div>

<?php include('../includes/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
