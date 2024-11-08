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
        <h3>Base Service</h3>
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

         <!-- Section 1 Design Service -->
         <h3>Design Service:</h3>
         <div class="d-flex justify-content-around " > 
            <div class="list-group flex-row w-100"> 
                <label class="list-group-item d-flex gap-2 flex-fill  p-4 canvaSans"> 
                    <input class="form-check-input flex-shrink-0" type="checkbox" value="" >
                    <span>
                        Nail Art <small class=" text-body-secondary">(per nail)</small>
                    </span>
                    <div class="mb-1 d-block  text-success">5 CAD</div>
                </label>
                <label class="list-group-item d-flex gap-2 flex-fill  p-4 canvaSans">
                    <input class="form-check-input flex-shrink-0" type="checkbox" value="">
                    <span>
                        French tips <small class=" text-body-secondary">(plus the preferred base )</small>
                    </span>
                    <div class="mb-1 d-block  text-success">5 CAD</div>
                </label>
            </div>
        </div>

         <!-- Section 1 Additional Service -->
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
              <div class="accordion-body slide-up">
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
              <div class="accordion-body slide-up">
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
                      <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor('Color3', 'Bold Orange', 'colorGroup3')"  width="30" height="30" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="RGB(255, 165, 0)"></rect></svg>
                      <h5 class="fw-normal">Bold Orange</h5>
                  </div>
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

        <!-- Section 2 Date and time -->
        <h3>Pick your time and date:</h3>
        <div class="d-flex justify-content-around my-4 slide-up">

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

        <div class="container my-2">
          <div class="p-5 text-center green-background rounded-3">
            <h1 class="text-body-emphasis">Enter your address to verfiy</h1>
            <p class="lead">
              Take note: Home service is only available  <code>20 km </code> from the owner's place.
              
              <div id="output">
                Janna

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

      // Check if within 20 km range
      if (distanceInKm <= 20) {
        output.innerHTML += `<p>Within 20 km range for home service.</p>`;
      } else {
        output.innerHTML += `<p>Outside the 20 km range for home service.</p>`;
        output.style.color = "#D9534F";
      }

    } else {
      output.innerHTML = `<h3>Location not found</h3>`;
      output.style.color = "#D9534F";
    }
  });
}

</script>

</body>
</html>