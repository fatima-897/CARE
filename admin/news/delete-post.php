<?php
include('../includes/config.php');

$post_id = $_GET['id'] ?? null;
if (!$post_id) {
    die("Invalid request.");
}

// Delete post images from DB and folder
$images = mysqli_query($con, "SELECT image_name FROM post_images WHERE post_id = $post_id");
while ($img = mysqli_fetch_assoc($images)) {
    $path = "../uploads/" . $img['image_name'];
    if (file_exists($path)) unlink($path);
}
mysqli_query($con, "DELETE FROM post_images WHERE post_id = $post_id");

// Delete post from DB
mysqli_query($con, "DELETE FROM posts WHERE id = $post_id");

// Redirect back
header("Location: manage-news.php?deleted=1");
exit;
?>
