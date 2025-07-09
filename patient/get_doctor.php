<?php
include('includes/config.php');

if (!empty($_POST["specilizationid"])) {
    $sql = mysqli_query($con, "SELECT doctorName, id FROM doctors WHERE specilization='" . $_POST['specilizationid'] . "'");
    echo '<option value="">Select Doctor</option>';
    while ($row = mysqli_fetch_array($sql)) {
        echo '<option value="' . htmlentities($row['id']) . '">' . htmlentities($row['doctorName']) . '</option>';
    }
}

if (!empty($_POST["doctor"])) {
    $sql = mysqli_query($con, "SELECT docFees FROM doctors WHERE id='" . $_POST['doctor'] . "'");
    $row = mysqli_fetch_array($sql);
    echo htmlentities($row['docFees']); // Return plain fee text, NOT an <option>
}
?>
