<?php
session_start();
include('./config.php');

// Fetch current data
$query = mysqli_query($con, "SELECT * FROM company_settings WHERE id=1");
$data = mysqli_fetch_assoc($query);

// Handle form submission
if (isset($_POST['save'])) {
    $company_name = $_POST['company_name'];
    $contact_person = $_POST['contact_person'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal_code = $_POST['postal_code'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $mobile = $_POST['mobile'];
    $fax = $_POST['fax'];
    $website = $_POST['website'];

    $update = mysqli_query($con, "UPDATE company_settings SET 
        company_name='$company_name',
        contact_person='$contact_person',
        address='$address',
        country='$country',
        city='$city',
        state='$state',
        postal_code='$postal_code',
        email='$email',
        phone='$phone',
        mobile='$mobile',
        fax='$fax',
        website='$website'
        WHERE id=1
    ");

    if ($update) {
        $msg = "Settings updated successfully!";
        // Refresh data after update
        $query = mysqli_query($con, "SELECT * FROM company_settings WHERE id=1");
        $data = mysqli_fetch_assoc($query);
    } else {
        $msg = "Error updating settings.";
    }
}
?>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h3 class="page-title">Company Settings</h3>
                <?php if (isset($msg)) { ?>
                    <div class="alert alert-info"><?php echo $msg; ?></div>
                <?php } ?>
                <form method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Company Name <span class="text-danger">*</span></label>
                                <input name="company_name" class="form-control" type="text"
                                    value="<?php echo $data['company_name']; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Contact Person</label>
                                <input name="contact_person" class="form-control" type="text"
                                    value="<?php echo $data['contact_person']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input name="address" class="form-control" type="text" value="<?php echo $data['address']; ?>">
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Country</label>
                                <input name="country" class="form-control" type="text"
                                    value="<?php echo $data['country']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>City</label>
                                <input name="city" class="form-control" type="text"
                                    value="<?php echo $data['city']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>State</label>
                                <input name="state" class="form-control" type="text"
                                    value="<?php echo $data['state']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Postal Code</label>
                                <input name="postal_code" class="form-control" type="text"
                                    value="<?php echo $data['postal_code']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" class="form-control" type="email"
                                    value="<?php echo $data['email']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input name="phone" class="form-control" type="text"
                                    value="<?php echo $data['phone']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mobile</label>
                                <input name="mobile" class="form-control" type="text"
                                    value="<?php echo $data['mobile']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Fax</label>
                                <input name="fax" class="form-control" type="text" value="<?php echo $data['fax']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Website</label>
                        <input name="website" class="form-control" type="text" value="<?php echo $data['website']; ?>">
                    </div>

                    <div class="text-center">
                        <button type="submit" name="save" class="btn btn-primary submit-btn">Save Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>