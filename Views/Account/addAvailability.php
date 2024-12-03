<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
?>

<?php include_once 'Views/nav.php'; ?>
<?php include_once 'Views/bookingModal.php'; ?>

<main class="container py-4">
    <div>
        <div class="green-background text-secondary container slide-up">
            <div class="pb-5">
                <h1 class="mt-5 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center">Create New Color</h1>
            </div>
        </div>
    </div>

    <!---error--->
    <?php if (isset($data['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($data['error']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?= BASE_PATH ?>/account/addAvailability">

        <div class="form-group my-3">
            <label for="start" class="col-form-label canvaSans-fontstyle">Start:</label><br>
            <div class="col-sm-10 border bg-light p-1">
                <input type="datetime-local" step="1800" name="start" id="start" class="form-control" required>
            </div>
        </div>

        <div class="form-group my-3">
            <label for="end" class="col-form-label canvaSans-fontstyle">End:</label><br>
            <div class="col-sm-10 border bg-light p-1">
                <input type="datetime-local" step="1800" name="end" id="end" class="form-control" required>
            </div>
        </div>

        <?php if (isset($data['error'])): ?>
            <p><span style="color:red"><?php echo $data['error']; ?></span></p>
        <?php endif; ?>
        
        <div class="form-group my-3">
            <button type="submit" class="btn btn-primary">Add Availability</button>
        </div>
    </form>

</main>

<?php include_once 'Views/footer.php'; ?>

</body>
</html>
