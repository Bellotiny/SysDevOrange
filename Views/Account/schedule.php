<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
include_once 'Views/bookingModal.php';
?>

    <body>
    <?php include_once 'Views/nav.php'; ?>
    
      <main class="d-flex" id="account-Main">
      <?php include_once 'Views/sidebar.php'; ?>

        <!---screen for sidebar--->
        <div class="sideScreen slide-up">
          <!---default content will be the Personal info-->
          <!--content is load here-->
          <div class= "container my-2">
            <?php include_once 'Views/menuAccount.php'; ?>
          </div>
          <div >
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
              <th scope="col">Client Name</th>
              <th scope="col">Service</th>
        
            </tr>
          </thead>
          <tbody>
                      <tr>
                          <td>Aug 26</td>
                          <td>10:10 am</td>
                          <td>Sen Bellotiny</td>
                          <td>Extenion</td>
                          <td>
                          
                            <a href="#">
                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5ZM4.118 4l.845 10.56c.034.428.384.74.814.74h6.46c.43 0 .78-.312.814-.74L11.884 4H4.118Z"/>
                              </svg>

                            </a>
                            
                          </td>
                      </tr>
                      <tr>
                          <td>Aug 28</td>
                          <td>12:20 pm</td>
                          <td>Jessica Curry</td>
                          <td>Extenion</td>
                          <td>
                          
                            <a href="#">
                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5ZM4.118 4l.845 10.56c.034.428.384.74.814.74h6.46c.43 0 .78-.312.814-.74L11.884 4H4.118Z"/>
                              </svg>

                            </a>
                            
                          </td>
                      </tr>
                      <tr>
                          <td>Sept 2</td>
                          <td>1:40 pm</td>
                          <td>Melanie Nature</td>
                          <td>Nail Removal</td>
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

      <script>

  


      </script>


      <!-- Include scripts here -->
<script src="<?=BASE_PATH?>/Views/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="<?=BASE_PATH?>/Views/script.js"></script>
    </body>
</html>
