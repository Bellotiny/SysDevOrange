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
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. In egestas nisl vitae tristique 
          tincidunt. Nam a condimentum urna, vitae interdum urna. Donec dignissim tincidunt ipsum et semper. Vestibulum ante ipsum primis in 
          faucibus orci luctus et ultrices posuere cubilia curae; 

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
              <h3 class=""><?= NAIL_CARE_DO ?></h3>
              <ul>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Keep Nails Clean:</strong> Wash hands regularly and dry thoroughly.</li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Moisturize:</strong> Apply hand cream or cuticle oil to keep nails hydrated.</li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Trime Regulary:</strong>  Use sharp tools to maintain a manageable length.</li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">File gently</strong>  Smooth edges by filing in one direction.</li>
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
            Professional nail care provides more than just aesthetic benefits; it helps maintain nail 
            health, prevent infections, and address underlying issues that might not be visible to the 
            untrained eye. Nail technicians are trained to safely handle tools, recognize potential nail and 
            skin issues, and recommend treatments tailored to individual needs, promoting both hygiene and long-term wellness.
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

<script>
    const modal = new bootstrap.Modal(document.getElementById('welcomeModal'));
    const slideElements = document.querySelectorAll('.slide-up');

  // Show the modal only once per session
  if (!sessionStorage.getItem('modalShown')) {
    modal.show();
    sessionStorage.setItem('modalShown', 'true');
  }

  const checkSlide = () => {
        slideElements.forEach((element) => {
            const rect = element.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom >= 0) {
                element.classList.add('active'); // Add active class when in viewport
            } else {
                element.classList.remove('active'); // Remove active class if out of viewport
            }
        });
    };

  // JavaScript to toggle between login, register forms, and welcome message
  document.addEventListener("DOMContentLoaded", function() {
    const welcomeMessage = document.getElementById("welcomeMessage");
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("registerForm");
    const forgotForm = document.getElementById("forgotForm");
    const authModalTitle = document.getElementById("authModalTitle");

    //
    window.addEventListener('scroll', checkSlide);
    checkSlide(); 

    

    // Show login form
    document.getElementById("showLogin").addEventListener("click", function(event) {
      event.preventDefault();
      welcomeMessage.style.display = "none";
      registerForm.style.display = "none";
      loginForm.style.display = "block";
      authModalTitle.textContent = "<?= LOGIN ?>";
    });

    // Show forgot form
    document.getElementById("showForgotForm").addEventListener("click", function(event) {
      event.preventDefault();
      welcomeMessage.style.display = "none";
      registerForm.style.display = "none";
      loginForm.style.display = "none";
      forgotForm.style.display = "block";
      authModalTitle.textContent = "<?= FORGOT_PASS ?>";
    });
    // Show register form
    document.getElementById("showRegister").addEventListener("click", function(event) {
      event.preventDefault();
      welcomeMessage.style.display = "none";
      loginForm.style.display = "none";
      registerForm.style.display = "block";
      forgotForm.style.display = "none";
      authModalTitle.textContent = "<?= REGISTER ?>";
    });

    // Show register form from within login form
    document.getElementById("showRegisterForm").addEventListener("click", function(event) {
      event.preventDefault();
      loginForm.style.display = "none";
      registerForm.style.display = "block";
      forgotForm.style.display = "none";
      authModalTitle.textContent = "<?= REGISTER ?>";
    });

    // Show login form from within register form
    document.getElementById("showLoginFormRegister").addEventListener("click", function(event) {
      event.preventDefault();
      registerForm.style.display = "none";
      loginForm.style.display = "block";
      forgotForm.style.display = "none";
      authModalTitle.textContent = "<?= LOGIN ?>";
    });

        // Show login form from within forgot form
        document.getElementById("showLoginForm").addEventListener("click", function(event) {
      event.preventDefault();
      registerForm.style.display = "none";
      loginForm.style.display = "block";
      forgotForm.style.display = "none";
      authModalTitle.textContent = "<?= LOGIN ?>";
    });

    // Show forgot form from within login form
    document.getElementById("showForgotForm").addEventListener("click", function(event) {
      event.preventDefault();
      registerForm.style.display = "none";
      loginForm.style.display = "none";
      forgotForm.style.display = "block";
      authModalTitle.textContent = "<?= FORGOT_PASS ?>";
    });

    // Go back to welcome message from login form
    document.getElementById("goBackFromLogin").addEventListener("click", function() {
      loginForm.style.display = "none";
      welcomeMessage.style.display = "block";
      authModalTitle.textContent = "<?= WELCOME_TO ?>";
    });

    // Go back to welcome message from register form
    document.getElementById("goBackFromRegister").addEventListener("click", function() {
      registerForm.style.display = "none";
      welcomeMessage.style.display = "block";
      authModalTitle.textContent = "<?= WELCOME_TO ?>";
    });
  });
    // Go back to login form from forgot form
    document.getElementById("goBackFromForgot").addEventListener("click", function() {
      forgotForm.style.display = "none";
      loginForm.style.display = "block";
      authModalTitle.textContent = "<?= LOGIN ?>";
    });  
  </script>
    <script>
   let modalElement = document.getElementById('modalBookingWarning');
   let mobileNav =  document.getElementById('navbarMenu');
   if (modalElement.classList.contains("open")) {
               // Close the menu
        mobileNav.style.opacity = "0";
        mobileNav.style.visibility = "hidden";
        mobileNav.classList.remove('show');
        body.classList.remove('no-scroll');
   }
   </script>
  <?php include_once 'Views/footer.php'; ?>

</body>
</html>
