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
      <h1 class="display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up"><?= ABOUT_US_HEADER ?></h1>
      <div class=" mx-auto slide-up">
        <p class="fs-6 m-3 py-5 px-4 slide-up ">
        <?= ABOUT_US_INFO?>
        </p>
      </div>
    </div>
  </div>

  <div class="d-md-flex flex-md-equal justify-content-center align-items-center w-100 my-md-3 container " id="image-container">
   <div>
    <img src="<?=BASE_PATH?>/Views/Images/about1.png" alt="Image 1" class="mx-2 slide-up" id="image1">
   </div>
   <div>
    <img src="<?=BASE_PATH?>/Views/Images/about2.png" alt="Image 2" class="mx-2 slide-up" id="image2">
   </div>
  </div>

  <div id="cat-warning-container">
    <div id="item-1"></div>
    <div id="item-2" class="slide-up"></div>
    <div id="item-3" class="slide-up overflow-auto">
      <h4 class="notice-title dmSans-fontstyle slide-up"><?= IMPORTANT_NOTICE ?></h4>
      <p class="notice-p dmSans-fontstyle slide-up">
          <?= CAT_NOTICE ?>
      </p>
    </div>
  </div>

<div class="container">
  <h1 class="display-5 text-green amsterdamThree-fontstyle text-shadow-pink slide-up p-4"><?= LOCATION ?></h1>
</div>


  <div class=" my-5 green-background" id="location-parking-container">
   
    <div class="d-md-flex flex-md-equal justify-content-center align-items-center w-100 my-md-3 slide-up " id="">
        <!-- Location Item -->
       <div class="col-md-6 " id="location-div">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2799.722524292248!2d-73.67220439999998!3d45.4350945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc916eaa06448d1%3A0x67b6e59d74aadb8d!2s980%20Rue%20Notre%20Dame%2C%20Lachine%2C%20QC%20H8S%202B9!5e0!3m2!1sen!2sca!4v1731001751030!5m2!1sen!2sca"
                   style="border: 0; " allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
       </div>

       <div class="col-md-6 p-3 " id="parking-div">
        <h4 class="notice-title slide-up"><?= PARKING_REMINDER ?></h4> 
        <p class="notice-p slide-up ">
          <?=  PARKING_REMINDER_INFO ?>
        </p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d341.64767448886255!2d-73.6735138755337!3d45.43439545676149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc9171879484665%3A0x26561a85b5a50684!2sStationnement%20municipal!5e0!3m2!1sen!2sca!4v1731002594499!5m2!1sen!2sca" >
        </iframe>
       </div>
  </div>

</main>



<?php include_once 'Views/footer.php'; ?>
</body>
</html>
