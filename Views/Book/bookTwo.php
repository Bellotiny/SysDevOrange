<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once ROOT . '/Views/head.php';
?>

<body>
  <?php include_once ROOT . '/Views/nav.php'; ?>

  <main>
    <div class="container">
<!---color---->
    <h3 class="mt-4">Pick your color:</h3>

    <div class="accordion" id="accordionExample" >
      <div class="accordion-item" id="colorGroup1">
        <h3 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Color 1:<span id="selectedColor1">Classic Red</span>
          </button>
        </h3>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div class="row text-center">
              <!----here are the colors--->
              <div class="col-lg-2 mb-3 color-item selected">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color1', 'Classic Red', 'colorGroup1')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 0, 0)"></rect></svg>
                  <h5 class="fw-normal">Classic Red</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color1', 'Baby Pink', 'colorGroup1')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 182, 193)"></rect></svg>
                  <h5 class="fw-normal">Baby Pink</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color1', 'Nude Beige', 'colorGroup1')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(222, 184, 135)"></rect></svg>
                  <h5 class="fw-normal">Nude Beige</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color1', 'Peach', 'colorGroup1')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 218, 185)"></rect></svg>
                  <h5 class="fw-normal">Peach</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color1', 'Lavender', 'colorGroup1')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(230, 230, 250)"></rect></svg>
                  <h5 class="fw-normal">Lavender</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color1', 'Mint Green', 'colorGroup1')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(152, 251, 152)"></rect></svg>
                  <h5 class="fw-normal">Mint Green</h5>
              </div>


              <!-----more colors--->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color1', 'Sky Blue', 'colorGroup1')"  width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(135, 206, 235)"></rect></svg>
                  <h5 class="fw-normal">Sky Blue</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color1', 'Deep Purple', 'colorGroup1')"  width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(75, 0, 130)"></rect></svg>
                  <h5 class="fw-normal">Deep Purple</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color1', 'Bold Orange', 'colorGroup1')"  width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 165, 0)"></rect></svg>
                  <h5 class="fw-normal">Bold Orange</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color1', 'Sunny Yellow', 'colorGroup1')"  width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 223, 0)"></rect></svg>
                  <h5 class="fw-normal">Sunny Yellow</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color1', 'Berry Pink', 'colorGroup1')"  width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(199, 21, 133)"></rect></svg>
                  <h5 class="fw-normal">Berry Pink</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color1', 'Coral', 'colorGroup1')"  width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 127, 80)"></rect></svg>
                  <h5 class="fw-normal">Coral</h5>
              </div>
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
          <div class="accordion-body">
          <div class="row text-center">
              <!----here are the colors--->
              <div class="col-lg-2 mb-3 color-item selected">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color2', 'None', 'colorGroup2')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill=""></rect></svg>
                  <h5 class="fw-normal">None</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color2', 'Baby Pink', 'colorGroup2')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 182, 193)"></rect></svg>
                  <h5 class="fw-normal">Baby Pink</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color2', 'Nude Beige', 'colorGroup2')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(222, 184, 135)"></rect></svg>
                  <h5 class="fw-normal">Nude Beige</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color2', 'Peach', 'colorGroup2')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 218, 185)"></rect></svg>
                  <h5 class="fw-normal">Peach</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color2', 'Lavender', 'colorGroup2')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(230, 230, 250)"></rect></svg>
                  <h5 class="fw-normal">Lavender</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color2', 'Mint Green', 'colorGroup2')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(152, 251, 152)"></rect></svg>
                  <h5 class="fw-normal">Mint Green</h5>
              </div>


              <!-----more colors--->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color2', 'Sky Blue', 'colorGroup2')"  width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(135, 206, 235)"></rect></svg>
                  <h5 class="fw-normal">Sky Blue</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color2', 'Deep Purple', 'colorGroup2')"  width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(75, 0, 130)"></rect></svg>
                  <h5 class="fw-normal">Deep Purple</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color2', 'Bold Orange', 'colorGroup2')"  width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 165, 0)"></rect></svg>
                  <h5 class="fw-normal">Bold Orange</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color2', 'Sunny Yellow', 'colorGroup2')"  width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 223, 0)"></rect></svg>
                  <h5 class="fw-normal">Sunny Yellow</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color2', 'Berry Pink', 'colorGroup2')"  width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(199, 21, 133)"></rect></svg>
                  <h5 class="fw-normal">Berry Pink</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color2', 'Coral', 'colorGroup2')"  width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 127, 80)"></rect></svg>
                  <h5 class="fw-normal">Coral</h5>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="accordion-item" id="colorGroup3">
        <h3 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Color 3:<span id="selectedColor3">None</span>
          </button>
        </h3>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="accordion-body">
          <div class="row text-center">
              <!----here are the colors--->
              <div class="col-lg-2 mb-3 color-item selected" >
                  <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color3', 'None', 'colorGroup3')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill=""></rect></svg>
                  <h5 class="fw-normal">None</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item"  >
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Baby Pink', 'colorGroup3')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 182, 193)"></rect></svg>
                  <h5 class="fw-normal">Baby Pink</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Nude Beige', 'colorGroup3')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(222, 184, 135)"></rect></svg>
                  <h5 class="fw-normal">Nude Beige</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Peach', 'colorGroup3')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 218, 185)"></rect></svg>
                  <h5 class="fw-normal">Peach</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Lavender', 'colorGroup3')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(230, 230, 250)"></rect></svg>
                  <h5 class="fw-normal">Lavender</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Mint Green', 'colorGroup3')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(152, 251, 152)"></rect></svg>
                  <h5 class="fw-normal">Mint Green</h5>
              </div>


              <!-----more colors--->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Sky Blue', 'colorGroup3')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(135, 206, 235)"></rect></svg>
                  <h5 class="fw-normal">Sky Blue</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Deep Purple', 'colorGroup3')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(75, 0, 130)"></rect></svg>
                  <h5 class="fw-normal">Deep Purple</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'bold Orange', 'colorGroup3')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 165, 0)"></rect></svg>
                  <h5 class="fw-normal">Bold Orange</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Sunny Yellow', 'colorGroup3')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 223, 0)"></rect></svg>
                  <h5 class="fw-normal">Sunny Yellow</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Berry Pink', 'colorGroup3')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(199, 21, 133)"></rect></svg>
                  <h5 class="fw-normal">Berry Pink</h5>
              </div><!-- /.col-lg-2 -->
              <div class="col-lg-2 mb-3 color-item">
                  <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Coral', 'colorGroup3')" width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 127, 80)"></rect></svg>
                  <h5 class="fw-normal">Coral</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 

 
 
