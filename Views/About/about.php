<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
include_once 'Views/nav.php';
?>

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

<main class="py-5 background_color  ">

  <div class="green-background text-secondary  container slide-up">
    <div class="">
      <h1 class="display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up">About us</h1>
      <div class=" mx-auto slide-up">
        <p class="fs-6 m-3 py-5 px-4 slide-up ">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In egestas nisl 
        vitae tristique tincidunt. Nam a condimentum urna, vitae interdum urna. Donec
        dignissim tincidunt ipsum et semper. Vestibulum ante ipsum primis in faucibus 
        orci luctus et ultrices posuere cubilia curae; Morbi iaculis nunc ante,
        id congue sapien imperdiet sit amet. Praesent ac neque rutrum velit lobortis 
        iaculis iaculis sed lacus. Praesent dictum sagittis ultrices. Nullam vitae dui mattis, 
        mollis tortor id, euismod ligula. Integer a ligula magna. In hac habitasse platea dictumst.
        Aliquam erat volutpat. Donec scelerisque metus est.
        </p>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-center align-items-center w-100 px-0 container py-4 " id="image-container">
    <img src="<?=BASE_PATH?>/Views/Images/about1.png" alt="Image 1" class="mx-2 slide-up" id="image1">
    <img src="<?=BASE_PATH?>/Views/Images/about2.png" alt="Image 2" class="mx-2 slide-up" id="image2">
  </div>

  <div id="cat-warning-container">
    <div id="item-1"></div>
    <div id="item-2" class="slide-up"></div>
    <div id="item-3" class="slide-up overflow-auto">
      <h4 class="notice-title dmSans-fontstyle slide-up">Important Notice</h4>
      <p class="notice-p dmSans-fontstyle slide-up">
        Please be aware that we have a precious fur baby in 
        our home! As a loving cat mom, I want to let you know that 
        my little companion is quite the curious explorer. Rest assured, they’re friendly and full of love!
      </p>
    </div>
  </div>

<div class="container">
  <h1 class="display-5 text-green amsterdamThree-fontstyle text-shadow-pink slide-up p-4">Location</h1>
</div>


  <div class=" my-5 green-background" id="location-parking-container">
   
    <div class="row h-100">
        <!-- Location Item -->
        <div class="col-md-6 d-flex justify-content-center align-items-center slide-up">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5593.426392454826!2d-73.6227813235352!3d45.49571993133485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc919ffcf1c68a3%3A0x4703d638d8de8b46!2sMon%20Ami%20Korean%20BBQ%20C%C3%B4te-des-Neiges!5e0!3m2!1sen!2sca!4v1727067483644!5m2!1sen!2sca" 
                class="w-100 h-100" style="border: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <!-- Parking Item -->
        <div class="col-md-6 p-5 slide-up overflow-auto">
            <h4 class="notice-title slide-up">Parking reminder:</h4>
            <p class="notice-p slide-up overflow-auto">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In egestas nisl 
                vitae tristique tincidunt. orci luctus et ultrices posuere cubilia curae; Morbi iaculis nunc ante,
                id congue sapien imperdiet sit amet. Praesent ac neque rutrum velit lobortis iaculis.
            </p>

            <!--  Map Container -->
            <div class=" mx-auto slide-up" id="parking-div">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d89500.75621796442!2d-73.84378810273436!3d45.491986000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc917d1536e3e4f%3A0x628982dfacdbf88d!2sIKEA%20Montr%C3%A9al!5e0!3m2!1sfr!2sca!4v1728793160923!5m2!1sfr!2sca" 
                    class="position-absolute top-0 start-0 w-100 h-100" style="border: none;">
                </iframe>
            </div>
        </div>
    </div>
  </div>

</main>



<?php include_once 'Views/footer.php'; ?>
</body>
</html>
