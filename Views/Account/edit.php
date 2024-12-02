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
        <form method="POST" action="<?=BASE_PATH?>/account/edit" >
            <div class="form-group py-2">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $this->user->firstName ?>" required>
            </div>
            <div class="form-group py-2">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $this->user->lastName ?>" required>
            </div>
            <div class="form-group py-2">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $this->user->email ?>" required>
            </div>
            <div class="form-group py-2">
                <label for="birthDate">Birthday:</label>
                <input type="date" class="form-control"  id="birthDate" name="birthDate" value="<?= $this->user->birthDate ?? "" ?>">
            </div>
            <div class="form-group py-2">
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" value="<?= $this->user->phoneNumber ?? "" ?>">
            </div>
            <?php if (isset($data["error"])): ?>
                <p><span style="color:red"><?php echo $data["error"]; ?></span></p>
            <?php endif; ?>
            <?php if (isset($data["message"])): ?>
                <p><span style="color:green"><?php echo $data["message"]; ?></span></p>
            <?php endif; ?>
            <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
                <input class="btn btn-primary mt-3" role="button" type="submit" value="Save">
            </div>
        </form>
        <form method="POST" action="<?=BASE_PATH?>/account/edit" >
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
</main>

      <!-- Include scripts here -->
      <?php include_once 'Views/Scripts/accountImportantScript.php'; ?>

      </div>
      
    </body>
</html>