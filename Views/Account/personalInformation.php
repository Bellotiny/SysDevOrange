<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
include_once 'Views/bookingModal.php';
?>

    <?php include_once 'Views/nav.php'; ?>
    
    
    <main class="d-flex flex-grow-1 max-vh-100" id="account-Main">
    <?php include_once 'Views/sidebar.php'; ?>
    <!-- Added inline style so navbar does not clip the text -->
    <div class="sideScreen container m-3" >

        <div class= "container my-2">
        <?php include_once 'Views/menuAccount.php'; ?>
            <div class="position-relative p-5 text-center text-muted border border-dashed rounded-5 h-20" id="divAccount">
                <h1 class="text-body-emphasis mt-5"><?= HELLO ?><?= $this->user->firstName ?></h1>
                <p class="col-lg-6 mx-auto mb-4 text-green">
                <?= PERSONAL_INFO_1 ?><br> <?= PERSONAL_INFO_2 ?>.&#127752;
                </p>
            </div>
        </div>
       
        <div class="my-2 mx-3 on">
           <div>
           <form>
                <div class="form-group  my-1">
                    <label for="staticEmail" class=" col-form-label canvaSans-fontstyle "><?= FIRST_NAME ?></label><br>
                    <div class="col-sm-10 border bg-light  p-1">
                        <input type="text" readonly class="form-control-plaintext " id="staticEmail" value="<?= $this->user->firstName ?>">
                    </div>
                </div>
                <div class="form-group  my-3">
                    <label for="staticEmail" class=" col-form-label canvaSans-fontstyle"><?= LAST_NAME ?></label><br>
                    <div class="col-sm-10 border bg-light p-1">
                        <input type="text" readonly class="form-control-plaintext " id="staticEmail" value="<?= $this->user->lastName ?>">
                    </div>
                </div>
                <div class="form-group  my-3">
                    <label for="staticEmail" class=" col-form-label canvaSans-fontstyle "><?= EMAIL ?></label><br>
                    <div class="col-sm-10 border bg-light p-2">
                        <input type="text" readonly class="form-control-plaintext " id="staticEmail" value="<?= $this->user->email ?>">
                    </div>
                </div>
                <div class="form-group  my-3">
                    <label for="staticEmail" class=" col-form-label canvaSans-fontstyle "><?= PHONE_NUMBER ?></label><br>
                    <div class="col-sm-10 border bg-light p-2">
                        <input type="text" readonly class="form-control-plaintext  " id="staticEmail" value="<?= $this->user->phoneNumber ?>">
                    </div>
                </div>
                <div class="form-group  my-3">
                    <label for="staticEmail" class=" col-form-label canvaSans-fontstyle "><?= BIRTHDAY ?></label><br>
                    <div class="col-sm-10 border bg-light p-2">
                        <input type="text" readonly class="form-control-plaintext " id="staticEmail" value="<?= $this->user->birthDate ?>">
                    </div>
                </div>
            </form>
           </div>
        </div>

    </main>

      <!-- Include scripts here -->


      </div>
  
        <!-- Include scripts here -->
        <?php include_once 'Views/Scripts/accountImportantScript.php'; ?>
    </body>
</html>