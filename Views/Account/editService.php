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
                <h1 class="mt-5 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center">Edit Service</h1>
            </div>
        </div>

        <!-- Initially hidden review form -->
    </div>
<!---error--->
    <?php if (isset($data['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($data['error']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form method="POST"  action="<?=BASE_PATH?>/account/editService/<?= $service->id ?>">
         <input type="hidden" name="inventory" value="service"> 
            <div class="form-group my-3">
                <label for="name" class="col-form-label canvaSans-fontstyle">Service Name:</label><br>
                <div class="col-sm-10 border bg-light p-1">
                    <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($service->name) ?>" required>
                </div>
            </div>

            <div class="form-group my-3">
                <label for="type" class="col-form-label canvaSans-fontstyle">Type:</label><br>
                <div class="col-sm-10 border bg-light p-1">
                    <input type="text" name="type" id="type" class="form-control" value="<?= htmlspecialchars($service->type) ?>" required>
                </div>
            </div>

            <div class="form-group my-3">
                <label for="price" class="col-form-label canvaSans-fontstyle">Price:</label><br>
                <div class="col-sm-10 border bg-light p-1">
                    <input type="number" name="price" id="price" class="form-control" step="0.01" value="<?= htmlspecialchars($service->price) ?>" required>
                </div>
            </div>

            <div class="form-group my-3">
                <label for="description" class="col-form-label canvaSans-fontstyle">Description:</label><br>
                <div class="col-sm-10 border bg-light p-1">
                    <input type="text" name="description" id="description" class="form-control" value="<?= htmlspecialchars($service->description) ?>" required>
                </div>
            </div>

            <div class="form-group my-3">
                <label for="duration" class="col-form-label canvaSans-fontstyle">Duration:</label><br>
                <div class="col-sm-10 border bg-light p-1">
                    <input type="number" name="duration" id="duration" class="form-control" value="<?= htmlspecialchars($service->duration) ?>" required>
                </div>
            </div>

            <div class="form-group my-3">
                <label for="visibility" class="col-form-label canvaSans-fontstyle">Visibility:</label><br>
                <div class="form-group my-3">
                    <label for="visibility" class="col-form-label">Visibility:</label>
                    <input type="checkbox" name="visibility" id="visibility" value="1" <?= $service->visibility == 1 ? 'checked' : '' ?>>
                </div>
            </div>

            <hr>

        <?php if (isset($data['error'])): ?>
             <p><span style="color:red"><?php echo $data['error']; ?></span></p>
        <?php endif; ?>
        <div class="form-group my-3">
            <button type="submit" class="btn btn-primary">Update Services</button>
        </div>
    </form>

</main>

<?php include_once 'Views/footer.php'; ?>

</body>
</html>