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
                <h1 class="text-body-emphasis mt-5" style="display: contents"><?= FORGOT_PASS_ACCOUNT ?></h1>
          </div>
        <form method="POST">
            <div class="form-group">
                <label for="email"><?= EMAIL ?></label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $data["email"] ?? "" ?>" required>
            </div>
            <?php if (isset($data["error"])): ?>
                <p><span style="color:red"><?php echo $data['error']; ?></span></p>
            <?php endif; ?>
            <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
                <input class="btn bttn-green" role="button" type="submit" value="Send Email">
                <a class="btn btn-secondary" href="<?= BASE_PATH ?>/account/login" role="button"><?= GO_BACK ?></a>
            </div>
            <p class="mt-3"><?= DONT_HAVE_ACCOUNT ?> <a href="<?= BASE_PATH ?>/account/register" id="showRegisterForm"><?= REGISTER_HERE ?></a></p>
        </form>
    </div>
</main>

<?php include_once 'Views/footer.php'; ?>
</body>
</html>