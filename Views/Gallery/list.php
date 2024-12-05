<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
?>

<?php include_once 'Views/nav.php'; ?>
<?php include_once 'Views/bookingModal.php'; ?>

  <main class="container py-4">

  <div class="green-background text-secondary  container slide-up ">
    <div class=" pb-5" >
      <h1 class="mt-5 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center"><?= GALLERY ?></h1>
    </div>
  </div>

  <div id="instagram-pic">
  <?php
    foreach ($data["mediaItems"] as $item) {
      if($item['type'] == 'CAROUSEL_ALBUM' || $item['type'] == 'IMAGE') {
        echo "<img class='slide-up' src='" . htmlspecialchars($item['url']) . "' alt='instagram_post'>";
      } elseif ($item['type'] == 'VIDEO') {
        echo "<video controls>
                <source src='" . htmlspecialchars($item['url']) . "' type='video/mp4'>
                Your browser does not support the video tag.
              </video>";
      }
    }
  ?>

  </div>
  </main>

  <?php include_once 'Views/footer.php'; ?>
</body>
</html>