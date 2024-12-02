<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
include_once 'Views/bookingModal.php';
?>

    <body>
    <?php include_once 'Views/nav.php'; ?>
    
      <main class="d-flex max-vh-100" id="account-Main">
      <?php include_once 'Views/sidebar.php'; ?>

        <!---screen for sidebar--->
        <div class="sideScreen slide-up">
          <!---default content will be the Personal info-->
          <!--content is load here-->
          
          <div>
          <div class= "container my-2">
            <?php include_once 'Views/menuAccount.php'; ?>
          
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
        </div>
        
      </main>
        <!-- Include scripts here -->
        <?php include_once 'Views/Scripts/accountImportantScript.php'; ?>

    </body>
</html>
