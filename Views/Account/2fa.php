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
            
          <h1>2FA</h1>
          <form action="<?=BASE_PATH?>/account/2fa" method="POST">
            <div class="form-group">
              <label for="code">Code</label>
              <input type="number" class="form-control" id="code" name="code" required>
            </div>
           
            <?php if (isset($data["error"])): ?>
              <p><span style="color:red"><?php echo $data['error']; ?></span></p>
            <?php endif; ?>
            <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
                <input class="btn bttn-green  mt-3" role="button" type="submit" value="Login">
              <a class="btn btn-secondary mt-3" href="<?=BASE_PATH?>/account/login" role="button"><?= GO_BACK ?></a>
            </div>
          </form>
          </div>
      </main>

      <script>

      </script>


      <?php include_once 'Views/footer.php'; ?>
    </body>
</html>