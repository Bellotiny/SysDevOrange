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

       <div class="container my-2">
        <div class="position-relative p-5 text-center text-muted border border-dashed rounded-5 h-20" id="divAccount">
            <svg class="bi mt-5 mb-3" width="48" height="48"><use xlink:href="#check2-circle"></use></svg>
            <h1 class="text-body-emphasis">Hello, <?= $data[0]->firstName ?></h1>
            <p class="col-lg-6 mx-auto mb-4">
            We're so happy to see you.<br> Your little nook of joy is ready and waiting for you.&#127752;
            </p>
        </div>
        </div>
       
    <div class="my-4">
        <form>
            <div class="form-group row my-3">
                <label for="staticEmail" class="col-sm-2 col-form-label canvaSans-fontstyle display-3">First Name:</label><br>
                <div class="col-sm-10 border bg-light">
                    <input type="text" readonly class="form-control-plaintext " id="staticEmail" value="<?= $data[0]->firstName ?>">
                </div>
            </div>
            <div class="form-group row my-3">
                <label for="staticEmail" class="col-sm-2 col-form-label canvaSans-fontstyle display-3">Last Name:</label><br>
                <div class="col-sm-10 border bg-light">
                    <input type="text" readonly class="form-control-plaintext " id="staticEmail" value="<?= $data[0]->lastName ?>">
                </div>
            </div>
            <div class="form-group row my-3">
                <label for="staticEmail" class="col-sm-2 col-form-label canvaSans-fontstyle display-3">Email:</label><br>
                <div class="col-sm-10 border bg-light">
                    <input type="text" readonly class="form-control-plaintext " id="staticEmail" value="<?= $data[0]->email ?>">
                </div>
            </div>
            <div class="form-group row my-3">
                <label for="staticEmail" class="col-sm-2 col-form-label canvaSans-fontstyle display-3">Phone Number:</label><br>
                <div class="col-sm-10 border bg-light">
                    <input type="text" readonly class="form-control-plaintext  " id="staticEmail" value="<?= $data[0]->phoneNumber ?>">
                </div>
            </div>
            <div class="form-group row my-3">
                <label for="staticEmail" class="col-sm-2 col-form-label canvaSans-fontstyle display-3">Birthday:</label><br>
                <div class="col-sm-10 border bg-light">
                    <input type="text" readonly class="form-control-plaintext " id="staticEmail" value="<?= $data[0]->birthDate ?>">
                </div>
            </div>
        </form>
    </div>

    </main>

      <!-- Include scripts here -->


      </div>
  
      
    </body>
</html>