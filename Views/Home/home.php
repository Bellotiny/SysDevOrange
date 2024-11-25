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
    <div id="overlay-text">Snook's</div>
    <div id="overlay-text2">Nail Nook</div>
  </div>

<!----welcome--->
<div class="container my-5 slide-up">
    <div class="row p-4 pb-0 pe-lg-0  align-items-center rounded-3 border shadow-lg green-background ">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-2 pb-5 mb-5 fw-bold amsterdamThree-fontstyle text-green text-shadow-pink slide-up"><?= WELCOME ?></h1>
        <p class="lead slide-up"> 
        You’ve just stepped into a cozy corner of affordable nail care, sprinkled with a whole lot of cute flair! 🌸 <br><br>
        I can’t wait to get you scheduled for your next self-care day—because you deserve to feel fabulous! ✨<br><br>
        Specialized in GelX manicures.<br>
        </p>
      
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
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

              <ul>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Use a Glass Nail File:</strong> Glass files are your best friend! They gently remove length while smoothing your edges to prevent splits and breaks. Be sure to file in the same direction to keep your nails strong and snag-free.</li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Hydrate with Cuticle Oil:</strong> After a shower or during your daily skincare routine, make sure to apply cuticle oil to your nail beds. This helps replenish moisture that’s lost from natural oils being washed away, keeping your nails nourished and hydrated.</li>
                
              </ul>
            </div>

            <div class="col">
          
              <ul>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Base & Top Coat Protection: </strong> Whenever possible, use a good-quality base and top coat on your natural nails. This extra layer of protection helps your nails stay strong and shielded from everyday bumps and bangs. After applying the base and top coat to clean nails, be sure to follow up with cuticle oil to keep everything moisturized and healthy.</li>
                <br>
                <h5><strong class="d-inline mb-2 text-primary-emphasis ">Taking these steps will keep your nails in tip-top shape—ready for anything! 🌸</strong></h5>
                
                
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
            <h5 class="offcanvas-title" id="offcanvasBottomLabel">While at-home care is great, nothing beats the benefits of professional nail care! Here’s why:</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body small text-start mx-5 row">
            <div class="col">
              <ul>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Expert Attention: </strong>  A professional can assess the health of your nails and provide the right treatments tailored to your needs. Whether it’s a manicure, or a restorative treatment, experts know how to keep your nails in their best shape!</li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis "> Long-Lasting Results:</strong>Professional-grade products and techniques ensure your nails stay strong, shiny, and stunning longer than DIY methods.</li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">  Prevention & Care:</strong>Nail techs can spot potential issues early, like nail damage, and provide solutions before they become bigger problems.</li>
                
              </ul>
            </div>

            <div class="col">
              <ul>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis "> Relaxation & Self-Care: </strong> Nail appointments aren’t just about nails—they’re a time to relax, unwind, and give yourself the pampering you deserve.</li>
                <br><br>
                <h5><strong class="d-inline mb-2 text-primary-emphasis ">Professional nail care gives your nails the strength, protection, and attention they need to thrive, all while you enjoy a little self-care moment! 🌸</strong></h5>
                
              </ul>
            </div>
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
            <h5 class="offcanvas-title" id="offcanvasBottomLabel">A basic manicure  isn’t just about looking good—it’s essential for keeping your nails healthy! Here’s why:</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body small text-start mx-5 row">
            <div class="col">
              <ul>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Nail Bed Care:</strong> Keeping your nail beds abrasion-free and hydrated helps maintain their natural strength.</li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Break from Harsh Treatments:</strong> If you’ve been using acrylics or other nail enhancements, it’s important to give your nails a break. Let them breathe and recover to avoid long-term damage.</li>
                
              </ul>
            </div>

            <div class="col">
              <ul>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Promote Healthy Growth:</strong> A clean cuticle area, along with nourishing oils, will keep your nails hydrated and encourage strong, healthy growth.</li>
                <br><br>
                <h5><strong class="d-inline mb-2 text-primary-emphasis ">Treat your nails to a little TLC—they’ll thank you later! 💖</strong></h5>
                
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

        <p class=" slide-up">The Importance of Regular Manicures 💅✨</p>
        <strong class="d-block mb-2 text-pink  slide-up "><?= MUST_READ ?></strong>
        <p>
            <a class="btn btn-secondary  slide-up" data-bs-toggle="offcanvas" data-bs-target="#offcanvasReg" aria-controls="offcanvasBottom"><?= VIEW_DETAILS ?></a>
        </p>
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasReg" aria-labelledby="offcanvasBottomLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasBottomLabel">Regular manicures aren’t just a treat—they’re an essential part of keeping your nails healthy and beautiful! Here’s why staying consistent matters:</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body small text-start mx-5 row">
            <div class="col">
              <ul>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Healthy Nail Growth:  </strong>  Regular manicures keep your cuticles clean and your nails trimmed, promoting strong and healthy growth.</li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Damage Prevention: </strong>Frequent upkeep helps prevent issues like hangnails, splitting, and breakage. Catching small problems early can stop bigger ones from developing!</li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">  Hydration & Nourishment:</strong>Manicures include moisturizing treatments that keep your nail beds and cuticles hydrated, reducing brittleness and dryness.</li>
                
              </ul>
            </div>

            <div class="col">
              <ul>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Polished Look, Polished Feel:  </strong>Consistent care means your hands always look and feel amazing—perfect for boosting confidence and self-care!</li>
                <br><br>
                <h5><strong class="d-inline mb-2 text-primary-emphasis ">Regular manicures keep your nails in top shape, ensuring they’re strong, healthy, and always ready to shine! 🌟</strong></h5>
                
              </ul>
            </div>
          </div>
        </div>
      
    </div>
   
</div>

</div>




  
  <?php include_once 'Views/footer.php'; ?>

</body>
</html>
