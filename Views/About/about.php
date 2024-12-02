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
      <h1 class="display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up"><?= ABOUT_US ?></h1>
      <div class=" mx-auto slide-up">
        <p class="fs-6 m-3 py-5 px-4 slide-up ">
        Hey there! I’m a 20-something nail enthusiast who recently made the move to Montreal with my three fur babies—Mr. Bean, Brooklyn, and Squirtle. 🐾
        My nail journey began back in 2020 when the world slowed down and nail salons closed. Armed with poly gel and a creative spirit, I started doing my own nails. Soon, word got out, and my friends lined up for a fresh set!
        That’s when I truly fell in love with nail care and art. I’ve always had a passion for creativity, and now I get to express it every day—one fabulous nail design at a time! 💅🏻✨
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
   
    <div class="row h-100">
        <!-- Location Item -->
        <div class="col-md-6 d-flex justify-content-center align-items-center slide-up">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2799.722524292248!2d-73.67220439999998!3d45.4350945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc916eaa06448d1%3A0x67b6e59d74aadb8d!2s980%20Rue%20Notre%20Dame%2C%20Lachine%2C%20QC%20H8S%202B9!5e0!3m2!1sen!2sca!4v1731001751030!5m2!1sen!2sca"
                class="w-100 h-100" style="border: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <!-- Parking Item -->
        <div class="col-md-6 p-5 slide-up overflow-auto">
            <h4 class="notice-title slide-up"><?= PARKING_REMINDER ?></h4>
            <p class="notice-p slide-up overflow-auto">
            When you arrive for your nail appointment, you’ll find free parking just behind the Ortho clinic, in the lot across the street from my building.
            Need a hand with parking? No worries! Just reach out, and I’ll happily guide you. Once you’re parked, give me a quick message—I’ll come down to welcome you in!
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
