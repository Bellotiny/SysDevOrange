<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<body>
  <?php include_once 'Views/nav.php'; ?>

  

  <main>
    <div class="container slide-up">

    <h3 class="mt-4">Booking</h3>
<!--Base payment--->
    <div class="my-4 ">

      <h3>Base payment:</h3>

      <div class="d-flex justify-content-around" style="width: 100%;"> 
        
        <div class="list-group d-flex flex-row w-100 m-2"> 
          
          <label class="list-group-item d-flex gap-2 flex-fill booking-border-style p-4 canvaSans" > 
            <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios1" value="" checked="">
            <span>
              Base Price<small class="text-body-secondary"> ( It follows the natural length of your nails)</small>
            </span>
            <div class="mb-1 d-block  text-success">35 CAD</div>
          </label>
          
          <label class="list-group-item d-flex gap-2 flex-fill booking-border-style  p-4 canvaSans" > 
            <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios2" value="">
            <span>
              Base Price Extension<small class="text-body-secondary"> ( It extends your nail length depending on your preferrence)</small>
            </span>
            <div class="mb-1 d-block  text-success">45 CAD</div>
          </label>
          
        </div>
      </div>
    </div>
<!--design payment--->
    <div class="my-4">
    <hr>
      <h3>Design payment:</h3>
        <div class="d-flex justify-content-around " > 
            <div class="list-group flex-row w-100"> <!-- Ensures the list-group takes the full width -->
                <label class="list-group-item d-flex gap-2 flex-fill  p-4 canvaSans"> <!-- Added flex-fill for equal spacing -->
                    <input class="form-check-input flex-shrink-0" type="checkbox" value="" >
                    <span>
                        Nail Art <small class=" text-body-secondary">(per nail)</small>
                    </span>
                    <div class="mb-1 d-block  text-success">5 CAD</div>
                </label>
                <label class="list-group-item d-flex gap-2 flex-fill  p-4 canvaSans"> <!-- Added flex-fill for equal spacing -->
                    <input class="form-check-input flex-shrink-0" type="checkbox" value="">
                    <span>
                        French tips <small class=" text-body-secondary">(plus the preferred base )</small>
                    </span>
                    <div class="mb-1 d-block  text-success">5 CAD</div>
                </label>
            </div>
        </div>
    </div>
<!--additional services--->
    <div class="my-4">
      <hr>
      <h3>Additional services:</h3>

      <div class="d-flex justify-content-around" style="width: 100%;"> 
          <div class="list-group flex-row w-100"> 
              <label class="list-group-item d-flex gap-2 flex-fill  p-4 canvaSans"> 
                  <input class="form-check-input flex-shrink-0" type="checkbox" value="" >
                  <span>
                      Nail Take off
                  </span>
                  <div class="mb-1 d-block  text-success">10 CAD</div>
              </label>
              <label class="list-group-item d-flex gap-2 flex-fill  p-4 canvaSans">
                  <input class="form-check-input flex-shrink-0" type="checkbox" value="">
                  <span>
                      Nail Polish Change
                  </span>
                  <div class="mb-1 d-block  text-success">10 CAD</div>
              </label>
              <label class="list-group-item d-flex gap-2 flex-fill  p-4 canvaSans">
                  <input class="form-check-input flex-shrink-0" type="checkbox" value="">
                  <span>
                      Pre-Painted Nail Art
                  </span>
                  <div class="mb-1 d-block  text-success">10 CAD</div>
              </label>
          </div>
      </div>

    </div>
    <hr>
<!--location services--->
    <div class="my-4 ">

      <h3>Service Location:</h3>

      <div class="d-flex justify-content-around" style="width: 100%;"> 
        
        <div class="list-group d-flex flex-row w-100"> 
          
          <label class="list-group-item d-flex gap-2 flex-fill booking-border-style p-4 canvaSans" > 
            <input class="form-check-input flex-shrink-0" type="radio" name="servicePlace" id="listGroupRadios1" value="owner" checked="">
            <span>
              Owner's place<small class="text-body-secondary">
                <a href="https://www.google.com/maps/place/Mon+Ami+Korean+BBQ+C%C3%B4te-des-Neiges/@45.4957199,-73.6227813,17z/" target="_blank" rel="noopener noreferrer">
                  (View the Owner's place)
                </a></small>
            </span>
          </label>
          
          <label class="list-group-item d-flex gap-2 flex-fill booking-border-style  p-4 canvaSans" > 
            <input class="form-check-input flex-shrink-0" type="radio" name="servicePlace" id="listGroupRadios2" value="home">
            <span>
              Home service 
            </span>
            <small class=" text-body-secondary">(The location must be 20km from the Owner's place)</small>
          </label>
          
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
      <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/home" role="button">Cancel</a>
      <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/book/bookTwo" role="button">Next</a>
    
    </div>

    </div>
  </main>

 
  <!--progress-->

  <div class="progress my-4  slide-up">
    <div class="progress-bar" role="progressbar" style="width: 5%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">5%</div>
  </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const nextButton = document.querySelector('.btn-primary[href*="bookTwo"]'); // Target the "Next" button
  const homeServiceRadio = document.querySelector('input[name="servicePlce"][value="home"]');

  nextButton.addEventListener('click', function(event) {
    const selectedService = document.querySelector('input[name="servicePlace"]:checked').nextElementSibling.textContent.trim();

    if (selectedService === 'Home service') {
      // Update href for "Home service" selection
      nextButton.href = "<?=BASE_PATH?>/book/homeServiceBooking";
    } else {
      // Set default href for "Owner's place"
      nextButton.href = "<?=BASE_PATH?>/book/bookTwo";
    }
  });
});


</script>





</body>
</html>
