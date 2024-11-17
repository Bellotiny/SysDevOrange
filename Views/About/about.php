<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
include_once 'Views/nav.php';
include_once 'Views/bookingModal.php';
?>



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
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2799.722524292248!2d-73.67220439999998!3d45.4350945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc916eaa06448d1%3A0x67b6e59d74aadb8d!2s980%20Rue%20Notre%20Dame%2C%20Lachine%2C%20QC%20H8S%202B9!5e0!3m2!1sen!2sca!4v1731001751030!5m2!1sen!2sca"
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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d341.64767448886255!2d-73.6735138755337!3d45.43439545676149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc9171879484665%3A0x26561a85b5a50684!2sStationnement%20municipal!5e0!3m2!1sen!2sca!4v1731002594499!5m2!1sen!2sca"
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
