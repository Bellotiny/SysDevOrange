<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'Views/nav.php';
include_once 'Views/bookingModal.php';
?>

  <!-- Modal for Welcome/Login/Register -->
  <div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="authModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="authModalTitle"><?= WELCOME_TO ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="welcomeMessage">
            <?= WELCOME_MESSAGE ?>
            <span class="fw-bold"><?= WELCOME_MESSAGE_2 ?></span>
            <div class="d-flex justify-content-center gap-4 my-5">
              <a href="#" class="btn btn-primary w-50" id="showLogin"><?= LOGIN ?></a>
              <a href="#" class="btn btn-primary w-50" id="showRegister"><?= REGISTER ?></a>
              <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/home" role="button"><?= HOME ?></a>
            </div>
          </div>

          <!-- Login Form (Initially Hidden) -->
          <form id="loginForm" method="POST" action="<?=BASE_PATH?>/account/login" style="display: none;">
            <div class="form-group">
                <label for="email"><?= EMAIL ?></label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                <label for="password"><?= PASSWORD ?></label>
                <input type="password" class="form-control" id="password" name="password" required>
                <p class="mt-3"><a href="#" id="showForgotForm"><?= FORGOT_PASS ?></a></p>
              </div>
            <button type="submit" class="btn btn-primary mt-3">Login</button>
            <button type="button" class="btn btn-secondary mt-3" id="goBackFromLogin"><?= GO_BACK ?></button>
            <p class="mt-3"><?= DONT_HAVE_ACCOUNT ?><a href="#" id="showRegisterForm"><?= REGISTER_HERE ?></a></p>
          </form>
         
          <!-- Forgot Form (Initially Hidden) -->
          <form id="forgotForm" method="POST" action="#" style="display: none;">
              <div class="form-group">
                <label for="email"><?= EMAIL ?></label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
            <button type="submit" class="btn btn-primary mt-3"><?= SEND_EMAIL ?></button>
            <button type="button" class="btn btn-secondary mt-3" id="goBackFromForgot"><?= GO_BACK ?></button>
            <p class="mt-3"> <?= ALREADY_HAVE_ACCOUNT ?><a href="#" id="showLoginForm"><?= LOGIN_HERE ?></a></p>
          </form>
          
          <!-- Register Form (Initially Hidden) -->
          <form id="registerForm" method="POST" action="<?=BASE_PATH?>/account/register" style="display: none;">
            <?php include_once 'Views/registerForm.php'; ?>
            <button type="submit" class="btn btn-primary mt-3"><?= REGISTER ?></button>
            <button type="button" class="btn btn-secondary mt-3" id="goBackFromRegister"><?= GO_BACK ?></button>
            <p class="mt-3"> <?= ALREADY_HAVE_ACCOUNT ?> <a href="#" id="showLoginFormRegister"><?= LOGIN_HERE ?></a></p>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Home Section -->
  <div id="homeImage" class=" slide-up">
    <div class="jimmyScript-fontstyle" id="overlay-text">Snook's  </div>
    <div class="silverFake-fontstyle" id="overlay-text2">Nail Nook</div>
  
  </div>

<!----welcome--->
<div class="container my-5 slide-up">
    <div class="row p-4 pb-0 pe-lg-0  align-items-center rounded-3 border shadow-lg green-background ">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-2 pb-5 mb-5 fw-bold amsterdamThree-fontstyle text-green text-shadow-pink slide-up"><?= WELCOME ?></h1>
        <p class="lead slide-up"> 
          <?= BUSINESS_INFO ?> 

        </p>
      
      </div>
      <div class="col-lg-5 p-3 p-lg-5 pt-lg-3 overflow-hidden">
        <img src="<?=BASE_PATH?>/Views/Images/about1.png" class="img-fluid rounded-lg-3 slide-up" alt="Welcome image" height="500" width="720"  >
      </div>
    </div>
  </div>

<!-----3 off canva--->

<div class=" my-5 py-3 bg-light canvaDiv ">
<div class=" slide-up">
  <h3 class="text-center text-muted pt-4"><?= NAIL_CARE_101 ?></h3>
</div>

