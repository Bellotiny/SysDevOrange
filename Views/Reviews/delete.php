<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
?>

<?php include_once 'Views/nav.php'; ?>
<?php include_once 'Views/bookingModal.php'; ?>


<main class="container py-4">
<div class="container">
    <!-- Header Section -->
    <div class="green-background text-secondary slide-up py-5">
        <h1 class="display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink text-center"><?= DELETE_REVIEW ?></h1>
    </div>

    <!-- Review Deletion Form -->
    <form id="review-form-input" class="pb-5" action="<?= BASE_PATH ?>/reviews/delete/<?= $data['review']->id ?>" method="POST">
        <div class="mb-4">
            <h3><label for="confirm" class="form-label text-lg-start"><?= CONFIRM ?></label></h3>
            
            <div class="d-flex align-items-center">
                <input type="checkbox" name="confirm" id="confirm" class="form-check-input me-2" onclick="toggleSubmitButton()">
                <span class=" text-danger"><?= "I confirm I want to delete this review" ?></span>
            </div>
        </div>
        
        <!-- Action Buttons in the Same Line -->
        <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
            <!-- Back Button styled as <a> -->
            <a href="<?= $_SERVER['HTTP_REFERER'] ?? dirname($_SERVER['PHP_SELF']) ?>" class="btn bttn-green w-50" role="button">
                <?= BACK ?>
            </a>

            <!-- Save Button -->
            <input type="submit" class="btn bttn-green w-50 disabled" id="saveButton" value="Save">
        </div>
    </form>
</div>



</main>
<script>
    // Function to toggle the disabled state of the submit button
    function toggleSubmitButton() {
        const checkbox = document.getElementById('confirm');
        const submitButton = document.getElementById('saveButton');
        
        if (checkbox.checked) {
            submitButton.classList.remove('disabled');
        } else {
            submitButton.classList.add('disabled');
        }
    }
</script>



</body>
</html>