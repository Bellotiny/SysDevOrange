<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
include_once 'Views/bookingModal.php';
?>

<body class="">
<?php include_once 'Views/nav.php'; ?>


<main class="d-flex flex-grow-1 max-vh-100" id="account-Main">
    <?php include_once 'Views/sidebar.php'; ?>
    <!-- Added inline style so navbar does not clip the text -->
    <div class="sideScreen container" style="margin-top: 4%;">
    <div class= "container my-2">
            <div class="position-relative p-5 text-center text-muted border border-dashed rounded-5 h-20" id="divAccount">
                <h1 class="text-body-emphasis mt-5" style="display: contents"><?= EDIT_PROFILE ?></h1>
          </div>
        </div>
        <form method="POST" action="<?= BASE_PATH ?>/account/edit">
            <div class="form-group py-2">
                <label for="firstName"><?= FIRST_NAME ?></label>
                <input type="text" class="form-control" id="firstName" name="firstName"
                       value="<?= $this->user->firstName ?>" required>
            </div>
            <div class="form-group py-2">
                <label for="lastName"><?= LAST_NAME ?></label>
                <input type="text" class="form-control" id="lastName" name="lastName"
                       value="<?= $this->user->lastName ?>" required>
            </div>
            <div class="form-group py-2">
                <label for="email"><?= EMAIL ?></label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $this->user->email ?>"
                       required>
            </div>
            <div class="form-group py-2">
                <label for="birthDate"><?= BIRTHDAY ?></label>
                <input type="date" class="form-control" id="birthDate" name="birthDate"
                       value="<?= $this->user->birthDate ?? "" ?>">
            </div>
            <div class="form-group py-2">
                <label for="phoneNumber"><?= PHONE_NUMBER ?></label>
                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber"
                       value="<?= $this->user->phoneNumber ?? "" ?>">
            </div>
            <?php if (isset($data["error"])): ?>
                <p><span style="color:red"><?php echo $data["error"]; ?></span></p>
            <?php endif; ?>
            <?php if (isset($data["message"])): ?>
                <p><span style="color:green"><?php echo $data["message"]; ?></span></p>
            <?php endif; ?>
            <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
                <input class="btn bttn-green" role="button" type="submit" value="<?= CONFIRM ?>">
            </div>
        </form>
</main>

      <!-- Include scripts here -->
      <?php include_once 'Views/Scripts/accountImportantScript.php'; ?>

</div>

</body>
</html>