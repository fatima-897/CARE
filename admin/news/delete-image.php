<?php
include('../includes/config.php');

$image_id = $_GET['id'] ?? null;
$post_id = $_GET['post_id'] ?? null;

if (!$image_id || !$post_id) {
    die("Invalid request.");
}

$result = mysqli_query($con, "SELECT image_name FROM post_images WHERE id = $image_id");
$image = mysqli_fetch_assoc($result);

if ($image) {
    $path = "../uploads/" . $image['image_name'];

    // Delete from DB
    mysqli_query($con, "DELETE FROM post_images WHERE id = $image_id");

    // Delete file
    if (file_exists($path)) {
        unlink($path);
    }

    header("Location: edit-news.php?id=$post_id&deleted=1");
    exit;
} else {
    echo "Image not found.";
}
?>
