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
                <h1 class="text-body-emphasis mt-5" style="display: contents"><?= CHANGE_PASSWORD ?></h1>
          </div>
        <form action="<?=BASE_PATH?>/account/change-password" method="POST">
            <div class="form-group py-2">
                <label for="password"><?= PASSWORD ?></label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group py-2">
                <label for="confirmPassword"><?= CONFIRM_PASSWORD ?></label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            </div>
            <?php if (isset($data["passwordError"])): ?>
                <p><span style="color:red"><?php echo $data["passwordError"]; ?></span></p>
            <?php endif; ?>
            <?php if (isset($data["passwordMessage"])): ?>
                <p><span style="color:green"><?php echo $data["passwordMessage"]; ?></span></p>
            <?php endif; ?>
            <ul>
                <?= PASS_MUST_CONTAIN ?>
                <li>1 <?= UPPERCASE?></li>
                <li>1 <?= LOWERCASE ?></li>
                <li>1 <?= NUMBER ?></li>
                <li>1 <?= SYMBOL ?></li>
                <li><?= MIN_SIX_CHAR ?></li>
            </ul>
            <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
                <input class="btn bttn-green" role="button" type="submit" value="<?= UPDATE_PASSWORD ?>">
            </div>
        </form>
    </div>
</main>

<?php include_once 'Views/footer.php'; ?>
</body>
</html>