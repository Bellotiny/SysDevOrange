<?php 
include_once ROOT . '/Views/head.php';
?>
<header class="d-flex">
    <div class="container">
        <div id="nav-container" class="d-flex justify-content-between align-items-center">
            <!-- First div with navigation links -->
            <div id="nav-main" class="d-flex ">
                <a class="nav-item" href="<?php echo BASE_URL; ?>/index.php?controller=home&">Home</a>
                <a class="nav-item" href="<?php echo BASE_URL; ?>/index.php?controller=about">About</a>
                <a class="nav-item" href="<?php echo BASE_URL; ?>/index.php?controller=services">Services</a>
                <a class="nav-item" href="<?php echo BASE_URL; ?>/index.php?controller=gallery">Gallery</a>
                <a class="nav-item" href="<?php echo BASE_URL; ?>/index.php?controller=contact">Contact</a>
            </div>

            <!-- Second div with the Book link and the account image -->
            <div id="nav-extra" class="d-flex align-items-center">
                <a class="Nav-Split" data-bs-toggle="modal" data-bs-target="#modalBookingWarning" href="#">Book</a>

                <a href="<?php echo BASE_URL; ?>/index.php?controller=account&action=index">

                    Account
                </a>
               
            </div>
        </div>


         <!-- Modal for Booking -->
        <div class="modal fade" id="modalBookingWarning" tabindex="-1" role="dialog" aria-labelledby="modalBookingWarningTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalBookingWarningTitle">Booking Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <h4>Booking Rules:</h4>
                        <ul>
                            <li><strong>The client must pay <span style="color: #d9534f;">$10</span> upon booking</strong>, which will be deducted from the total payment.</li>
                            <li><strong>They must choose at least <span style="color: #d9534f;">one color</span>.</strong></li>
                            <li><strong>Home service is an option but available only <span style="color: #d9534f;">within a certain range</span>.</strong></li>
                            <li><strong>There are <span style="color: #d9534f;">cats</span> in the owner's place.</strong></li>

                        </ul>
                        <hr>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <strong>I read all the reminder</strong>
                        </label>
                    </div>
                    <div class="container d-flex justify-content-center gap-4 my-5">
                        <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=home" role="button">Cancel</a>
                        <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=book?action=bookOne" role="button">Confirm</a>

                    </div>
                </div>
            </div>
        </div>

   

    </div>
    

    <script>
        $(document).ready(function () {
            // Extract the controller from the URL
            var urlParams = new URLSearchParams(window.location.search);
            var currentController = urlParams.get('controller') || 'home'; // Default to 'home'

                // Highlight the link that matches the current controller
            $('#nav-main > a').each(function() {
                var href = $(this).attr('href');
                if (href.includes('controller=' + currentController)) {
                    $(this).css('background-color', '#1b613e').css('color', '#fadadd');
                }
            });

            $('#nav-main > a').click(function (e) {
                // Clear the background color of all links
                $('#nav-main > a').css('background-color', 'transparent').css('color', '#1b613e');
                // Apply background color to the clicked link
                $(this).css('background-color', '#1b613e').css('color', '#fadadd').css('vertical-align', 'center');
                var selectedHref = $(this).attr('href');
                localStorage.setItem('activeLink', selectedHref);
            });

            localStorage.removeItem('activeLink');

            // for the warning

            const confirmButton = $('#confirmButton');
            confirmButton.prop('disabled', true);

            // Enable/disable confirm button based on checkbox state
            $('#flexCheckDefault').change(function () {
                confirmButton.prop('disabled', !this.checked);
            });
        });
    </script>
</header>
