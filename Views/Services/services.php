<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>


<body id="services-body" class="background_color">
<?php include_once 'Views/nav.php'; ?>

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
                      <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/home" role="button">Cancel</a>
                      <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/book/bookOne" role="button">Confirm</a>

                   
                    </div>
                </div>
            </div>
  </div>

<main class="container py-5">

  <div class="green-background text-secondary  container slide-up">
    <div class=" pb-5" >
      <h1 class="mt-5 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center">Services</h1>
    </div>
  </div>


    <div class="row py-2  ">
        <div class="col-md-6 slide-up ">
            <div class="services-card row g-0 border rounded overflow-auto flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-white">
                <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary-emphasis">Base</strong>
                <h3 class="mb-0">Base Price Extension</h3>
                <div class="mb-1  text-success">45 CAD</div>
                <p class="card-text mb-auto ">This is the starting rate charged for basic treatments.This price typically includes essential services like nail shaping, cuticle care, <strong>extension</strong>  and polish application.</p>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="<?=BASE_PATH?>/Views/Images/pic2.jpg" alt="Thumbnail" width="200" height="250" class="img-fluid">
                </div>
            </div>
        </div>
    <div class="col-md-6 slide-up">
      <div class="services-card row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative  bg-white">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary-emphasis">Base</strong>
          <h3 class="mb-0">Base Price</h3>
          <div class="mb-1  text-success">35 CAD</div>
          <p class="card-text mb-auto">This is the starting rate charged for basic treatments.This price typically includes essential services like nail shaping, cuticle care and polish application.</p>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img src="<?=BASE_PATH?>/Views/Images/pic1.jpg" alt="Thumbnail" width="200" height="250" class="img-fluid">
        </div>
      </div>
    </div>
    </div>

    <div class="row ">
        <div class="col-md-6 slide-up ">
            <div class="services-card row g-0 border rounded overflow-auto flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-white">
                <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary-emphasis">Style</strong>
                <h3 class="mb-0">Nail Art</h3>
                <div class="mb-1  text-success">5 CAD</div>
                <p class="card-text mb-auto "> Our nail art service allows customers to choose stylish designs of their choice. <strong>Pricing is per nail</strong>, ensuring you get exactly what you want.</p>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="<?=BASE_PATH?>//Images/pic2.jpg" alt="Thumbnail" width="200" height="250" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="col-md-6 slide-up mb-5 ">
            <div class="services-card row g-0 border rounded overflow-auto flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-white">
                <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary-emphasis">Style</strong>
                <h3 class="mb-0">French Tips</h3>
                <div class="mb-1  text-success">5 CAD</div>
                <p class="card-text mb-auto "> This allows customers to enjoy the classic French tips that everyone is obsessed with.</p>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="<?=BASE_PATH?>/Views/Images/pic1.jpg" alt="Thumbnail" width="200" height="250" class="img-fluid">
                </div>
            </div>
        </div>
   
    <div class="mt-3 green-background text-secondary  container slide-up">
        <div class=" pb-5" >
            <h1 class="mt-3 display-4 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center">Additionl Services</h1>
        </div>
    </div>
   

    <div class="row py-2 mb-5 ">
        <div class="col-md-6 slide-up ">
            <div class="services-card row g-0 border rounded overflow-auto flex-md-row mb-4 shadow-sm h-md-250 position-relative  bg-white">
                <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary-emphasis">Extra</strong>
                <h3 class="mb-0">Nail Take Off</h3>
                <div class="mb-1  text-success">10 CAD</div>
                <p class="card-text mb-auto ">This extra service is for customers whose nail base or extension is still intact </p>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="<?=BASE_PATH?>/Views/Images/pic2.jpg" alt="Thumbnail" width="200" height="250" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-6 slide-up">
        <div class="services-card row g-0 border rounded overflow-auto flex-md-row mb-4 shadow-sm h-md-250 position-relative  bg-white">
            <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary-emphasis">Extra</strong>
            <h3 class="mb-0">Nail Polish Change</h3>
            <div class="mb-1  text-success">10 CAD</div>
            <p class="card-text mb-auto">This extra service is for changing your nail polish only</p>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="<?=BASE_PATH?>/Views/Images/pic1.jpg" alt="Thumbnail" width="200" height="250" class="img-fluid">
            </div>
        </div>
        </div>
    </div>

    <div class="mt-3 green-background text-secondary  container slide-up">
        <div class=" pb-5" >
            <h1 class="mt-2 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center">Color Swatches</h1>
        </div>
    </div>

    <div class="container marketing">

    <!-- Six columns of text below the carousel -->
    <div class="row text-center py-3 slide-up">
              <!----here are the colors--->
              <div class="col-lg-2 mb-3  " >
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color3', 'None', 'colorGroup3')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 0, 0)"></rect></svg>
                  <h5 class="fw-normal">Classic Red</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item"  >
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Baby Pink', 'colorGroup3')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 182, 193)"></rect></svg>
                  <h5 class="fw-normal">Baby Pink</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Nude Beige', 'colorGroup3')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(222, 184, 135)"></rect></svg>
                  <h5 class="fw-normal">Nude Beige</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Peach', 'colorGroup3')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 218, 185)"></rect></svg>
                  <h5 class="fw-normal">Peach</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Lavender', 'colorGroup3')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(230, 230, 250)"></rect></svg>
                  <h5 class="fw-normal">Lavender</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Mint Green', 'colorGroup3')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(152, 251, 152)"></rect></svg>
                  <h5 class="fw-normal">Mint Green</h5>
              </div>


              <!-----more colors--->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Sky Blue', 'colorGroup3')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(135, 206, 235)"></rect></svg>
                  <h5 class="fw-normal">Sky Blue</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Deep Purple', 'colorGroup3')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(75, 0, 130)"></rect></svg>
                  <h5 class="fw-normal">Deep Purple</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color3', 'Bold Orange', 'colorGroup3')"  width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 165, 0)"></rect></svg>
                  <h5 class="fw-normal">Bold Orange</h5>
              </div>
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Sunny Yellow', 'colorGroup3')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 223, 0)"></rect></svg>
                  <h5 class="fw-normal">Sunny Yellow</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Berry Pink', 'colorGroup3')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(199, 21, 133)"></rect></svg>
                  <h5 class="fw-normal">Berry Pink</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Coral', 'colorGroup3')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 127, 80)"></rect></svg>
                  <h5 class="fw-normal">Coral</h5>
              </div>
          </div>
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
<?php include_once 'Views/footer.php'; ?>
</body>
</html>
