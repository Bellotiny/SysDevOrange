<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<?php include_once 'Views/nav.php'; ?>
<body onload="initMap()">
<div id="form-container" data-section="1" class="my-5">
  <form method="POST" novalidate="" class="needs-validation ">
     <!-- Section 1 -->
     <div class="form-section active container pt-5 "  id="section1">

       <!-- Section 1 Base Service -->
       <?php
          $countType = 0;
              $maxCount = array_count_values(array_map(function($service) {
                  return $service->type;
              }, $data['services']));

          foreach($data['services'] as $service){
                  if ($countType < $maxCount[$service->type]) {
                      if ($countType == 0) {
                          echo '<h3>' . $service->type . '</h3>';
                      }
                      $countType++;
                  } else {
                      $countType = 0;
                      echo '<h3>' . $service->type . '</h3>';
                      $countType++;
                  }

                  echo '<div class="list-group d-flex flex-row w-100 m-2">
                          <label class="list-group-item d-flex gap-2 flex-fill booking-border-style p-4 canvaSans">
                              <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios1" value="" checked="">
                              <span>
                                  ' . $service->name . '<br><small class="text-body-secondary">' . $service->description . '</small>
                              </span><br><br>
                              <div class="mb-1 d-block text-success">' . $service->price . ' CAD</div>
                          </label>
                        </div>';
              }
      ?>

        <!-- Section 1 Location Service -->
        <h3><?= SERVICE_LOCATION ?></h3>

        <div class="d-flex justify-content-around" style="width: 100%;"> 
          <div class="list-group d-flex flex-row w-100"> 
            
            <label class="list-group-item d-flex gap-2 flex-fill booking-border-style p-4 canvaSans" > 
              <input class="form-check-input flex-shrink-0" type="radio" name="servicePlace" id="listGroupRadios1" value="owner" checked="">
              <span>
                <?= OWNERS_PLACE ?><small class="text-body-secondary">
                  <a href="https://www.google.com/maps/place/Mon+Ami+Korean+BBQ+C%C3%B4te-des-Neiges/@45.4957199,-73.6227813,17z/" target="_blank" rel="noopener noreferrer">
                    <?= OWNERS_LOCATION ?>
                  </a></small>
              </span>
            </label>
            
            <label class="list-group-item d-flex gap-2 flex-fill booking-border-style  p-4 canvaSans" > 
              <input class="form-check-input flex-shrink-0" type="radio" name="servicePlace" id="listGroupRadios2" value="home">
              <span>
               <?= HOME_SERVICE ?> 
              </span>
              <small class=" text-body-secondary"><?= TWENTY_KM ?></small>
            </label>
            
          </div>
        </div>

        <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
          <a class="btn btn-primary w-50 " href="<?=BASE_PATH?>/home" role="button" ><?= CANCEL ?></a>
          <a class="btn btn-primary w-50" role="button" id="next-button-service-1"><?= NEXT ?></a>   
        </div>

        <div class="progress my-4  slide-up">
          <div class="progress-bar" role="progressbar" style="width: 5%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">5%</div>
        </div>
              
     </div>

      <!-- Section 2 -->
      <div class="form-section  container pt-5"  id="section2">

        <!-- Section 2 Color -->
        <h3>Pick your color(s):</h3>
        <div class="accordion" id="accordionExample" >
          <div class="accordion-item" id="colorGroup1">
            <h3 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Color 1:<span id="selectedColor1">Classic Red</span>
              </button>
            </h3>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body slide-up">
                <div class="row text-center">
                    <!----here are the colors--->
                    <?php
                        $selectedColor = false; // Use this flag if you need to mark a selected color
                        foreach ($data['colors'] as $colors) {
                            // Determine if the current color should be selected
                            $isSelected = $selectedColor ? 'selected' : '';
                            echo '<div class="col-lg-2 mb-3 color-item ' . $isSelected . '">
                                    <svg class="bd-placeholder-img rounded-circle" onclick="selectColor(\'Color1\', \'' . addslashes($colors->name) . '\', \'colorGroup1\')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="' . $colors->code . '"></rect>
                                    </svg>
                                    <h5 class="fw-normal">' . $colors->name . '</h5>
                                  </div>';
                        }
                    ?>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion-item" id="colorGroup2">
            <h3 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Color 2:<span id="selectedColor2">None</span>
              </button>
            </h3>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body slide-up">
              <div class="row text-center">
                  <!----here are the colors--->
                  <?php
                        $selectedColor = false; // Use this flag if you need to mark a selected color
                        foreach ($data['colors'] as $colors) {
                            // Determine if the current color should be selected
                            $isSelected = $selectedColor ? 'selected' : '';
                            echo '<div class="col-lg-2 mb-3 color-item ' . $isSelected . '">
                                    <svg class="bd-placeholder-img rounded-circle" onclick="selectColor(\'Color1\', \'' . addslashes($colors->name) . '\', \'colorGroup1\')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="' . $colors->code . '"></rect>
                                    </svg>
                                    <h5 class="fw-normal">' . $colors->name . '</h5>
                                  </div>';
                        }
                    ?>
              </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Section 2 Date and time -->
        <h3><?= PICK_TIME ?></h3>
        <div class="d-flex justify-content-around my-4 slide-up">

          <!-- Date Selection -->
          <div class="form-group">
            <label for="availableDates"><?= AVAILABLE_DATES ?></label>
            <select class="form-control" id="availableDates" name="selected_date">
              <?php
                // Assuming you have an array of available dates from the owner schedule
                $available_dates = ['2024-10-25', '2024-10-26', '2024-10-27']; // Example dates
                foreach ($available_dates as $date) {
                  echo "<option value=\"$date\">$date</option>";
                }
              ?>
            </select>
          </div>

          <!-- Time Selection -->
          <div class="form-group">
            <label for="availableTimes"><?= AVAILABLE_TIMES ?></label>
            <select class="form-control" id="availableTimes" name="selected_time">
              <?php
                // Assuming you have an array of available times for the selected date
                $available_times = ['10:00 AM - 10:30 AM', '12:00 PM - 1:00PM', '3:00 PM - 4:00PM']; // Example times
                foreach ($available_times as $time) {
                  echo "<option value=\"$time\">$time</option>";
                }
              ?>
            </select>
          </div>
        </div>



        <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
          <a class="btn btn-primary w-50 "  role="button" id="back-button-service-2"><?= CANCEL ?></a>
          <a class="btn btn-primary w-50"  role="button" id="next-button-service-2"> <?= NEXT ?></a>   
        </div>

        <div class="progress my-4  slide-up " role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar" style="width: 25%">25%</div>
        </div>
    
      </div>

      <!-- Section 3 -->
      <div class="form-section  container pt-5" id="section3">

        <!-- Section 3 Personal Information -->
        <h3><?= PERSONAL_INFO ?></h3>
        <div class="row g-3 mt-5">
          <div class="col-sm-6">
            <label for="firstName" class="form-label"><?= FIRST_NAME ?></label>
            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required="">
            <div class="invalid-feedback">
              <?= VALID_FIRST_NAME_ERROR ?>
             </div>
          </div>

          <div class="col-sm-6">
            <label for="lastName" class="form-label"><?= LAST_NAME ?></label>
            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="" required="">
            <div class="invalid-feedback">
            <?= VALID_LAST_NAME_ERROR ?>
            </div>
          </div>

          <div class="col-12">
            <label for="username" class="form-label"><?= EMAIL ?></label>
            <div class="input-group has-validation">
              <span class="input-group-text">@</span>
              <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="">
            <div class="invalid-feedback">
                <?= VALID_EMAIL_ERROR ?>
              </div>
            </div>
          </div>
        </div>
       

        <!-- Section # cart -->
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary "><?= YOUR_CART ?></span>
          <span class="badge bg-primary rounded-pill">3</span>
        </h4>

        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><?= BASE_PRICE ?></h6>
              <small class="text-body-secondary"><?= NATURAL_NAIL_LENGTH ?></small>
            </div>
              <span class="text-body-secondary">$35</span>
          </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0"><?= NAIL_ART ?></h6>
                <small class="text-body-secondary"><?= TOTAL_FOUR_NAILS ?></small>
              </div>
              <span class="text-body-secondary">$20</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0"><?= NAIL_TAKE_OFF ?></h6>
                <small class="text-body-secondary"><?= EXTRA_SERVICE ?></small>
              </div>
              <span class="text-body-secondary">$10</span>
            </li>
        
            <li class="list-group-item d-flex justify-content-between">
              <span><?= TOTAL_CAD ?></span>
              <strong>$60</strong>
            </li>
        </ul>



        <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
          <a class="btn btn-primary w-50 " role="button" id="back-button-service-3"><?= BACK ?></a>
          <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/home" role="button" ><?= DONE ?></a>   
        </div>

        <div class="progress  slide-up" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar" style="width: 65%">65%</div>
        </div>
    
      </div>

       <!----- Home service Section ----->
      <div class="form-section  container pt-5" id="section4">

        <div class="container my-3">
          <div class="p-5 text-center green-background rounded-3">
            <h1 class="text-body-emphasis"><?= ADDRESS_TO_VERIFY ?></h1>
            <p class="lead">
              <?= HOME_SERVICE_ONLY_AVAIL_1 ?>  <code>20 km </code> <?= HOME_SERVICE_ONLY_AVAIL_2 ?>
              
              <div class="row">
                <div class=" col-4  " id=""></div>
                <div class=" col-4 green-background " id="output"></div>
                <div class=" col-4  " id=""></div>
              </div>
              
            </p>
          </div>
        </div>

        <div class="container">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Destination Location" id="destination">
        </div>
        <br>
       <button type="button" onclick="calcRoute()" class="btn btn-primary"  ><?= VERIFY_ADDRESS ?></button>
       <hr>
       <div id="map" style="height: 250px; width: 100%;"></div>
        </div>



        <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
          <a class="btn btn-primary w-50 " href="<?=BASE_PATH?>/home" role="button" id="back-button-service-4"><?= BACK ?></a>
          <a class="btn btn-primary w-50" onclick="nextSection()" role="button" id="next-button-service-4"><?= NEXT ?></a>   
        </div>

        <div class="progress  slide-up" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar" style="width: 10%">10%</div>
        </div>

      </div>

      
  </form>
</div>



</body>
</html>