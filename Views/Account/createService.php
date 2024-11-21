<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
?>

<?php include_once 'Views/nav.php'; ?>
<?php include_once 'Views/bookingModal.php'; ?>



<main class="container py-4">
    <div>
        <div class="green-background text-secondary  container slide-up ">
            <div class=" pb-5" >
                <h1 class="mt-5 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center">Add Service</h1>
            </div>
        </div>

        <!-- Initially hidden review form -->
    </div>
    <!---error--->
    <?php if (isset($data['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($data['error']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?= BASE_PATH ?>/account/createService">

      <!-- Service Name -->
      <div class="form-group my-3">
          <label for="name" class="col-form-label canvaSans-fontstyle">Service Name:</label><br>
          <div class="col-sm-10 border bg-light p-1">
              <input type="text" name="name" id="name" class="form-control" required>
          </div>
      </div>

      <!-- Service Type -->
      <div class="form-group my-3">
          <label for="type" class="col-form-label canvaSans-fontstyle">Type:</label><br>
          <div class="col-sm-10 border bg-light p-1">
              <input type="text" name="type" id="type" class="form-control" required>
          </div>
      </div>

      <!-- Price -->
      <div class="form-group my-3">
          <label for="price" class="col-form-label canvaSans-fontstyle">Price:</label><br>
          <div class="col-sm-10 border bg-light p-1">
              <input type="number" name="price" id="price" class="form-control" step="0.01" required>
          </div>
      </div>

      <!-- Description -->
      <div class="form-group my-3">
          <label for="description" class="col-form-label canvaSans-fontstyle">Description:</label><br>
          <div class="col-sm-10 border bg-light p-1">
              <input type="text" name="description" id="description" class="form-control" required>
          </div>
      </div>

      <!-- Duration -->
      <div class="form-group my-3">
          <label for="duration" class="col-form-label canvaSans-fontstyle">Duration:</label><br>
          <div class="col-sm-10 border bg-light p-1">
              <input type="number" name="duration" id="duration" class="form-control" required>
          </div>
      </div>

      <!-- Visibility Dropdown -->
      <div class="form-group my-3">
          <label for="visibility" class="col-form-label canvaSans-fontstyle">Visibility:</label><br>
          <div class="col-sm-10 border bg-light p-1">
              <select name="visibility" id="visibility" class="form-control">
                  <option value="1">Visible</option>
                  <option value="0">Not Visible</option>
              </select>
          </div>
      </div>

      <hr>

      <!-- Error Handling -->
      <?php if (isset($data['error'])): ?>
          <p><span style="color:red"><?php echo $data['error']; ?></span></p>
      <?php endif; ?>

      <!-- Submit Button -->
      <div class="form-group my-3">
          <button type="submit" class="btn btn-primary">Add Service</button>
      </div>
  </form>


</main>

<?php include_once 'Views/footer.php'; ?>

</body>
</html>