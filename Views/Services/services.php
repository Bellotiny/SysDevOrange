<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>


<body id="services-body">
<?php include_once ROOT . '/Views/nav.php'; ?>  

 <!-- Modal for Booking -->
 <div class="modal fade" id="modalBookingWarning" tabindex="-1" role="dialog" aria-labelledby="modalBookingWarningTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalBookingWarningTitle">Booking Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <h4>Booking Rules:</h4>
                        <ul>
                            <li><strong>The client must pay <span style="color: #d9534f;">$10</span> upon booking</strong>, which will be deducted from the total payment.</li>
                            <li><strong>They must choose at least <span style="color: #d9534f;">one color</span>.</strong></li>
                            <li><strong>Home service is an option but available only <span style="color: #d9534f;">within a certain range</span>.</strong></li>
                            <li><strong>There are <span style="color: #d9534f;">cats</span> in the owner's place.</strong></li>

                        </ul>
                        <hr>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <strong>I read all the reminder</strong>
                        </label>
                    </div>
                    <div class="container d-flex justify-content-center gap-4 my-5">
                      <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=home" role="button">Cancel</a>
                      <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=book&action=bookOne" role="button">Confirm</a>

                   
                    </div>
                </div>
            </div>
  </div>

<main class="container ">

    <div class="row  ">
        <div class="col-12" >
         <h1 class="my-4 text-center" id="services-heading">Services</h1>
        </div>
    </div>
    <hr>

    <div class="row ">
        <div class="col-md-6 ">
            <div class="services-card row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary-emphasis">Base</strong>
                <h3 class="mb-0">Base Price Extension</h3>
                <div class="mb-1  text-success">45 CAD</div>
                <p class="card-text mb-auto scrollable-paragraph">This is the starting rate charged for basic treatments.This price typically includes essential services like nail shaping, cuticle care, <strong>extension</strong>  and polish application.</p>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="<?php echo BASE_URL; ?>/Views/Images/pic2.jpg" alt="Thumbnail" width="200" height="250" class="img-fluid">
                </div>
            </div>
        </div>
    <div class="col-md-6">
      <div class="services-card row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary-emphasis">Base</strong>
          <h3 class="mb-0">Base Price</h3>
          <div class="mb-1  text-success">35 CAD</div>
          <p class="card-text mb-auto">This is the starting rate charged for basic treatments.This price typically includes essential services like nail shaping, cuticle care and polish application.</p>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img src="<?php echo BASE_URL; ?>/Views/Images/pic1.jpg" alt="Thumbnail" width="200" height="250" class="img-fluid">
        </div>
      </div>
    </div>
    </div>

    <div class="row  ">
        <div class="col-12" >
         <h1 class="my-4 text-center" id="services-heading">Additional Services</h1>
        </div>
    </div>
    <hr>

    <div class="row ">
        <div class="col-md-6 ">
            <div class="services-card row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary-emphasis">Base</strong>
                <h3 class="mb-0">Base Price Extension</h3>
                <div class="mb-1  text-success">45 CAD</div>
                <p class="card-text mb-auto scrollable-paragraph">This is the starting rate charged for basic treatments.This price typically includes essential services like nail shaping, cuticle care, <strong>extension</strong>  and polish application.</p>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="<?php echo BASE_URL; ?>/Views/Images/pic2.jpg" alt="Thumbnail" width="200" height="250" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-6">
        <div class="services-card row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary-emphasis">Base</strong>
            <h3 class="mb-0">Base Price</h3>
            <div class="mb-1  text-success">35 CAD</div>
            <p class="card-text mb-auto">This is the starting rate charged for basic treatments.This price typically includes essential services like nail shaping, cuticle care and polish application.</p>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="<?php echo BASE_URL; ?>/Views/Images/pic1.jpg" alt="Thumbnail" width="200" height="250" class="img-fluid">
            </div>
        </div>
        </div>
    </div>

    <div class="row  ">
        <div class="col-12" >
         <h1 class="my-4 text-center" id="services-heading">Color Swatches</h1>
        </div>
    </div>
    <hr>

    <div class="container marketing">

    <!-- Six columns of text below the carousel -->
        <div class="row text-center">
            <div class="col-lg-2 mb-3">
                <svg class="bd-placeholder-img rounded-circle" width="60" height="60" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
                <h5 class="fw-normal">Color 1</h5>
            </div><!-- /.col-lg-2 -->
            <div class="col-lg-2 mb-3">
                <svg class="bd-placeholder-img rounded-circle" width="60" height="60" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
                <h5 class="fw-normal">Color 2</h5>
            </div><!-- /.col-lg-2 -->
            <div class="col-lg-2 mb-3">
                <svg class="bd-placeholder-img rounded-circle" width="60" height="60" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
                <h5 class="fw-normal">Color 3</h5>
            </div><!-- /.col-lg-2 -->
            <div class="col-lg-2 mb-3">
                <svg class="bd-placeholder-img rounded-circle" width="60" height="60" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
                <h5 class="fw-normal">Color 4</h5>
            </div><!-- /.col-lg-2 -->
            <div class="col-lg-2 mb-3">
                <svg class="bd-placeholder-img rounded-circle" width="60" height="60" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
                <h5 class="fw-normal">Color 5</h5>
            </div><!-- /.col-lg-2 -->
            <div class="col-lg-2 mb-3">
                <svg class="bd-placeholder-img rounded-circle" width="60" height="60" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
                <h5 class="fw-normal">Color 6</h5>
            </div><!-- /.col-lg-2 -->

            <!--Second row--->

            <div class="col-lg-2">
                <svg class="bd-placeholder-img rounded-circle" width="60" height="60" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
                <h5 class="fw-normal">Color 1</h5>
            </div><!-- /.col-lg-2 -->
            <div class="col-lg-2">
                <svg class="bd-placeholder-img rounded-circle" width="60" height="60" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
                <h5 class="fw-normal">Color 2</h5>
            </div><!-- /.col-lg-2 -->
            <div class="col-lg-2">
                <svg class="bd-placeholder-img rounded-circle" width="60" height="60" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
                <h5 class="fw-normal">Color 3</h5>
            </div><!-- /.col-lg-2 -->
            <div class="col-lg-2">
                <svg class="bd-placeholder-img rounded-circle" width="60" height="60" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
                <h5 class="fw-normal">Color 4</h5>
            </div><!-- /.col-lg-2 -->
            <div class="col-lg-2">
                <svg class="bd-placeholder-img rounded-circle" width="60" height="60" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
                <h5 class="fw-normal">Color 5</h5>
            </div><!-- /.col-lg-2 -->
            <div class="col-lg-2">
                <svg class="bd-placeholder-img rounded-circle" width="60" height="60" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
                <h5 class="fw-normal">Color 6</h5>
            </div><!-- /.col-lg-2 -->
        </div><!-- /.row -->

    </div>

    <!---pagination--->
    <div class="d-flex justify-content-center my-3">
      <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>
     </div>



</div>



</main>
<?php include_once ROOT . '/Views/footer.php'; ?>
</body>
</html>
