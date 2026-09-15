<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/nav.php';
include_once 'Views/bookingModal.php';
?>

<main class="d-flex" id="account-Main">
    <div class="container">
        <h1><?= RECOVERY ?></h1>
        <form method="POST">
            <div class="form-group">
                <label for="code"><?= CODE ?></label>
                <input type="number" class="form-control" id="code" name="code" required>
            </div>
            <?php if (isset($data["error"])): ?>
                <p><span style="color:red"><?php echo $data['error']; ?></span></p>
            <?php endif; ?>
            <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
                <input class="btn btn-green mt-3" role="button" type="submit" value="Recover Account">
                <a class="btn btn-secondary mt-3" href="<?= BASE_PATH ?>/account/forgot" role="button"><?= GO_BACK ?></a>
            </div>
        </form>
    </div>
</main>

<?php include_once 'Views/footer.php'; ?>
</body>
</html>