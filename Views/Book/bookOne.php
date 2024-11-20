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

        <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
          <a class="btn btn-primary w-50 " href="<?=BASE_PATH?>/home" role="button" >Cancel</a>
          <a class="btn btn-primary w-50" role="button" id="next-button-service-1">Next</a>   
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
        <h3>Pick your time and date:</h3>
        <div class="d-flex justify-content-around my-4 slide-up">

          <!-- Date Selection -->
          <div class="form-group">
            <label for="availableDates">Available Dates</label>
            <select class="form-control" id="availableDates" name="selected_date">
              <?php
                $available_dates = [];
                $available_times = [];
                var_dump($data['availabilities']);
            
                foreach ($data['availabilities'] as $datetime) {
                  $dateTimeObj = $datetime->timeslot;
                    $available_dates[] = $dateTimeObj->format('Y-m-d');
                    $available_times[] = $dateTimeObj->format('H:i');
                }
                // Assuming you have an array of available dates from the owner schedule
                //$available_dates = ['2024-10-25', '2024-10-26', '2024-10-27']; // Example dates
                foreach ($available_dates as $date) {
                  echo "<option value=\"$date\">$date</option>";
                }
              ?>
            </select>
          </div>

          <!-- Time Selection -->
          <div class="form-group">
            <label for="availableTimes">Available Times</label>
            <select class="form-control" id="availableTimes" name="selected_time">
              <?php
                // Assuming you have an array of available times for the selected date
                //$available_times = ['10:00 AM - 10:30 AM', '12:00 PM - 1:00PM', '3:00 PM - 4:00PM']; // Example times
                foreach ($available_times as $time) {
                  echo "<option value=\"$time\">$time</option>";
                }
              ?>
            </select>
          </div>
        </div>



        <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
          <a class="btn btn-primary w-50 "  role="button" id="back-button-service-2">Cancel</a>
          <a class="btn btn-primary w-50"  role="button" id="next-button-service-2">Next</a>   
        </div>

        <div class="progress my-4  slide-up " role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar" style="width: 25%">25%</div>
        </div>
    
      </div>

      <!-- Section 3 -->
      <div class="form-section  container pt-5" id="section3">

        <!-- Section 3 Personal Information -->
        <h3>Personal Information:</h3>
        <div class="row g-3 mt-5">
          <div class="col-sm-6">
            <label for="firstName" class="form-label">First name</label>
            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
             </div>
          </div>

          <div class="col-sm-6">
            <label for="lastName" class="form-label">Last name</label>
            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>

          <div class="col-12">
            <label for="username" class="form-label">Username</label>
            <div class="input-group has-validation">
              <span class="input-group-text">@</span>
              <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="">
            <div class="invalid-feedback">
                Your username is required.
              </div>
            </div>
          </div>
        </div>
       

        <!-- Section # cart -->
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary ">Your cart</span>
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



        <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
          <a class="btn btn-primary w-50 " role="button" id="back-button-service-3">Back</a>
          <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/home" role="button" >Done</a>   
        </div>

        <div class="progress  slide-up" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar" style="width: 65%">65%</div>
        </div>
    
      </div>

       <!----- Home service Section ----->
      <div class="form-section  container pt-5" id="section4">

        <div class="container my-3">
          <div class="p-5 text-center green-background rounded-3">
            <h1 class="text-body-emphasis">Enter your address to verfiy</h1>
            <p class="lead">
              Take note: Home service is only available  <code>20 km </code> from the owner's place.
              
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
       <button type="button" onclick="calcRoute()" class="btn btn-primary"  >Verify Address</button>
       <hr>
       <div id="map" style="height: 250px; width: 100%;"></div>
        </div>



        <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
          <a class="btn btn-primary w-50 " href="<?=BASE_PATH?>/home" role="button" id="back-button-service-4">Back</a>
          <a class="btn btn-primary w-50" onclick="nextSection()" role="button" id="next-button-service-4">Next</a>   
        </div>

        <div class="progress  slide-up" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar" style="width: 10%">10%</div>
        </div>

      </div>

      
  </form>
</div>

<script>
  
