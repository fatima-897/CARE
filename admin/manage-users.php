<?php
session_start();
error_reporting(0);
include('./includes/config.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
    ?>
    <?php
    include('./includes/header.php');
    include('./includes/sidebar.php');
    include('./includes/navheader.php');
    ?>
    <?php
    include('./includes/footer.php');
}
?>