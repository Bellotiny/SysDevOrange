<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<body id="contact" class="background_color">
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

    <main class="container my-5">

        <div class="row justify-content-center card-container pt-5 slide-up">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0">
                    <!-- Card Header -->
                    <div class="card-header">
                        <h1 class="custom-header amsterdamThree-fontstyle text-green text-shadow-pink">Contact Us</h1>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-4">
                        <form autocomplete="on">
                            <!-- First Name -->
                            <div class="form-group mb-3">
                                <label for="contact_fname" class="form-label">First Name:</label>
                                <input type="text" class="form-control" id="contact_fname" name="contact_fname" required>
                            </div>
                            <!-- Last Name -->
                            <div class="form-group mb-3">
                                <label for="contact_lname" class="form-label">Last Name:</label>
                                <input type="text" class="form-control" id="contact_lname" name="contact_lname">
                            </div>
                            <!-- Message -->
                            <div class="form-group mb-4">
                                <label for="contact_message" class="form-label">Message:</label>
                                <textarea class="form-control" id="contact_message" name="contact_message" rows="5" required></textarea>
                            </div>
                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn bttn-green slide-up">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <?php include_once ROOT . '/Views/footer.php'; ?>
   
</body>
</html>
