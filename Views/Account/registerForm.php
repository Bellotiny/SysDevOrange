<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);


?>

   
    <?php include_once ROOT . '/Views/nav.php'; ?>
    
      <main class="d-flex" id="account-Main">
         <!--Sidebar--->
         <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: 100vh;">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Account</span>
          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <a href="#" class="nav-link active" aria-current="page">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                Personal Information
              </a>
            </li>
            <li>
              <a href="#" class="nav-link link-dark" id="loadBookingHistory">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Booking History
              </a>
            </li>

            <li>
              <a href="#" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                Schedule
              </a>
            </li>
            <li>
              <a href="#" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                Inventory
              </a>
            </li>
            <li>
              <a href="#" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                Booking list
              </a>
            </li>
          </ul>
          <hr>
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
              <li><a class="dropdown-item" href="#">Edit Profile</a></li>
              <li><a class="dropdown-item" href="#">Delete Account</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
          </div>
        </div>

        <!---screen for sidebar--->
        <div class="sideScreen">
          <!---default content will be the Personal info-->
          <!--content is load here-->
         <div class="container">
         <form id="registerForm" method="POST" action="index.php?controller=loginRegister&action=submit">
            <div class="form-group py-2">
              <label for="fname">First Name</label>
              <input type="text" class="form-control" id="fname" name="fname" required>
            </div>
            <div class="form-group py-2">
              <label for="lname">Last Name</label>
              <input type="text" class="form-control" id="lname" name="lname" required>
            </div>
            <div class="form-group py-2">
              <label for="birthday">Birthday:</label>
              <input type="date" class="form-control"  id="birthday" name="birthday" >
            </div>
            <div class="form-group py-2">
              <label for="registerEmail">Email</label>
              <input type="email" class="form-control" id="registerEmail" name="email" required>
            </div>
            <div class="form-group py-2">
              <label for="registerPassword">Password</label>
              <input type="password" class="form-control" id="registerPassword" name="password" required>
            </div>
            <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
              <a class="btn btn-primary mt-3" href="<?php echo BASE_URL; ?>/index.php?controller=account&action=loginForm" role="button">Register</a>
              <a class="btn btn-secondary mt-3" href="<?php echo BASE_URL; ?>/index.php?controller=account&action=accountPersonalInformation" role="button">Go Back</a> 
            </div>
           
            <p class="mt-3">Already have an account? <a href="<?php echo BASE_URL; ?>/index.php?controller=account&action=loginForm" id="showLoginForm">Login here</a></p>
          </form> 
         </div>
          
         
          

        </div>
        
      </main>

      <script>

  


      </script>


      <?php include_once ROOT . '/Views/footer.php'; ?>
    </body>
</html>