<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once ROOT . '/Views/head.php';
?>

<body>
  <?php include_once ROOT . '/Views/nav.php'; ?>

  <main>
    <div class="container">
      <h3>
        Payment
      </h3>

 
  
<!-----button--->
    <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
      <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=book&action=bookThree" role="button">Back</a>
      <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=book&action=confirmation" role="button">Next</a>  
    </div>

    </div>
  </main>

 
  <!--progress-->
  <div class="progress " role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
    <div class="progress-bar" style="width: 85%">85%</div>
  </div>

 

</body>
</html>
