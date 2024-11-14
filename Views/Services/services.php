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
                      <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/book/" role="button">Confirm</a>

                   
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

    <?php
        foreach($data['services'] as $services){
            echo '<div class="row py-2  ">
                <div class="col-md-6 slide-up ">
                    <div class="services-card row g-0 border rounded overflow-auto flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-white">
                        <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">' . $services->type . '</strong>
                        <h3 class="mb-0">' . $services->name  . '</h3>
                        <div class="mb-1  text-success">' . $services->price . '</div>
                        <p class="card-text mb-auto ">' . $services->description . '</p>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="<?=BASE_PATH?>/Views/Images/pic2.jpg" alt="Thumbnail" width="200" height="250" class="img-fluid">
                        </div>
                    </div>
                </div>';
    
        }
    ?>
    

    <div class="mt-3 green-background text-secondary  container slide-up">
        <div class=" pb-5" >
            <h1 class="mt-2 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center">Color Swatches</h1>
        </div>
    </div>

    <div class="container marketing">

    <!-- Six columns of text below the carousel -->
    <div class="row text-center py-3 slide-up">
              <!----here are the colors--->
              <?php
                foreach($data['colors'] as $colors){
                    echo '<div class="col-lg-2 mb-3  " >
                            <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor(\'Color3\', \'None\', \'colorGroup3\')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="'.$colors->code.'"></rect></svg>
                            <h5 class="fw-normal">'.$colors->name.'</h5>
                        </div>';
                }
                ?>
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
