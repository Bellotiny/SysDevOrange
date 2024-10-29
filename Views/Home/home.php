<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>


<body>
  <?php include_once ROOT . '/Views/nav.php'; ?>

 
<!-- Modals -->
<!--modal for welcome-->
<div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Welcome to our nook!</h5>
       
      </div>
      <div class="modal-body">
      Hello and welcome! I am excited to have you here. Whether you’re a new or returning guest, we invite you to explore our services and enjoy a relaxing experience.
      <span class="fw-bold">Register now to experience exclusive features!</span>
      </div>
      <div class="container d-flex justify-content-center gap-4 my-5">
        <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=account" role="button">Login</a>
        <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=gallery" role="button">Register</a>
        <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=home" role="button">Home</a>

<body>
  <?php include_once ROOT . '/Views/nav.php'; ?>

  <!-- Modal -->
  <!-- Welcome/Login/Register Modal -->
  <div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="authModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="authModalTitle">Welcome to our nook!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Welcome Message -->
          <div id="welcomeMessage">
            Hello and welcome! I am excited to have you here. Whether you’re a new or returning guest, we invite you to explore our services and enjoy a relaxing experience.
            <span class="fw-bold">Register now to experience exclusive features!</span>
            <div class="d-flex justify-content-center gap-4 my-5">
              <a href="#" class="btn btn-primary w-50" id="showLogin">Login</a>
              <a href="#" class="btn btn-primary w-50" id="showRegister">Register</a>
              <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=home" role="button">Home</a>
            </div>
          </div>

          <!-- Login Form (Initially Hidden) -->
          <form id="loginForm" method="POST" action="index.php?controller=loginRegister&action=submit" style="display: none;">
            <div class="form-group">
              <label for="loginEmail">Email</label>
              <input type="email" class="form-control" id="loginEmail" name="email" required>
            </div>
            <div class="form-group">
              <label for="loginPassword">Password</label>
              <input type="password" class="form-control" id="loginPassword" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Login</button>
            <button type="button" class="btn btn-secondary mt-3" id="goBackFromLogin">Go Back</button>
            <p class="mt-3">Don't have an account? <a href="#" id="showRegisterForm">Register here</a></p>
          </form>

          <!-- Register Form (Initially Hidden) -->
          <form id="registerForm" method="POST" action="index.php?controller=loginRegister&action=submit" style="display: none;">
            <div class="form-group">
              <label for="fname">First Name</label>
              <input type="text" class="form-control" id="fname" name="fname" required>
            </div>
            <div class="form-group">
              <label for="lname">Last Name</label>
              <input type="text" class="form-control" id="lname" name="lname" required>
            </div>
            <div class="form-group">
              <label for="registerEmail">Email</label>
              <input type="email" class="form-control" id="registerEmail" name="email" required>
            </div>
            <div class="form-group">
              <label for="registerPassword">Password</label>
              <input type="password" class="form-control" id="registerPassword" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Register</button>
            <button type="button" class="btn btn-secondary mt-3" id="goBackFromRegister">Go Back</button>
            <p class="mt-3">Already have an account? <a href="#" id="showLoginForm">Login here</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>

 <!-- Modal for Booking -->
       <div class="modal fade" id="modalBookingWarning" tabindex="-1" role="dialog" aria-labelledby="modalBookingWarningTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalBookingWarningTitle">Booking Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <h4>Booking Rules:</h4>
                        <ul>
                            <li><strong>The client must pay <span style="color: #d9534f;">$10</span> upon booking</strong>, which will be deducted from the total payment.</li>
                            <li><strong>They must choose at least <span style="color: #d9534f;">one color</span>.</strong></li>
                            <li><strong>Home service is an option but available only <span style="color: #d9534f;">within a certain range</span>.</strong></li>
                            <li><strong>There are <span style="color: #d9534f;">cats</span> in the owner's place.</strong></li>

                        </ul>
                        <hr>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <strong>I read all the reminder</strong>
                        </label>
                    </div>
                    <div class="container d-flex justify-content-center gap-4 my-5">
                        <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=home" role="button">Cancel</a>
                        <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=book&action=bookOne" role="button">Confirm</a>

                    </div>
                </div>
            </div>
        </div>
