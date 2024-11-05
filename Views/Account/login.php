<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/nav.php';
?>
    
      <main class="d-flex" id="account-Main">

          <!---default content will be the Personal info-->
          <!--content is load here-->
         
          <div class="container">
          <h1>Login</h1>
          <form action="<?=BASE_PATH?>/account/login" method="POST">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <?php if (isset($data["error"])) { echo "<p>" . $data['error'] . "</p>"; } ?>
            <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
                <input class="btn btn-primary mt-3" role="button" type="submit" value="Login">
              <a class="btn btn-secondary mt-3" href="<?=BASE_PATH?>/account/accountPersonalInformation" role="button">Go Back</a>
            </div>
           
            <p class="mt-3">Don't have an account? <a href="<?=BASE_PATH?>/account/register" id="showRegisterForm">Register here</a></p>
          </form>
          </div>

        
      </main>

      <script>

      </script>


      <?php include_once 'Views/footer.php'; ?>
    </body>
</html>