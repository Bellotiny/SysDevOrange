<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);


?>

   
    <?php include_once 'Views/nav.php'; ?>
    
      <main class="d-flex" id="account-Main">
      

           <div class="container">
           <?php include_once 'Views/registerForm.php'; ?>
            <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
                <input class="btn btn-primary mt-3" role="button" type="submit" value="Register">
              <a class="btn btn-secondary mt-3" href="<?=BASE_PATH?>/account/accountPersonalInformation" role="button">Go Back</a>
            </div>
           
            <p class="mt-3">Already have an account? <a href="<?=BASE_PATH?>/account/login" id="showLoginForm">Login here</a></p>
          </form> 
         </div>
          
         

        
      </main>

      <script>

  


      </script>


      <?php include_once 'Views/footer.php'; ?>
    </body>
</html>