<!---home-->

    <div id="homeImage"></div>
  <div id="homeImage">
    <div id="overlay-text">Snook's</div>
    <div id="overlay-text2">Nail Nook</div>
  </div>

  <main class="container">

        <div class="row featurette">
          <div class="col-md-7">
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In egestas nisl vitae tristique tincidunt. Nam a condimentum urna, vitae interdum urna. Donec dignissim tincidunt ipsum et semper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi iaculis nunc ante, id congue sapien imperdiet sit amet. Praesent ac neque rutrum velit lobortis iaculis iaculis sed lacus. Praesent dictum sagittis ultrices. Nullam vitae dui mattis, mollis tortor id, euismod ligula. Integer a ligula magna. In hac habitasse platea dictumst. Aliquam erat volutpat. Donec scelerisque metus est.</p>
          </div>
          <div class="col-md-5">
          <img src="<?php echo BASE_URL; ?>/Views/Images/about1.png" alt="Welcome image" class="img-fluid mx-auto" width="500" height="500">


            
          </div>
        </div>

      </main>

     
      <div class="row my-5 justify-content-center text-center bg-light p-5">
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
        </svg>
        <p>Nail Care Tips & Dos and Don'ts</p>
        <p>
          <a class="btn btn-secondary" data-toggle="collapse" href="#collapseTips" role="button" aria-expanded="false" aria-controls="collapseTips">View details »</a>
        </p>
        <div class="collapse" id="collapseTips">
          <div class="card card-body">
            Tips on how to take care of your nails, what to avoid, and recommended practices.
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
        </svg>
        <p>The Importance of Professional Care</p>
        <p>
          <a class="btn btn-secondary" data-toggle="collapse" href="#collapseProfessional" role="button" aria-expanded="false" aria-controls="collapseProfessional">View details »</a>
        </p>
        <div class="collapse" id="collapseProfessional">
          <div class="card card-body">
            Why professional nail care matters and the benefits of seeing a trained technician.
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
        </svg>
        <p>The Benefits of Regular Manicures</p>
        <p>
          <a class="btn btn-secondary" data-toggle="collapse" href="#collapseBenefits" role="button" aria-expanded="false" aria-controls="collapseBenefits">View details »</a>
        </p>
        <div class="collapse" id="collapseBenefits">
          <div class="card card-body">
            Advantages of maintaining regular manicures for nail health and appearance.
          </div>
        </div>
      </div>
    </div>

        <div class="container my-5">
          <div class="position-relative p-5 text-center text-muted bg-body border border-dashed rounded-5 div-background">
            <button type="button" class="position-absolute top-0 end-0 p-3 m-3 btn-close bg-secondary bg-opacity-10 rounded-pill" aria-label="Close"></button>
            <svg class="bi mt-5 mb-3" width="48" height="48"><use xlink:href="#check2-circle"></use></svg>
            <h3 class="text-body-emphasis">Safe, Clean, and Beautiful Nails</h3>
            <p class="col-lg-6 mx-auto mb-4">
              This faded back jumbotron is useful for placeholder content. It's also a great way to add a bit of context to a page or section when no content is available and to encourage visitors to take a specific action.
            </p>
            <button class="btn btn-primary px-5 mb-5" type="button">
              Call to action
            </button>
          </div>
        </div>
  </main>

  <script>
    // Bootstrap modal
    const modal = new bootstrap.Modal(document.getElementById('welcomeModal'));

    // Show the modal only once per session
    if (!sessionStorage.getItem('modalShown')) {
      modal.show();
      sessionStorage.setItem('modalShown', 'true');
    }

    // JavaScript to toggle between login, register forms, and welcome message
    document.addEventListener("DOMContentLoaded", function() {
      const welcomeMessage = document.getElementById("welcomeMessage");
      const loginForm = document.getElementById("loginForm");
      const registerForm = document.getElementById("registerForm");
      const authModalTitle = document.getElementById("authModalTitle");

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
</body>

  <!----FOOTER--->
        <?php include_once ROOT . '/Views/footer.php'; ?>

    </body>

