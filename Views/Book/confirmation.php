<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
?>

<body>
  <?php include_once 'Views/nav.php'; ?>

  <main>
    <div class="container py-4 slide-up">
    <div class="px-4 py-5 my-5 text-center">
      <img class="d-block mx-auto mb-4" src="<?=BASE_PATH?>/Views/Images/cat3.jpg" alt="" width="auto" height="150">
      <h3 class="display-5 fw-bold text-body-emphasis"><?= THANKS_FOR_ORDER ?></h3>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4"><?= BOOKING_SUCCESS ?></p>
        <small class="text-body-secondary"  style="text-decoration: underline;  font-size: 1.1rem;"><?= CHECK_EMAIL ?></small>
       
      </div>
    </div>
  
<!-----button--->
    <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
      <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/home" role="button"><?= HOME ?></a>
    </div>

    </div>
  </main>

  <!--progress-->
  <div class="progress  slide-up " role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
    <div class="progress-bar" style="width: 100%">100%</div>
  </div>


</body>
</html>
