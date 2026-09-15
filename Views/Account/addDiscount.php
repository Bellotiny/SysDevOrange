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
                <h1 class="mt-5 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center">Create New Discount</h1>
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

    <form method="POST"  action="<?=BASE_PATH?>/account/adddiscount">
         <input type="hidden" name="inventory" value="service"> 
            <div class="form-group my-3">
                <label for="name" class="col-form-label canvaSans-fontstyle">Discount Name:</label><br>
                <div class="col-sm-10 border bg-light p-1">
                    <input type="text" name="name" id="name" class="form-control"  required>
                </div>
            </div>

            <div class="form-group my-3">
                <label for="type" class="col-form-label canvaSans-fontstyle">Type:</label><br>
                <div class="col-sm-10 border bg-light p-1">
                    <input type="text" name="type" id="type" class="form-control" required>
                </div>
            </div>

            <div class="form-group my-3">
                <label for="start" class="col-form-label canvaSans-fontstyle">Start:</label><br>
                <div class="col-sm-10 border bg-light p-1">
                    <input type="date" name="start" id="start" class="form-control" required>
                </div>
            </div>

            <div class="form-group my-3">
                <label for="end" class="col-form-label canvaSans-fontstyle">End:</label><br>
                <div class="col-sm-10 border bg-light p-1">
                    <input type="date" name="end" id="end" class="form-control" required>
                </div>
            </div>

            <div class="form-group my-3">
                <label for="percent" class="col-form-label canvaSans-fontstyle">Percent: (%)</label><br>
                <div class="col-sm-10 border bg-light p-1">
                    <input type="text" name="percent" id="percent" class="form-control"  required>
                </div>
            </div>

            <div class="form-group my-3">
                <label for="amount" class="col-form-label canvaSans-fontstyle">Amount: (CAD)</label><br>
                <div class="col-sm-10 border bg-light p-1">
                    <input type="text" name="amount" id="amount" class="form-control" required>
                </div>
            </div>


            <hr>

        <?php if (isset($data['error'])): ?>
             <p><span style="color:red"><?php echo $data['error']; ?></span></p>
        <?php endif; ?>
        <div class="form-group my-3">
            <button type="submit" class="btn btn-primary">Update Discount</button>
        </div>
    </form>

</main>

<?php include_once 'Views/footer.php'; ?>

</body>
</html>
