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
                <h1 class="mt-5 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center"><?= EDIT_REVIEW ?></h1>
            </div>
        </div>

        <!-- Initially hidden review form -->
        <form id="review-form-input" class="pb-3" action="<?=BASE_PATH?>/gallery/edit/<?= $data['review']->id ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="<?= ENTER_REVIEW_TITLE ?>" value="<?= $data["review"]->title ?>" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label"><? MESSAGE_REVIEW ?></label>
                <textarea name="message" id="message" class="form-control" rows="3" placeholder="<?= ENTER_REVIEW_TEXT ?>" required><?= $data["review"]->message ?></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label"><?= UPLOAD_IMAGE_REVIEW ?></label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>
            <?php if (isset($data['error'])): ?>
                <p><span style="color:red"><?php echo $data['error']; ?></span></p>
            <?php endif; ?>
            <div class="d-grid gap-2">
                <input type="submit" class="btn bttn-green" value="Save">
                <!-- <button class="btn bttn-green" type="button">Post</button> -->
            </div>
        </form>
    </div>
</main>

<?php include_once 'Views/footer.php'; ?>

</body>
</html>