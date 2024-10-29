<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once ROOT . '/Views/head.php';
?>

<body>
  <?php include_once ROOT . '/Views/nav.php'; ?>

  <main>
    <div class="container py-4">
    <div class="px-4 py-5 my-5 text-center">
      <img class="d-block mx-auto mb-4" src="<?=  BASE_URL ?>/Views/Images/cat3.jpg"  alt="" width="auto" height="150">
      <h3 class="display-5 fw-bold text-body-emphasis">Thank you for your order!</h3>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">We’ve successfully received your booking, and we’re thrilled to be a part of your next beauty experience.</p>
        <small class="text-body-secondary"  style="text-decoration: underline;  font-size: 1.1rem;">Check you email for  more details and confirmation</small>
       
      </div>
    </div>
      

 
  
<!-----button--->
    <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
      <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=home" role="button">Home</a>
    </div>

    </div>
  </main>

  <!--progress-->
  <div class="progress " role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
    <div class="progress-bar" style="width: 100%">100%</div>
  </div>


</body>
</html>
