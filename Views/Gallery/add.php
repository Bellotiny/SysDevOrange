<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
?>

<?php include_once 'Views/nav.php'; ?>


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
                <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/home" role="button">Cancel</a>
                <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/book/bookOne" role="button">Confirm</a>

            </div>
        </div>
    </div>
</div>

<main class="container py-4">
    <div>
        <div class="green-background text-secondary  container slide-up ">
            <div class=" pb-5" >
                <h1 class="mt-5 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center">Add Review</h1>
            </div>
        </div>

        <!-- Initially hidden review form -->
        <form id="review-form-input" class="pb-3" action="<?=BASE_PATH?>/gallery/add" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter review title">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea name="message" id="message" class="form-control" rows="3" placeholder="Write your review here"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>
            <div class="d-grid gap-2">
                <input type="submit" class="btn bttn-green" value="Post">
                <!-- <button class="btn bttn-green" type="button">Post</button> -->
            </div>
        </form>
    </div>
</main>

<?php include_once 'Views/footer.php'; ?>

</body>
</html>