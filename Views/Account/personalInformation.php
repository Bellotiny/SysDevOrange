<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
?>

    <body class="">
    <?php include_once 'Views/nav.php'; ?>
    
    
      <main class="d-flex flex-grow-1  max-vh-100 " id="account-Main">
         <!--Sidebar--->
          <div class="d-flex flex-column flex-shrink-0 p-3 bg-light slide-up " style="width: 280px; height: 100vh;">
          <a href="<?=BASE_PATH?>/account" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Account</span>
          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
            <a href="<?=BASE_PATH?>/account/personalInformation" class="nav-link active" aria-current="page">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                Personal Information
              </a>
            </li>
            <li>
            <a href="<?=BASE_PATH?>/account/bookingHistory" class="nav-link link-dark" id="loadBookingHistory">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Booking History
              </a>
            </li>

            <li>
            <a href="<?=BASE_PATH?>/account/schedule" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                Schedule
              </a>
            </li>
            <li>
            <a href="<?=BASE_PATH?>/account/inventory" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                Inventory
              </a>
            </li>
            <li>
            <a href="<?=BASE_PATH?>/account/bookingList" class="nav-link link-dark">
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
              <li><a class="dropdown-item" href="#">Account settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?=BASE_PATH?>/account/logout">Sign out</a></li>
            </ul>
          </div>
        </div>

        <!---screen for sidebar--->
        <div class="sideScreen">
            <p><?= $data[0]->firstName . " " . $data[0]->lastName ?></p>
          <!---default content will be the Personal info-->
          <!--content is load here-->
          <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
            <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/account/login" role="button">Login</a>
            <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/account/register" role="button">Register</a>
          
          </div>
          
         
      
       <!---pagination--->
      <div class="d-flex justify-content-center my-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
      </div>
          

       
      </main>
     

      </div>
      
    </body>
</html>