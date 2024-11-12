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
          <h5 class="modal-title" id="authModalTitle">Welcome to our nook!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="welcomeMessage">
            Hello and welcome! I am excited to have you here. Whether you’re a new or returning guest, we invite you to explore our services and enjoy a relaxing experience.
            <span class="fw-bold">Register now to experience exclusive features!</span>
            <div class="d-flex justify-content-center gap-4 my-5">
              <a href="#" class="btn btn-primary w-50" id="showLogin">Login</a>
              <a href="#" class="btn btn-primary w-50" id="showRegister">Register</a>
              <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/home" role="button">Home</a>
            </div>
          </div>

          <!-- Login Form (Initially Hidden) -->
          <form id="loginForm" method="POST" action="<?=BASE_PATH?>/account/login" style="display: none;">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>

            <button type="submit" class="btn btn-primary mt-3">Login</button>
            <button type="button" class="btn btn-secondary mt-3" id="goBackFromLogin">Go Back</button>
            <p class="mt-3">Don't have an account? <a href="#" id="showRegisterForm">Register here</a></p>
          </form>

          <!-- Register Form (Initially Hidden) -->
          <form id="registerForm" method="POST" action="<?=BASE_PATH?>/account/register" style="display: none;">
            <?php include_once 'Views/registerForm.php'; ?>
            <button type="submit" class="btn btn-primary mt-3">Register</button>
            <button type="button" class="btn btn-secondary mt-3" id="goBackFromRegister">Go Back</button>
            <p class="mt-3">Already have an account? <a href="#" id="showLoginForm">Login here</a></p>
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
        <h1 class="display-2 pb-5 mb-5 fw-bold amsterdamThree-fontstyle text-green text-shadow-pink slide-up">Welcome</h1>
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
  <h3 class="text-center text-muted pt-4">Nail Care 101: Tips, Benefits, and Professional Insight</h3>
</div>

<div class="row justify-content-center text-center my-5  ">
    <!-- First Collapsible Section -->
    
    <div class="col-lg-3 canvaDiv m-3 p-3 ">
        <img src="<?=BASE_PATH?>/Views/Images/pic1.jpg"
              class="img-fluid my-4 rounded  slide-up" 
              alt="Description of the image" 
              width="300" height="200" 
              style="object-fit: cover; width: 250px; height: 200px;">
        <p class=" slide-up">Nail Care Tips & Dos and Don'ts</p>
        <strong class="d-block mb-2 text-pink  slide-up ">Must Read</strong>
        <p>
            <a class="btn btn-secondary  slide-up" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCare" aria-controls="offcanvasBottom">View details »</a>
        </p>
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasCare" aria-labelledby="offcanvasBottomLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title " id="offcanvasBottomLabel">Nail Care Tips Dos and Don'ts</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body small text-start mx-5 row">
            <div class="col">
              <h3 class="">Nail Care (Dos)</h3>
              <ul>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Keep Nails Clean:</strong> Wash hands regularly and dry thoroughly.</li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Moisturize:</strong> Apply hand cream or cuticle oil to keep nails hydrated.</li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">Trime Regulary:</strong>  Use sharp tools to maintain a manageable length.</li>
                <li class="text-large-offcanvas"><strong class="d-inline mb-2 text-primary-emphasis ">File gently</strong>  Smooth edges by filing in one direction.</li>
              </ul>
            </div>

            <div class="col">
              <h3 class=""> Nail Care (Don'ts)</h3>
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
        <p class=" slide-up">Importance of Professional Care</p>
        <strong class="d-block mb-2 text-pink  slide-up ">Must Read</strong>
        <p>
            <a class="btn btn-secondary slide-up" data-bs-toggle="offcanvas" data-bs-target="#offcanvasImportance" aria-controls="offcanvasBottom">View details »</a>
        </p>
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasImportance" aria-labelledby="offcanvasBottomLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasBottomLabel">Importance of Professional Care</h5>
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

        <p class=" slide-up">Benefit of Regular Manicure</p>
        <strong class="d-block mb-2 text-pink  slide-up ">Must Read</strong>
        <p>
            <a class="btn btn-secondary  slide-up" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBenefit" aria-controls="offcanvasBottom">View details »</a>
        </p>
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBenefit" aria-labelledby="offcanvasBottomLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasBottomLabel">Benefit of Regular Manicure</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body smalls">
            <p class="text-large-offcanvas">
            Regular manicures keep nails strong and healthy by preventing breakage, promoting circulation, and 
            reducing the risk of infections. They also maintain cuticle health, enhance hand appearance, and 
            provide a relaxing, rejuvenating experience, contributing to overall hand and nail wellness.
            </p>
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
      authModalTitle.textContent = "Login";
    });

    // Show register form
    document.getElementById("showRegister").addEventListener("click", function(event) {
      event.preventDefault();
      welcomeMessage.style.display = "none";
      loginForm.style.display = "none";
      registerForm.style.display = "block";
      authModalTitle.textContent = "Register";
    });

    // Show register form from within login form
    document.getElementById("showRegisterForm").addEventListener("click", function(event) {
      event.preventDefault();
      loginForm.style.display = "none";
      registerForm.style.display = "block";
      authModalTitle.textContent = "Register";
    });

    // Show login form from within register form
    document.getElementById("showLoginForm").addEventListener("click", function(event) {
      event.preventDefault();
      registerForm.style.display = "none";
      loginForm.style.display = "block";
      authModalTitle.textContent = "Login";
    });

    // Go back to welcome message from login form
    document.getElementById("goBackFromLogin").addEventListener("click", function() {
      loginForm.style.display = "none";
      welcomeMessage.style.display = "block";
      authModalTitle.textContent = "Welcome to our nook!";
    });

    // Go back to welcome message from register form
    document.getElementById("goBackFromRegister").addEventListener("click", function() {
      registerForm.style.display = "none";
      welcomeMessage.style.display = "block";
      authModalTitle.textContent = "Welcome to our nook!";
    });
  });
  </script>
  
  <?php include_once 'Views/footer.php'; ?>

</body>
</html>
