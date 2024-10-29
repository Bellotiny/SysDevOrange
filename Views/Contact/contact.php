<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);


?>

<body id="contact">
    <?php include_once ROOT . '/Views/nav.php'; ?> 

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
                        <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=book&action=bookOne" role="button">Confirm</a>

                    </div>
                </div>
            </div>
        </div>

    <main id="contact_main">
        <br>
        <div id="contact_h1_div">
            <h1 id="contact_h1">Contact Us</h1>    
        </div>
       <div id="contact_form">
        <form autocomplete="on">
            <div class="form-group">
                <label for="contact_fname">First Name:</label>
                <input type="text" id="contact_fname" name="contact_fname" required>
            </div>
            <div class="form-group">
                <label for="contact_lname">Last Name:</label>
                <input type="text" id="contact_lname" name="contact_lname">
            </div>
            <div class="form-group">
                <label for="contact_message">Message:</label>
                <textarea id="contact_message" name="contact_message" rows="5" required></textarea>
            </div>
            <?= "<input id=\"submit\" type=\"submit\" value=\"Send\">" ?> 
        </form>
       </div>
       <div class="contact_footer">
       
<?php include_once ROOT . '/Views/footer.php'; ?>
       
</div>
    </main>
    <script src="script.js"></script>
    </body>
</html>
