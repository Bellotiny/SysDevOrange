<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<?php 
include_once 'Views/nav.php'; 
?>
<body onload="initMap()">
<div id="form-container" data-section="1" class="my-5">
  <form action="<?=BASE_PATH?>/book/add" method="POST" novalidate="" class="needs-validation ">
     <!-- Section 1 -->
     <div class="form-section active container pt-5 "  id="section1">

       <!-- Section 1 Base Service -->
       <?php
        $servicesByType = [];
        foreach ($data['services'] as $service) {
            $servicesByType[$service->type][] = $service;
        }

        $totalPrice = 0;

        foreach ($servicesByType as $type => $services) {
            echo '<h3>' . $type . '</h3>';

            // Determine input type based on the type of service
            $inputType = $type === 'Base' ? 'radio' : 'checkbox';

            foreach ($services as $service) {
                if($service->visibility == 1){
                  $totalPrice += $service->price;
                $serviceJson = htmlspecialchars(json_encode($service), ENT_QUOTES, 'UTF-8');

                echo '<div class="list-group d-flex flex-row w-100 m-2">
                        <label class="list-group-item d-flex gap-2 flex-fill booking-border-style p-4 canvaSans">
                            <input onchange="return updateCart()" class="form-check-input flex-shrink-0" 
                                type="' . $inputType . '" 
                                name="serviceType[' . $type . ']' . ($inputType === 'checkbox' ? '[]' : '') . '" 
                                value="' . $serviceJson . '" 
                                id="service-' . $service->name . '" required>
                            <span class="flex-grow-1">
                                ' . $service->name . '<br><small class="text-body-secondary">' . $service->description . '</small>
                            </span>
                            <div class="text-success d-flex justify-content-end align-items-center" style="min-width: 80px;">
                                ' . $service->price . ' CAD
                            </div>
                        </label>
                      </div>';
                }
            }
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
          <a class="btn btn-primary w-50 " href="<?=BASE_PATH?>/home" role="button" onclick="back()"><?= CANCEL ?></a>
          <a class="btn btn-primary w-50 disabled" role="button" id="next-button-service-1" onclick="next()"><?= NEXT ?></a>

        </div>

        <div class="progress my-4  slide-up">
          <div class="progress-bar" role="progressbar" style="width: 5%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">5%</div>
        </div>
              
     </div>

      <!-- Section 2 -->
      <div class="form-section  container pt-5"  id="section2">

        <!-- Section 2 Color -->
        <h3><?= PICK_COLORS ?></h3>
        <div class="accordion" id="accordionExample" >

          <div class="accordion-item" id="colorGroup1">
            <h3 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <?= COLOR ?> 1: <span id="selectedColor1"><?= NONE ?></span>
              </button>
            </h3>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body slide-up">
                <div class="row text-center">
                    <!----here are the colors--->
                    <?php
                      $selectedColor = false;
                      foreach ($data['colors'] as $colors) {
                         if($colors->visibility == 1){
                          $colorJson = htmlspecialchars(json_encode($colors), ENT_QUOTES, 'UTF-8'); // Escape JSON for HTML attributes
                          $isSelected = $selectedColor ? 'selected' : '';
                          echo '<div class="col-6 col-sm-4 col-lg-2 mb-3 color-item ' . $isSelected . '">
                                  <svg class="bd-placeholder-img rounded-circle" tabindex="0" onclick="selectColor(\'Color1\', ' . $colorJson . ', \'colorGroup1\')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="' . $colors->name . '" preserveAspectRatio="xMidYMid slice" style="cursor: pointer;">
                                      <rect width="100%" height="100%" fill="' . $colors->code . '"></rect>
                                  </svg>
                                  <h5 class="fw-normal text-center">' . $colors->name . '</h5>
                                </div>';
                         }
                      }

                    ?>
                    
                </div>
              </div>
            </div>
          </div>

          <div class="accordion-item" id="colorGroup2">
            <h3 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <?= COLOR ?> 2: <span id="selectedColor2"><?= NONE ?></span>
              </button>
            </h3>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body slide-up">
              <div class="row text-center">
                  <!----here are the colors--->
                  <?php
                    $selectedColor = false;
                    foreach ($data['colors'] as $colors) {
                       if($colors->visibility){
                         // Use json_encode() and escape quotes for HTML safety
                         $colorJson = htmlspecialchars(json_encode($colors), ENT_QUOTES, 'UTF-8');
                         $isSelected = $selectedColor ? 'selected' : '';
                         echo '<div class="col-6 col-sm-4 col-lg-2 mb-3 color-item ' . $isSelected . '">
                                   <svg class="bd-placeholder-img rounded-circle" tabindex="0" onclick="selectColor(\'Color2\', ' . $colorJson . ', \'colorGroup1\')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="' . $colors->name . '" preserveAspectRatio="xMidYMid slice" style="cursor: pointer;">
                                       <rect width="100%" height="100%" fill="' . $colors->code . '"></rect>
                                   </svg>
                                   <h5 class="fw-normal text-center">' . $colors->name . '</h5>
                                 </div>';
                       }
                       
                    }
                    ?>
              </div>
              </div>
            </div>
          </div>

          <div class="accordion-item" id="colorGroup3">
            <h3 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                <?= COLOR ?> 3: <span id="selectedColor3"><?= NONE ?></span>
              </button>
            </h3>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body slide-up">
              <div class="row text-center">
                  <!----here are the colors--->
                  <?php
                    $selectedColor = false;
                    foreach ($data['colors'] as $colors) {
                       if($colors->visibility == 1){
                         // Use json_encode() and escape quotes for HTML safety
                         $colorJson = htmlspecialchars(json_encode($colors), ENT_QUOTES, 'UTF-8');
                         $isSelected = $selectedColor ? 'selected' : '';
                         echo '<div class="col-6 col-sm-4 col-lg-2 mb-3 color-item ' . $isSelected . '">
                                   <svg class="bd-placeholder-img rounded-circle" tabindex="0" onclick="selectColor(\'Color3\', ' . $colorJson . ', \'colorGroup1\')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="' . $colors->name . '" preserveAspectRatio="xMidYMid slice" style="cursor: pointer;">
                                       <rect width="100%" height="100%" fill="' . $colors->code . '"></rect>
                                   </svg>
                                   <h5 class="fw-normal text-center">' . $colors->name . '</h5>
                                 </div>';
                       }
                    }
                    ?>
              </div>
              </div>
            </div>
          </div>

          <?= '<input type="hidden" id="colorGroupColor1" name="colorGroupColor1" value="">'; ?>
          <?= '<input type="hidden" id="colorGroupColor2" name="colorGroupColor2" value="">'; ?>
          <?= '<input type="hidden" id="colorGroupColor3" name="colorGroupColor3" value="">'; ?>
        </div>

        <!-- Section 2 Date and time -->
        <h3><?= PICK_TIME ?></h3>
        <div class="d-flex justify-content-around my-4 slide-up">

          <!-- Date Selection -->
          <div class="form-group">
          <label for="availableDates"><?= AVAILABLE_DATES ?></label>
          <select class="form-control" id="availableDates" name="selected_date">
          <?php
              $available_dates_times = [];
              foreach ($data['availabilities'] as $availability) {
                  $datetime = $availability->timeSlot;

                  $parts = explode(' ', $datetime);

                  $dates = $parts[0];
                  $times = $parts[1];

                  $available_dates_times[$dates][] = $times;
              }

              // Debug: Log the processed data
              error_log("Processed dates and times: " . print_r($available_dates_times, true));

              // Generate dropdown options
              foreach (array_keys($available_dates_times) as $date) {
                  $formatted_date = date('M j, Y', strtotime($date));
                  echo "<option value=\"$date\">$formatted_date</option>";
              }
              ?>

            </select>
          </div>

          <!-- Time Selection -->
          <div class="form-group">
            <label for="availableTimes"><?= AVAILABLE_TIMES ?></label>
            <select class="form-control" id="availableTimes" name="selected_time">
                <?php
                foreach ($available_dates_times[$dates] as $time) {
                  $formatted_time = date('h:i A', strtotime($time));
                  echo "<option value=\"$time\">$formatted_time</option>";
                }
                ?>
            </select>
        </div>

          <!-- Hidden input for the combined date and time -->
          <input type="hidden" id="selected_date_time" name="selected_date_time">
        </div>



        <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
          <a class="btn btn-primary w-50  "  role="button" id="back-button-service-2" onclick="back()"><?= CANCEL ?></a>
          <a class="btn btn-primary w-50 disabled"  role="button" id="next-button-service-2" onclick="next()"><?= NEXT ?> </a>

        </div>

        <div class="progress my-4  slide-up " role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar" style="width: 25%">25%</div>
        </div>
    
      </div>

      <!-- Section 3 -->
      <div class="form-section  container pt-5" id="section3">
        <!-- Section 3 Personal Information -->
        <h3><?= PERSONAL_INFO ?></h3>
                <div class='row g-3 mt-5'>
                  <div class='col-sm-6'>
                    <label for='firstName' class='form-label'><?= FIRST_NAME ?></label>
                    <input type='text' class='form-control' name='firstName' id='firstName' placeholder='' value='' required>
                    <div class='invalid-feedback'>
                      <?= VALID_FIRST_NAME_ERROR ?>
                    </div>
                  </div>

                  <div class='col-sm-6'>
                    <label for='lastName' class='form-label'><?= LAST_NAME ?></label>
                    <input type='text' class='form-control' name='lastName' id='lastName' placeholder='' value='' required>
                    <div class='invalid-feedback'>
                    <?= VALID_LAST_NAME_ERROR ?>
                    </div>
                  </div>

                  <div class='col-12'>
                    <label for='email' class='form-label'><?= EMAIL ?></label>
                    <div class='input-group has-validation'>
                      <span class='input-group-text'>@</span>
                      <input type='text' class='form-control' name='email' id='email' placeholder='email' required>
                      <div class='invalid-feedback'>
                        <?= VALID_EMAIL_ERROR ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class='d-flex justify-content-center gap-4 my-5' style='width: 100%;'>
                  <a class='btn btn-primary w-50' role='button' id='back-button-service-3' onclick='back()'><?= CANCEL ?> </a>
                  <a class='btn btn-primary w-50 disabled' role='button' id='next-button-service-3' onclick='next()'><?= NEXT ?> </a>
                </div>

                <div class='progress my-4 slide-up' role='progressbar' aria-label='Example with label' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'>
                  <div class='progress-bar' style='width: 25%'>25%</div>
                </div>


        
      </div>
        

      <!-- Section # cart -->
      <div  class="form-section  container pt-5" id="section5">
      <div id="cart-container" class="container my-5">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary"><?= YOUR_CART ?></span>
          <span id="cart-count" class="badge bg-primary rounded-pill">0</span>
        </h4>
        <ul id="cart-items" class="list-group mb-3"></ul>
        <div class="list-group-item d-flex justify-content-between">
          <span><?= TOTAL_CAD ?></span>
          <strong id="cart-total">0</strong>
        </div>


        <br><br>
        <div class="green-background text-secondary  container slide-up ">
              <div class=" pb-5" >
                  <h1 class="mt-5 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center"><?= ADD_REFERENCE ?></h1>
              </div>
          </div>

          <!-- Message and image -->
              <div class="mb-3">
                  <label for="message" class="form-label">Message</label>
                  <textarea name="message" id="message" class="form-control" rows="3" placeholder="<?= DESCRIBE ?>" required></textarea>
              </div>
              <div class="mb-3">
                  <label for="image" class="form-label"><?= UPLOAD_IMAGE_REVIEW ?></label>
                  <input type="file" name="image" id="image" class="form-control" accept="image/*">
              </div>
              <?php if (isset($data['error'])): ?>
                  <p><span style="color:red"><?php echo $data['error']; ?></span></p>
              <?php endif; ?>

        <br><br>

        <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
        <a class="btn btn-primary w-50 " role="button" id="back-button-service-4" onclick="back()"><?= BACK ?></a>
          <input type="submit" class="btn btn-primary w-50 disabled" value="Book" id="next-button-service-5">
          <!-- <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/home" role="button" >Done</a> -->
        </div>

        <div class="progress  slide-up" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar" style="width: 65%">65%</div>
        </div>
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
          <input type="text" class="form-control" placeholder="Destination Location" id="destination" name="servicePlace">
        </div>
        <br>
       <button type="button" onclick="calcRoute()" class="btn btn-primary"  ><?= VERIFY_ADDRESS ?></button>
       <hr>
       <div id="map" style="height: 250px; width: 100%;"></div>
        </div>



        <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
          <a class="btn btn-primary w-50 " role="button" id="back-button-service-4" onclick="back()"><?= BACK ?></a>
          <a class="btn btn-primary w-50 disabled" role="button" id="next-button-service-4" onclick="next()"><?= NEXT ?></a>
        </div>

        <div class="progress  slide-up" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar" style="width: 10%">10%</div>
        </div>

      </div>

      
  </form>
</div>

<script>
  const tokenIsSet = document.cookie.indexOf('token=') !== -1;
console.log("Token check:");
console.log(tokenIsSet);

let cart = [];
let totalPrice = 0;

function updateCart() {
  console.log("Cart Updated:", cart);
  const cartContainer = document.getElementById('cart-items');
  const cartCount = document.getElementById('cart-count');
  const cartTotal = document.getElementById('cart-total');
  const nextButton1 = document.getElementById('next-button-service-1');
  const nextButtonCart = document.getElementById('next-button-service-5');

  cartContainer.innerHTML = '';
  cart.forEach((item, index) => {
    const listItem = document.createElement('li');
    listItem.className = 'list-group-item d-flex justify-content-between lh-sm';
    listItem.innerHTML = `
      <div>
        <h6 class="my-0">${item.name}</h6>
      </div>
      <span class="text-success d-flex justify-content-end align-items-center" style="min-width: 80px;">${item.price} CAD</span>
      <button class="btn btn-danger btn-sm" onclick="removeFromCart(${index})">Remove</button>
    `;
    cartContainer.appendChild(listItem);
  });

  // Enable/Disable Next Button
  if (cart.length > 0) {
    nextButton1.classList.remove('disabled');
    nextButtonCart.classList.remove('disabled');
  } else {
    nextButton1.classList.add('disabled');
    nextButtonCart.classList.add('disabled');
  }

  // Update Cart Count and Total Price
  cartCount.textContent = cart.length;
  cartTotal.textContent = `${totalPrice.toFixed(2)} CAD`;
}

function addToCart(name, description, price, type) {
  cart.push({ name, description, price, type });
  totalPrice += price;
  updateCart();
}

function removeFromCart(index) {
  totalPrice -= cart[index].price;
  cart.splice(index, 1);
  updateCart();
}

// Event Listener to Handle Change on Service Selection
document.addEventListener('change', (event) => {
  if (event.target.name && event.target.name.startsWith('serviceType')) {
    const service = JSON.parse(event.target.value); 
    const inputType = event.target.type; // Determine if radio or checkbox

    // If it's a radio button, replace the current selection for that type
    if (inputType === 'radio') {
      // Remove all items of the same type (if the service has a type attribute)
      const sameTypeItems = cart.filter(item => item.type === service.type);
      sameTypeItems.forEach(item => {
        const index = cart.findIndex(cartItem => cartItem.name === item.name);
        if (index !== -1) removeFromCart(index);
      });

      // Add the new selection
      addToCart(service.name, service.description, parseFloat(service.price), service.type);
    } 

    // If it's a checkbox, toggle the item in the cart
    else if (inputType === 'checkbox') {
      const existingItemIndex = cart.findIndex(item => item.name === service.name);

      if (existingItemIndex !== -1) {
        // If item exists, remove it
        removeFromCart(existingItemIndex);
      } else {
        // If not, add it
        addToCart(service.name, service.description, parseFloat(service.price), service.type);
      }
    }
  }
});

//colors select
function selectColor(colorGroup, colorObject, groupId) { 
    const groupContainer = document.getElementById(groupId);
    if (!groupContainer) {
        console.error(`Group container with ID "${groupId}" not found.`);
        return;
    }
    // Remove 'selected' class from all color items in the group
   groupContainer.querySelectorAll('.color-item').forEach(el => {
        el.classList.remove('selected');
    });
    // Find the clicked color item and add 'selected' class
    const selectedItem = Array.from(groupContainer.querySelectorAll('.color-item')).find(item => {
        const itemName = item.querySelector('h5')?.textContent.trim();
        return itemName === colorObject.name;
    });

    if (!selectedItem) {
        console.error(`No matching color item found for color name "${colorObject.name}".`);
        return;
    }

    selectedItem.classList.add('selected');
// Update the displayed selected color name
    const selectedColorElement = document.getElementById(`selected${colorGroup}`);
    if (!selectedColorElement) {
        console.error(`Selected color display element with ID "selected${colorGroup}" not found.`);
        return;
    }
    selectedColorElement.textContent = colorObject.name;
 // Update the hidden input with the selected color's JSON data
 const hiddenInput = document.getElementById(`colorGroupColor${colorGroup.charAt(colorGroup.length - 1)}`);
    if (hiddenInput) {
        hiddenInput.value = JSON.stringify(colorObject);  // Store the selected color as a JSON string
    }
    toggleNextButtonColorTime();

    console.log(`Color "${colorObject.name}" selected successfully for group "${colorGroup}".`);
}

function toggleNextButtonColorTime() {
    const nextButton2 = document.getElementById('next-button-service-2');
    const selectedColor1 = document.getElementById("selectedColor1").innerText !== 'None';
    const selectedColor2 = document.getElementById("selectedColor2").innerText !== 'None';
    const selectedColor3 = document.getElementById("selectedColor3").innerText !== 'None';
   // const colorSelected = document.querySelectorAll('.color-item.selected').length > 0;
    const timeSelected = document.getElementById('availableTimes').value !== '';
    console.log("colorSelected len: " + selectedColor1);
    console.log(timeSelected);
console.log("has color and time: " + (selectedColor1 && timeSelected))
    if ((selectedColor1 ||selectedColor2 ||selectedColor3) && timeSelected) {
        nextButton2.classList.remove('disabled');
    } else {
        nextButton2.classList.add('disabled');
    }
}


document.addEventListener('DOMContentLoaded', () => {
        selectedTime();
        toggleNextButtonColorTime();
    });

  function selectedTime() { 
    const availableDatesTimes = <?php echo json_encode($available_dates_times); ?>;

    const dateSelect = document.getElementById('availableDates');
    const timeSelect = document.getElementById('availableTimes');
    const dateTimeInput = document.getElementById('selected_date_time');

    function updateTimes(selectedDate) {
        timeSelect.innerHTML = '';
        const times = availableDatesTimes[selectedDate] || [];
        times.forEach(time => {
            const option = document.createElement('option');
            option.value = time;
            option.textContent = formatTime(time);
            timeSelect.appendChild(option);
        });

        if (times.length > 0) {
            dateTimeInput.value = `${selectedDate} ${times[0]}`;
        } else {
            dateTimeInput.value = '';
        }
        toggleNextButtonColorTime();
    }

    dateSelect.addEventListener('change', (event) => {
        updateTimes(event.target.value);
    });

    timeSelect.addEventListener('change', (event) => {
        const selectedDate = dateSelect.value;
        const selectedTime = event.target.value;
        dateTimeInput.value = `${selectedDate} ${selectedTime}`;
        toggleNextButtonColorTime();
    });

    function formatTime(time) {
        const [hour, minute] = time.split(':');
        return `${hour}:${minute}`;
    }

    updateTimes(dateSelect.value);
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
  console.log(tokenIsSet);
  function next() {
    //console.log("dede");
    console.log( currentSection);
      const selectedServiceRadio = document.querySelector('input[name="servicePlace"]:checked');
      if (!selectedServiceRadio) {
        console.error("No service selected");
        return;
      }
      serviceSelected = selectedServiceRadio.value;
      

      // Handle navigation based on the current section and selected service
      if (serviceSelected === 'home' ) {
        if (currentSection === 1) {
          currentSection = 4; //special section
        } else if (currentSection === 4) {
          currentSection = 2; 
        } else if (currentSection === 2) {
         
          if(tokenIsSet){
            currentSection = 5;
          }else{
            currentSection = 3; 
          }
          
        }else if (currentSection === 3) {
          currentSection = 5;
        }
        
      } else if (serviceSelected === 'owner') {
        if (currentSection === 1) {
          currentSection = 2; 
        } else if (currentSection === 2) {
          if(tokenIsSet){
            currentSection = 5;
          }else{
            currentSection = 3; 
          }
        }else if (currentSection === 3) {
          currentSection = 5;
        }
      }

      showSection(currentSection);
    }

  // Handle the back button click
  function back() {
    console.log( tokenIsSet);
    console.log( "Now:" + currentSection);
  if (serviceSelected === 'home') {
    if (currentSection === 5) {
      currentSection = tokenIsSet ? 2 : 3;
      console.log( currentSection);
    } else if (currentSection === 3) {
      currentSection = 2;
    } else if (currentSection === 2) {
      currentSection = 4; // special section
    } else if (currentSection === 4) {
      currentSection = 1;
    }
  } else if (serviceSelected === 'owner') {
    if (currentSection === 5) {
      currentSection = tokenIsSet ? 2 : 3;
    } else if (currentSection === 3) {
      currentSection = 2;
    } else if (currentSection === 2) {
      currentSection = 1;
    }
  }

  showSection(currentSection);
}



// input personal
// Select the necessary elements
const firstNameInput = document.getElementById('firstName');
const lastNameInput = document.getElementById('lastName');
const emailInput = document.getElementById('email');
const nextButton = document.getElementById('next-button-service-3');

// Function to check if all fields are filled
function validateInputs() {
    if (
        firstNameInput.value.trim() !== '' &&
        lastNameInput.value.trim() !== '' &&
        emailInput.value.trim() !== ''
    ) {
        nextButton.classList.remove('disabled'); // Enable the button
    } else {
        nextButton.classList.add('disabled'); // Keep the button disabled
    }
}

// Attach event listeners to the inputs to check on each change
[firstNameInput, lastNameInput, emailInput].forEach(input => {
    input.addEventListener('input', validateInputs);
});


    //google mapppp
    //let map;
let directionsService;
let directionsRenderer;
let destinationAutoComplete;
let sourceAddress = { lat: 45.435095, lng: -73.672204 };

function initMap() {
  let map = new google.maps.Map(document.getElementById('map'), {
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
  let nextButton4 = document.getElementById('next-button-service-4');

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
        nextButton4.classList.remove('disabled');
      } else {
        output.innerHTML = `<p>Outside the 20 km range for home service.</p>`;
        output.style.color = "#D9534F";
        nextButton4.classList.add('disabled');
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