<!--Date and time-->
  <div class=" my-5">
      <h3>Pick your time and date:</h3>

      <div class="d-flex justify-content-around my-4">
          <!-- Date Selection -->
          <div class="form-group">
            <label for="availableDates">Available Dates</label>
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
            <label for="availableTimes">Available Times</label>
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
  </div>

  

    <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
      <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=book&action=bookOne" role="button">Back</a>
      <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=book&action=bookThree" role="button">Next</a>
    
    </div>

    </div>
  </main>

 
  <!--progress-->
  <div class="progress " role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
    <div class="progress-bar" style="width: 25%">25%</div>
  </div>

  <script>
   function selectColor(colorGroup, colorName, groupId) {
    // Get the specific color group container
    const groupContainer = document.getElementById(groupId);

        // Remove 'selected' class from all color items in the group
        groupContainer.querySelectorAll('.color-item').forEach(el => {
            el.classList.remove('selected');
        });

        // Find the specific color item to select
        const selectedItem = Array.from(groupContainer.querySelectorAll('.color-item')).find(item => {
            return item.querySelector('h5').textContent === colorName;
        });

        // Check if the selected item exists and add the 'selected' class
      
            selectedItem.classList.add('selected'); // Add the 'selected' class to the clicked item
           
            const selectedColorElement = document.getElementById(`selected${colorGroup}`);
            selectedColorElement.textContent = colorName;
      
    
   }
  

  </script>

 

</body>
</html>
