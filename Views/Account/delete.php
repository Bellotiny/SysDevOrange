<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/nav.php';
include_once 'Views/bookingModal.php';
?>
<main class="d-flex" id="account-Main">

    <div class="container">
        <div class= "container my-2">
            <div class="position-relative p-5 text-center text-muted border border-dashed rounded-5 h-20" id="divAccount">
                <h1 class="text-body-emphasis mt-5" style="display: contents"><?= DELETE_PROFILE ?></h1>
          </div>
        </div>
        <form action="<?=BASE_PATH?>/account/delete" method="POST">
        <div class="form-group d-flex flex-row justify-content-center align-items-center">
    <label for="confirm" class="me-2" id="confirmDelete"><?= CONFIRM_DELETE ?></label>
    <input class="form-check-input" type="checkbox" id="deleteCheckBox" name="confirm">
</div>

            <?php if (isset($data["error"])): ?>
                <p><span style="color:red"><?php echo $data['error']; ?></span></p>
            <?php endif; ?>
            <div class="d-flex justify-content-center gap-4" id="deleteButtons">
                <input class="btn bttn-green " id="deleteConfirmButton" role="button" type="submit" value="<?= DELETE ?>" disabled>
                <a class="btn btn-secondary " href="<?=BASE_PATH?>/account" role="button"><?= GO_BACK ?></a>
            </div>
        </form>
    </div>
</main>

<script>
    // JavaScript to toggle the button enabled/disabled state
    document.addEventListener('DOMContentLoaded', function () {
        const checkbox = document.getElementById('deleteCheckBox');
        const confirmButton = document.getElementById('deleteConfirmButton');

        checkbox.addEventListener('change', function () {
            if (checkbox.checked) {
                console.log("Checkbox checked - enabling button");
                confirmButton.disabled = false; // Enable the button
                confirmButton.classList.remove('disabled'); // Optional: remove visual disabled class
            } else {
                console.log("Checkbox unchecked - disabling button");
                confirmButton.disabled = true; // Disable the button
                confirmButton.classList.add('disabled'); // Optional: add visual disabled class
            }
        });
    });
</script>

<?php include_once 'Views/footer.php'; ?>
</body>
</html>
