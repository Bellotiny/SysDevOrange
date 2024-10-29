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