//colors select
function selectColor(colorGroup, colorName, groupId) {
    const groupContainer = document.getElementById(groupId);

    groupContainer.querySelectorAll('.color-item').forEach(el => {
        el.classList.remove('selected');
    });

    const selectedItem = Array.from(groupContainer.querySelectorAll('.color-item')).find(item => {
        return item.querySelector('h5').textContent === colorName;
    });

    selectedItem.classList.add('selected'); // Add the 'selected' class to the clicked item

    const selectedColorElement = document.getElementById(`selected${colorGroup}`);
    selectedColorElement.textContent = colorName;
}

//SECTION AREA
let currentSection = 1; 
    let serviceSelected = null;
  
    showSection(currentSection);
  
    // Function to show a specific section
    function showSection(sectionNumber) {
      document.querySelectorAll('.form-section').forEach(section => {
        section.classList.remove('active');
      });
      document.getElementById(`section${sectionNumber}`).classList.add('active');
    }
  
    // Handle the next button click for each section
    document.querySelectorAll('[id^="next-button-service"]').forEach(button => {
      button.addEventListener('click', function(event) {
        event.preventDefault();
  
        const selectedServiceRadio = document.querySelector('input[name="servicePlace"]:checked');
        if (!selectedServiceRadio) {
          console.error("No service selected");
          return;
        }
        serviceSelected = selectedServiceRadio.value;
  
        // Handle navigation based on the current section and selected service
        if (serviceSelected === 'home') {
          if (currentSection === 1) {
            currentSection = 4; //special section
          } else if (currentSection === 4) {
            currentSection = 2; 
          } else if (currentSection === 2) {
            currentSection = 3; 
          }
        } else if (serviceSelected === 'owner') {
          if (currentSection === 1) {
            currentSection = 2; 
          } else if (currentSection === 2) {
            currentSection = 3;
          }
        }
  
        showSection(currentSection);
      });
    });
  
    // Handle the back button click
    document.querySelectorAll('[id^="back-button-service"]').forEach(button => {
      button.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default anchor behavior
  
        // Handle going back depending on current section
        if (currentSection === 3) {
          currentSection = 2; 
        } else if (currentSection === 2) {
          currentSection = 1;
        } else if (currentSection === 4) {
          currentSection = 1;
        }
  
        showSection(currentSection); // Show the new section
      });
    });

    //google mapppp
    let map;
let directionsService;
let directionsRenderer;
let destinationAutoComplete;
let sourceAddress = { lat: 45.435095, lng: -73.672204 };

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: { lat: 45.5017, lng: -73.5673 },
    zoom: 13
  });

  google.maps.event.addListener(map, "click", function(event) {
    this.setOptions({ scrollwheel: true });
  });

  directionsService = new google.maps.DirectionsService();
  directionsRenderer = new google.maps.DirectionsRenderer();
  directionsRenderer.setMap(map);

  destinationAutoComplete = new google.maps.places.Autocomplete(
    document.getElementById('destination')
  );
}

function calcRoute() {
  let destination = document.getElementById('destination').value;
  var output =  document.getElementById('output');

  let request = {
    origin: sourceAddress,
    destination: destination,
    travelMode: 'DRIVING'
  };

  directionsService.route(request, function(result, status) {
    if (status === "OK") {
      directionsRenderer.setDirections(result);
      
      // Calculate and display the distance
      const distanceInMeters = result.routes[0].legs[0].distance.value;
      const distanceInKm = (distanceInMeters / 1000).toFixed(2); // Convert to km and round to 2 decimals
      output.innerHTML = `<h3>${distanceInKm} km</h3>`;
      output.classList.add('result-design');

      // Check if within 20 km range
      if (distanceInKm <= 20) {
        output.innerHTML = `<p>Within 20 km range for home service.</p>`;
        output.style.color = "#667744";
      } else {
        output.innerHTML = `<p>Outside the 20 km range for home service.</p>`;
        output.style.color = "#D9534F";
      }

    } else {
      output.innerHTML = `<p>Location not found</p>`;
      output.style.color = "#D9534F";
    }
  });
}

</script>

</body>
</html>