<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/nav.php';
include_once 'Views/bookingModal.php';
?>
    
      <main class="d-flex" id="account-Main">
         
          <div class="container">
          <h1>Forgot Password</h1>
          <!-- @Trev Needs an action-->
          <form action="#" method="POST">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?= $data["email"] ?? "" ?>" required>
            </div>
            <?php if (isset($data["error"])): ?>
              <p><span style="color:red"><?php echo $data['error']; ?></span></p>
            <?php endif; ?>
            <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
                <input class="btn btn-primary mt-3" role="button" type="submit" value="Send Email">
              <a class="btn btn-secondary mt-3" href="<?=BASE_PATH?>/account/login" role="button">Go Back</a>
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