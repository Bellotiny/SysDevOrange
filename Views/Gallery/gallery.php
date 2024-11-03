<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
?>

<?php include_once 'Views/nav.php'; ?>


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
                        <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/home" role="button">Cancel</a>
                        <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/book/bookOne" role="button">Confirm</a>

                    </div>
                </div>
            </div>
</div>

  <main class="container py-4">

  <div class="green-background text-secondary  container slide-up ">
    <div class=" pb-5" >
      <h1 class="mt-5 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center">Gallery</h1>
    </div>
  </div>

  <div id="instagram-pic">
    <img class="slide-up" src="<?=BASE_PATH?>/Views/Images/about1.png" alt="Image 1">
    <img class="slide-up" src="<?=BASE_PATH?>/Views/Images/about2.png" alt="Image 2">
    <img class="slide-up" src="<?=BASE_PATH?>/Views/Images/about3.png" alt="Image 3">
    <img class="slide-up" src="<?=BASE_PATH?>/Views/Images/about4.png" alt="Image 4">
    <img class="slide-up" src="<?=BASE_PATH?>/Views/Images/cat2.jpg" alt="Image 5">
    <img class="slide-up" src="<?=BASE_PATH?>/Views/Images/cat3.jpg" alt="Image 6">
      
  </div>

  <div>

  <div class="green-background text-secondary  container slide-up ">
    <div class=" pb-5" >
      <h1 class="mt-5 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center">Reviews</h1>
    </div>
  </div>
    
  <div class="col-lg-6 col-xxl-4 my-5 mx-auto">
  <div class="d-grid gap-2">
    <button class="btn bttn-green slide-up " type="button" id="toggleReviewFormButton" aria-expanded="false">Write Review</button>
  </div>
</div>

<!-- Initially hidden review form -->
<div id="review-form-input" class="pb-3" style="display: none;">
  <div class="mb-3">
    <label for="reviewTitle" class="form-label">Title</label>
    <input class="form-control" id="reviewTitle" type="text" placeholder="Enter review title">
  </div>
  <div class="mb-3">
    <label for="reviewContent" class="form-label">Review</label>
    <textarea class="form-control" id="reviewContent" rows="3" placeholder="Write your review here"></textarea>
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Upload File</label>
    <input class="form-control" type="file" id="formFile">
  </div>
  <div class="d-grid gap-2">
    <button class="btn bttn-green" type="button">Post</button>
  </div>
</div>

    <div class="w-100 slide-up">
      <!------first reviewws--->
      <div class="d-flex align-items-center py-2"> 
        <div class="me-3">
            <img src="<?=BASE_PATH?>/Views/Images/about1.png" alt="Image 1" class="img-fluid rounded me-4" style="width: 200px; height: auto;">
        </div>  

        <div class="w-100 ">
           <div class="d-flex justify-content-between align-items-center">
              <!--date -->
              <strong class="d-inline-block mb-2 text-primary-emphasis ">Mar 16</strong>
             <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3 mx-3 text-primary-emphasis " viewBox="0 0 16 16">
                  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square text-primary-emphasis" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
             </div>
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
            <img src="<?=BASE_PATH?>/Views/Images/about2.png" alt="Image 1" class="img-fluid rounded me-4" style="width: 200px; height: auto;">
        </div>  

        <div class="w-100 ">
          <div class="d-flex justify-content-between align-items-center">
              <!--date -->
              <strong class="d-inline-block mb-2 text-primary-emphasis ">Mar 16</strong>
             <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3 mx-3 text-primary-emphasis " viewBox="0 0 16 16">
                  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square text-primary-emphasis" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
             </div>
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
            <img src="<?=BASE_PATH?>/Views/Images/about4.png" alt="Image 1" class="img-fluid rounded me-4" style="width: 200px; height: auto;">
        </div>  

        <div class="w-100 ">
          <div class="d-flex justify-content-between align-items-center">
              <!--date -->
              <strong class="d-inline-block mb-2 text-primary-emphasis ">Mar 16</strong>
             <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3 mx-3 text-primary-emphasis " viewBox="0 0 16 16">
                  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square text-primary-emphasis" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
             </div>
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

  <?php include_once 'Views/footer.php'; ?>
 
  <script>
    // Toggle review form visibility
    document.getElementById('toggleReviewFormButton').addEventListener('click', function() {
    const reviewForm = document.getElementById('review-form-input');
    const isVisible = reviewForm.style.display === 'block';

    // Toggle the display property
    reviewForm.style.display = isVisible ? 'none' : 'block';
    // Update aria-expanded attribute
    this.setAttribute('aria-expanded', !isVisible);
  });
  </script>
   
</body>
</html>