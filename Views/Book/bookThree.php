<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
?>

<body>
  <?php include_once 'Views/nav.php'; ?>

  <main>
    <div class="container ">
    <div class="py-4  slide-up">
      <h3>Personal Information</h3>

    </div>

    <div class=" slide-up"> 
      <div class=" ">
        <form class="needs-validation" novalidate="">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="username" placeholder="Username" required="">
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

          </div>

          <div class=" m-5">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Base Price</h6>
                  <small class="text-body-secondary">This follows your natural nail shape and length</small>
                </div>
                <span class="text-body-secondary">$35</span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Nail art</h6>
                  <small class="text-body-secondary">This is totaled for 4 nails.</small>
                </div>
                <span class="text-body-secondary">$20</span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Nail Take off</h6>
                  <small class="text-body-secondary">Extra service</small>
                </div>
                <span class="text-body-secondary">$10</span>
              </li>
        
              <li class="list-group-item d-flex justify-content-between">
                <span>Total (CAD)</span>
                <strong>$60</strong>
              </li>
            </ul>
      </div>

          <hr class="my-4">


         

         
        </form>
      </div>
    </div>
    
       
      
      

 
  
<!-----button--->
    <div class="d-flex justify-content-center gap-4 my-5  slide-up" style="width: 100%;">
      <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/book/bookTwo" role="button">Back</a>
      <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/book/bookFour" role="button">Next</a>
    </div>

    </div>
  </main>

 
  <!--progress-->
  <div class="progress  slide-up" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
    <div class="progress-bar" style="width: 65%">65%</div>
  </div>

 

</body>
</html>
