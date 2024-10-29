<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<body>
  <?php include_once ROOT . '/Views/nav.php'; ?>

  <main>
    <div class="container">

    <h3 class="mt-4">Booking</h3>
<!--Base payment--->
    <div class="my-4 ">

      <h3>Base payment:</h3>

      <div class="d-flex justify-content-around" style="width: 100%;"> 
        
        <div class="list-group d-flex flex-row w-100 m-2"> 
          
          <label class="list-group-item d-flex gap-2 flex-fill booking-border-style p-4 canvaSans" > 
            <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios1" value="" checked="">
            <span>
              Base Price
            </span>
          </label>
          
          <label class="list-group-item d-flex gap-2 flex-fill booking-border-style  p-4 canvaSans" > 
            <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios2" value="">
            <span>
              Base Price Extension
            </span>
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
                </label>
                <label class="list-group-item d-flex gap-2 flex-fill  p-4 canvaSans"> <!-- Added flex-fill for equal spacing -->
                    <input class="form-check-input flex-shrink-0" type="checkbox" value="">
                    <span>
                        French tips <small class=" text-body-secondary">(plus the preferred base )</small>
                    </span>
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
              </label>
              <label class="list-group-item d-flex gap-2 flex-fill  p-4 canvaSans">
                  <input class="form-check-input flex-shrink-0" type="checkbox" value="">
                  <span>
                      Nail Polish Change
                  </span>
              </label>
              <label class="list-group-item d-flex gap-2 flex-fill  p-4 canvaSans">
                  <input class="form-check-input flex-shrink-0" type="checkbox" value="">
                  <span>
                      Pre-Painted Nail Art
                  </span>
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
            <input class="form-check-input flex-shrink-0" type="radio" name="servicePlce" id="listGroupRadios1" value="" checked="">
            <span>
              Owner's place
            </span>
          </label>
          
          <label class="list-group-item d-flex gap-2 flex-fill booking-border-style  p-4 canvaSans" > 
            <input class="form-check-input flex-shrink-0" type="radio" name="servicePlce" id="listGroupRadios2" value="home">
            <span>
              Home service
            </span>
          </label>
          
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
      <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=home" role="button">Cancel</a>
      <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=book&action=bookTwo" role="button">Next</a>
    
    </div>

    </div>
  </main>

 
  <!--progress-->

  <div class="progress my-4">
    <div class="progress-bar" role="progressbar" style="width: 5%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">5%</div>
  </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const nextButton = document.querySelector('.btn-primary[href*="bookTwo"]'); // Target the "Next" button
        const homeServiceRadio = document.querySelector('input[name="servicePlce"][value="home"]');

        nextButton.addEventListener('click', function(event) {
          const selectedService = document.querySelector('input[name="servicePlce"]:checked').nextElementSibling.textContent.trim();

          if (selectedService === 'Home service') {
            // Update href for "Home service" selection
            nextButton.href = "<?php echo BASE_URL; ?>/index.php?controller=book&action=homeServiceBooking";
          } else {
            // Set default href for "Owner's place"
            nextButton.href = "<?php echo BASE_URL; ?>/index.php?controller=book&action=bookTwo";
          }
        });
      });
    </script>



</body>
</html>