<div class="row justify-content-center text-center my-5  ">
    <!-- First Collapsible Section -->
    
    <div class="col-lg-3 canvaDiv m-3 p-3 ">
        <img src="<?=BASE_PATH?>/Views/Images/pic1.jpg"
              class="img-fluid my-4 rounded  slide-up" 
              alt="Description of the image" 
              width="300" height="200" 
              style="object-fit: cover; width: 250px; height: 200px;">
        <p class=" slide-up"><?= NAIL_CARE_DO_DONT ?></p>
        <strong class="d-block mb-2 text-pink  slide-up "><?= MUST_READ ?></strong>
        <p>
            <a class="btn btn-secondary  slide-up" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCare" aria-controls="offcanvasBottom"><?= VIEW_DETAILS ?></a>
        </p>
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasCare" aria-labelledby="offcanvasBottomLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title " id="offcanvasBottomLabel"><?= NAIL_CARE_DO_DONT ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body small text-start mx-5 row">
            <div class="col">
              <h3 class=""><?= NAIL_CARE_DO ?></h3>
              <ul>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis "><?= KEEP_NAILS_CLEAN ?></strong> <?= KEEP_NAILS_CLEAN_2 ?></li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis "><?= MOISTURIZE ?></strong><?= MOISTURIZE_2 ?></li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis "><?= TRIM_REG ?></strong>  <?= TRIM_REG_2 ?></li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis "><?= FILE_GENTLY ?></strong>  <?= FILE_GENTLY_2 ?></li>
              </ul>
            </div>

            <div class="col">
              <h3 class=""> <?= NAIL_CARE_DONT ?></h3>
              <ul>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Don’t Use Nails as Tools:</strong> Avoid using nails for opening packages.</li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Don’t Ignore Issues:</strong> Consult a professional for nail problems.</li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Avoid Harsh Products:</strong>  Limit the use of acetone removers.</li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Don’t Overdo Polish:</strong>  Too many layers can weaken nails.</li>
              </ul>
            </div>
          </div>
        </div>

      
    </div>

    

    <!-- Second offcanvas Section -->

    <div class="col-lg-3 canvaDiv  m-3 p-3 ">
        <img src="<?=BASE_PATH?>/Views/Images/about4.png"
              class="img-fluid my-4 rounded  slide-up" 
              alt="Description of the image" 
              width="300" height="200" 
              style="object-fit: cover; width: 250px; height: 200px;">
        <p class=" slide-up"><?= IMPORTANCE_PROFESSIONAL_CARE ?></p>
        <strong class="d-block mb-2 text-pink  slide-up "><?= MUST_READ ?></strong>
        <p>
            <a class="btn btn-secondary slide-up" data-bs-toggle="offcanvas" data-bs-target="#offcanvasImportance" aria-controls="offcanvasBottom"><?= VIEW_DETAILS ?></a>
        </p>
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasImportance" aria-labelledby="offcanvasBottomLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasBottomLabel"><?= IMPORTANCE_PROFESSIONAL_CARE ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body small mx-5 ">
            <p class="text-large-offcanvas">
            <?= PROFESSIONAL_NAIL_CARE ?>
            </p>
          </div>
        </div>
      
    </div>

    

    <!-- Third offcanvas Section -->
    <div class="col-lg-3 canvaDiv m-3 p-3 ">
        <img src="<?=BASE_PATH?>/Views/Images/about3.png"
          class="img-fluid my-4 rounded  slide-up" 
          alt="Description of the image" 
          width="250" height="200" 
          style="object-fit: cover; width: 300px; height: 200px;">

        <p class=" slide-up"><?= BENEFIT_REG_MANICURE ?></p>
        <strong class="d-block mb-2 text-pink  slide-up "><?= MUST_READ ?></strong>
        <p>
            <a class="btn btn-secondary  slide-up" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBenefit" aria-controls="offcanvasBottom"><?= VIEW_DETAILS ?></a>
        </p>
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBenefit" aria-labelledby="offcanvasBottomLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasBottomLabel"><?= BASIC_MANICURE ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body small text-start mx-5 row">
            <div class="col">
              <ul>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis "><?= NAIL_BED_CARE ?></strong> <?=  NAIL_BED_CARE_2 ?></li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis "><?= BREAK_HARSH_TREATMENTS ?></strong> <?= BREAK_HARSH_TREATMENTS_2 ?> </li>
                
              </ul>
            </div>

            <div class="col">
              <ul>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis "><?= PROMOTE_HEALTHY_GROWTH ?></strong><?= PROMOTE_HEALTHY_GROWTH_2 ?></li>
                <br><br>
                <h5><strong class="d-inline mb-2 text-primary-emphasis "><?= TLC ?></strong></h5>
                
              </ul>
            </div>
          </div>
        </div>
      
    </div>

    <!-- fourth offcanvas Section -->
    <div class="col-lg-3 canvaDiv m-3 p-3 ">
        <img src="<?=BASE_PATH?>/Views/Images/about3.png"
          class="img-fluid my-4 rounded  slide-up" 
          alt="Description of the image" 
          width="250" height="200" 
          style="object-fit: cover; width: 300px; height: 200px;">

        <p class=" slide-up"><?= IMPORTANCE_REG_MANICURE ?></p>
        <strong class="d-block mb-2 text-pink  slide-up "><?= MUST_READ ?></strong>
        <p>
            <a class="btn btn-secondary  slide-up" data-bs-toggle="offcanvas" data-bs-target="#offcanvasReg" aria-controls="offcanvasBottom"><?= VIEW_DETAILS ?></a>
        </p>
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasReg" aria-labelledby="offcanvasBottomLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasBottomLabel"><?= IMPORTANCE_REG_MANICURE_2 ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body small text-start mx-5 row">
            <div class="col">
              <ul>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis "><?= HEALTHY_NAIL_GROWTH ?>  </strong>  <?= HEALTHY_NAIL_GROWTH_2 ?></li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis "><?= DAMAGE_PREV ?> </strong><?= DAMAGE_PREV_2 ?></li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis "> <?= HYDRATION_NOURISHMENT ?></strong><?= HYDRATION_NOURISHMENT_2 ?></li>
                
              </ul>
            </div>

            <div class="col">
              <ul>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis "><?= POLISHED_LOOK_FEEL ?>  </strong><?= POLISHED_LOOK_FEEL_2 ?>  </li>
                <br><br>
                <h5><strong class="d-inline mb-2 text-primary-emphasis "><?= REGULAR_MANICURES ?></strong></h5>
                
              </ul>
            </div>
          </div>
        </div>
      
    </div>


<?php include_once 'Views/footer.php'; ?>

</body>
</html>
