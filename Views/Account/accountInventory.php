<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
?>

    <body>
    <?php include_once 'Views/nav.php'; ?>
    
      <main class="d-flex" id="account-Main">
         <!--Sidebar--->
         <div class="d-flex flex-column flex-shrink-0 p-3 bg-light slide-up" style="width: 280px; height: 100vh;">
          <a href="<?=BASE_PATH?>/account" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Account</span>
          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
              <a href="<?=BASE_PATH?>/account/accountPeronsalInformation" class="nav-link link-dark" aria-current="page">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                Personal Information
              </a>
            </li>
            <li>
              <a href="<?=BASE_PATH?>/account/accountBookingHistory" class="nav-link link-dark" id="loadBookingHistory">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Booking History
              </a>
            </li>

            <li>
              <a href="<?=BASE_PATH?>/account/accountSchedule" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                Schedule
              </a>
            </li>
            <li>
              <a href="<?=BASE_PATH?>/account/accountInventory" class="nav-link active">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                Inventory
              </a>
            </li>
            <li>
              <a href="<?=BASE_PATH?>/account/accountBookingList" class="nav-link link-dark">
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
        <div class="sideScreen slide-up">
          <!---default content will be the Personal info-->
          <!--content is load here-->
          <div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
        
            </tr>
          </thead>
          <tbody>
                      <tr>
                          <td>Aug 26</td>
                          <td>10:10 am</td>
                        
                          <td>
                          
                            <a href="#">
                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5ZM4.118 4l.845 10.56c.034.428.384.74.814.74h6.46c.43 0 .78-.312.814-.74L11.884 4H4.118Z"/>
                              </svg>

                            </a>
                            
                          </td>
                      </tr>

                 
          </tbody>

        </table>

        <a href="#">
          <label>Add Schedule</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
              <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
              <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
            </svg>
        </a>
      </d>
    </div>
         
          

        </div>
        
      </main>

     

      <?php include_once 'Views/footer.php'; ?>
    </body>
</html>
