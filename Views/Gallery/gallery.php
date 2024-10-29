<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once ROOT . '/Views/head.php';
?>

<body class="background_color">
<?php include_once ROOT . '/Views/nav.php'; ?>


<!-- Modal for Booking -->
<div class="modal fade" id="modalBookingWarning" tabindex="-1" role="dialog" aria-labelledby="modalBookingWarningTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalBookingWarningTitle">Booking Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <h4>Booking Rules:</h4>
                        <ul>
                            <li><strong>The client must pay <span style="color: #d9534f;">$10</span> upon booking</strong>, which will be deducted from the total payment.</li>
                            <li><strong>They must choose at least <span style="color: #d9534f;">one color</span>.</strong></li>
                            <li><strong>Home service is an option but available only <span style="color: #d9534f;">within a certain range</span>.</strong></li>
                            <li><strong>There are <span style="color: #d9534f;">cats</span> in the owner's place.</strong></li>

                        </ul>
                        <hr>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <strong>I read all the reminder</strong>
                        </label>
                    </div>
                    <div class="container d-flex justify-content-center gap-4 my-5">
                        <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=home" role="button">Cancel</a>
                        <a class="btn btn-primary w-50" href="<?php echo BASE_URL; ?>/index.php?controller=book&action=bookOne" role="button">Confirm</a>

                    </div>
                </div>
            </div>
        </div>

  <main class="container">
  <div class="accent-div">
    <h1 class="accent-heading">Gallery</h1>
  </div>
  <div id="instagram-pic">
    <img src="<?=  BASE_URL ?>/Views/Images/about1.png" alt="Image 1">
    <img src="<?=  BASE_URL ?>/Views/Images/about2.png" alt="Image 2">
    <img src="<?=  BASE_URL ?>/Views/Images/about3.png" alt="Image 3">
    <img src="<?=  BASE_URL ?>/Views/Images/about4.png" alt="Image 4">
    <img src="<?=  BASE_URL ?>/Views/Images/cat2.jpg" alt="Image 5">
    <img src="<?=  BASE_URL ?>/Views/Images/cat3.jpg" alt="Image 6">
      
  </div>
  <hr>

  <div>
    <div class="accent-div">
    <h1 class="accent-heading">Reviews</h1>
    </div>
    <div class="col-lg-6 col-xxl-4 my-5 mx-auto">
      <div class="d-grid gap-2">
        <button class="btn btn-primary" type="button" id="toggleReviewFormButton">Write Review</button>
      </div>
    </div>

   <!-- Initially hidden review form -->
    <div id="review-form-input" style="display: none; background-color: white; padding: 20px; border-radius: 5px;">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Review</label>
        <textarea class="form-control" id="exampleFormControlTextarea2" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="formFile">
      </div>
      <div class="d-grid gap-2">
        <button class="btn btn-primary" type="button">Post</button>
      </div>
    </div>

    <div class="w-100">
      <!------first reviewws--->
      <div class="d-flex align-items-center py-2"> 
        <div class="me-3">
            <img src="<?=  BASE_URL ?>/Views/Images/about1.png" alt="Image 1" class="img-fluid rounded me-4" style="width: 200px; height: auto;">
        </div>  

        <div class="w-100 ">
            <div>
              <!--date -->
              <strong class="d-inline-block mb-2 text-primary-emphasis">Mar 16</strong>
            </div>
            <div>
              <!-- Title comment-->
              <h3 class="mb-0">Loveee!!</h3>
              <!---comment-->
              <p class="card-text mb-auto"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In egestas nisl 
              vitae tristique tincidunt. Nam a condimentum urna,</p>
            </div>
            <hr>
            <div class="d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bullseye  me-2" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10m0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8"/>
                <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
              </svg>
              <div class="mb-1 text-body-secondary">Bretman Rock</div>
            </div>       
          </div>
      </div>

      <!------second reviewws--->
      <div class="d-flex align-items-center py-2"> 
        <div class="me-3">
            <img src="<?=  BASE_URL ?>/Views/Images/about2.png" alt="Image 1" class="img-fluid rounded me-4" style="width: 200px; height: auto;">
        </div>  

        <div class="w-100 ">
            <div>
              <!--date -->
              <strong class="d-inline-block mb-2 text-primary-emphasis">Mar 16</strong>
            </div>
            <div>
              <!-- Title comment-->
              <h3 class="mb-0">Nailssss!!</h3>
              <!---comment-->
              <p class="card-text mb-auto"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In egestas nisl 
              vitae tristique tincidunt. Nam a condimentum urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In egestas nisl 
              vitae tristique tincidunt. Nam a condimentum urna,</p>
            </div>
            <hr>
            <div class="d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bullseye  me-2" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10m0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8"/>
                <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
              </svg>
              <div class="mb-1 text-body-secondary">Janna Lomibao</div>
            </div>       
          </div>
      </div>

      <!------third reviewws--->
      <div class="d-flex align-items-center py-2"> 
        <div class="me-3">
            <img src="<?=  BASE_URL ?>/Views/Images/about4.png" alt="Image 1" class="img-fluid rounded me-4" style="width: 200px; height: auto;">
        </div>  

        <div class="w-100 ">
            <div>
              <!--date -->
              <strong class="d-inline-block mb-2 text-primary-emphasis">Oct 16</strong>
            </div>
            <div>
              <!-- Title comment-->
              <h3 class="mb-0">Great</h3>
              <!---comment-->
              <p class="card-text mb-auto"> Lorem entum urna,</p>
            </div>
            <hr>
            <div class="d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bullseye  me-2" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10m0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8"/>
                <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
              </svg>
              <div class="mb-1 text-body-secondary">Jennie Kim</div>
            </div>       
          </div>
      </div>

      <!---pagination--->
     <div class="d-flex justify-content-center">
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

    </div>

  </div>

  
  </main>

  <?php include_once ROOT . '/Views/footer.php'; ?>
 
  <script>
    // Toggle review form visibility
    document.getElementById('toggleReviewFormButton').addEventListener('click', function() {
      const reviewForm = document.getElementById('review-form-input');
      if (reviewForm.style.display === 'none' || reviewForm.style.display === '') {
        reviewForm.style.display = 'block';
      } else {
        reviewForm.style.display = 'none';
      }
    });
  </script>
   
</body>
</html>