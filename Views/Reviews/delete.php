<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
?>

<?php include_once 'Views/nav.php'; ?>
<?php include_once 'Views/bookingModal.php'; ?>


<main class="container py-4">
    <div>
        <div class="green-background text-secondary  container slide-up ">
            <div class=" pb-5" >
                <h1 class="mt-5 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center"><?= DELETE_REVIEW ?></h1>
            </div>
        </div>

        <!-- Initially hidden review form -->
        <form id="review-form-input" class="pb-3" action="<?=BASE_PATH?>/reviews/delete/<?= $data['review']->id ?>" method="POST">
            <div class="mb-3">
                <label for="confirm" class="form-label"><?= CONFIRM ?></label>
                <input type="checkbox" name="confirm" id="confirm">
            </div>
            <div class="d-grid gap-2">
                <a href="<?= $_SERVER['HTTP_REFERER'] ?? dirname($_SERVER['PHP_SELF']) ?>" class="btn bttn-green" type="button"><?= BACK ?></a>
                <input type="submit" class="btn bttn-green" value="Save">
            </div>
        </form>
    </div>
</main>

<?php include_once 'Views/footer.php'; ?>

</body>
</html>