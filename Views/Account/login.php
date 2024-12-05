<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/nav.php';
include_once 'Views/bookingModal.php';
?>
    
      <main class="d-flex" id="account-Main">

          <!---default content will be the Personal info-->
          <!--content is load here-->
         
          <div class="container">
          <h1><?= LOGIN ?></h1>
          <form action="<?=BASE_PATH?>/account/login" method="POST">
            <div class="form-group">
              <label for="email"><?= EMAIL ?></label>
              <input type="email" class="form-control" id="email" name="email" value="<?= $data["email"] ?? "" ?>" required>
            </div>
            <div class="form-group">
              <label for="password"><?= PASSWORD ?></label>
              <input type="password" class="form-control" id="password" name="password" required>
              <p class="mt-3"><a href="<?=BASE_PATH?>/account/forgot"><?= FORGOT_PASS ?></a></p>
            </div>
            <?php if (isset($data["error"])): ?>
              <p><span style="color:red"><?php echo $data['error']; ?></span></p>
            <?php endif; ?>
            <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
                <input class="btn btn-primary mt-3" role="button" type="submit" value="Login">
              <a class="btn btn-secondary mt-3" href="<?=BASE_PATH?>/home" role="button"><?= GO_BACK ?></a>
            </div>

           
            <p class="mt-3"><?= DONT_HAVE_ACCOUNT ?> <a href="<?=BASE_PATH?>/account/register" id="showRegisterForm"><?= REGISTER_HERE ?></a></p>
          </form>
          </div>

        
      </main>

      <script>

      </script>


      <?php include_once 'Views/footer.php'; ?>
    </body>
</html>