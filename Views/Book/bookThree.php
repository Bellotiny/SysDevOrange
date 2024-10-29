<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once ROOT . '/Views/head.php';
?>

<body>
  <?php include_once ROOT . '/Views/nav.php'; ?>

  <main>
    <div class="container">
      <form>
        <div class="row">
          <div class="col">
            <label for="formGroupExampleInput">First name</label>
            <input type="text" class="form-control" placeholder="First name">
          </div>
          <div class="col">
            <label for="formGroupExampleInput">Last name</label>
            <input type="text" class="form-control" placeholder="Last name">
          </div>
         
          <div class="row my-4">
            <div class="col">
              <label for="formGroupExampleInput">Email</label>
              <input type="email" class="form-control" placeholder="Email">
            </div>
          </div>
        </div>
      </form>

 
  
<!-----button--->
    <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
      <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=book&action=bookTwo" role="button">Back</a>
      <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=book&action=bookFour" role="button">Next</a>  
    </div>

    </div>
  </main>

 
  <!--progress-->
  <div class="progress " role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
    <div class="progress-bar" style="width: 65%">65%</div>
  </div>

 

</body>
</html>
