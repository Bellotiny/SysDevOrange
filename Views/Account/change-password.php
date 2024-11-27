<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/nav.php';
include_once 'Views/bookingModal.php';
?>

<main class="d-flex" id="account-Main">
    <div class="container">
        <h1>Forgot Password</h1>
        <form action="<?=BASE_PATH?>/account/resetPassword" method="POST">
            <div class="form-group py-2">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group py-2">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            </div>
            <?php if (isset($data["passwordError"])): ?>
                <p><span style="color:red"><?php echo $data["passwordError"]; ?></span></p>
            <?php endif; ?>
            <?php if (isset($data["passwordMessage"])): ?>
                <p><span style="color:green"><?php echo $data["passwordMessage"]; ?></span></p>
            <?php endif; ?>
            <ul>
                Password must contain
                <li>1 uppercase</li>
                <li>1 lowercase</li>
                <li>1 number</li>
                <li>1 symbol</li>
                <li>Minimum of 6 characters</li>
            </ul>
            <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
                <input class="btn btn-primary mt-3" role="button" type="submit" value="Update Password">
            </div>
        </form>
    </div>
</main>

<?php include_once 'Views/footer.php'; ?>
</body>
</html>