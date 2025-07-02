<!-- Optional: Custom Scripts -->
<script src="../assets/js/main.js"></script>

<!-- JS Dependencies (Bootstrap 5 + jQuery 3.6) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Optional Vendor Plugins (only keep if needed) -->
<!-- Remove any you’re not using -->
<script src="../vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../vendor/switchery/switchery.min.js"></script>
<script src="../vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="../vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<script src="../vendor/select2/select2.min.js"></script>
<script src="../vendor/autosize/autosize.min.js"></script>

<!-- Page-Specific Scripts (optional, wrap with checks) -->
<script src="../assets/js/form-elements.js"></script>
<script src="../assets/js/chart.js"></script>

<!-- Init Functions (check before calling to prevent JS errors) -->
<script>
    $(document).ready(function () {
        if (typeof Main !== "undefined" && Main.init) Main.init();
        if (typeof FormElements !== "undefined" && FormElements.init) FormElements.init();
    });
</script>

<!-- Optional: UI Overlay -->
<div class="sidebar-overlay" data-reff=""></div>
