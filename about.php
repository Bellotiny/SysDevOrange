<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="CSS/style.css"> 
</head>
<?php include_once "head.php" ?>
<body class="background_color">
<header>
      <nav id="nav"></nav>
</header>
<main>
  <div class="divGreen">
    <h1 class="about-heading">About us</h1>
    <div class="divGreen-p">
      <p>
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

  <div id="image-container">
    <img src="Images/about1.png" alt="Image 1" id="image1">
    <img src="Images/about2.png" alt="Image 2" id="image2">
  </div>

  <div id="cat-warning-container">
    <div id="item-1"></div>
    <div id="item-2"></div>
    <div id="item-3">
      <h4 class="notice-title">Important Notice</h4>
      <p class="notice-p">
        Please be aware that we have a precious fur baby in 
        our home! As a loving cat mom, I want to let you know that 
        my little companion is quite the curious explorer. Rest assured, they’re friendly and full of love!
      </p>
    </div>
  </div>

  <div id="location-parking-container">
    <div id="location-item">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5593.426392454826!2d-73.6227813235352!3d45.49571993133485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc919ffcf1c68a3%3A0x4703d638d8de8b46!2sMon%20Ami%20Korean%20BBQ%20C%C3%B4te-des-Neiges!5e0!3m2!1sen!2sca!4v1727067483644!5m2!1sen!2sca" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div id="parking-item">
      <h4 class="notice-title">Parking reminder:</h4>
      <p class="notice-p">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In egestas nisl 
        vitae tristique tincidunt. orci luctus et ultrices posuere cubilia curae; Morbi iaculis nunc ante,
        id congue sapien imperdiet sit amet. Praesent ac neque rutrum velit lobortis 
        iaculis 
      </p>
      <div id="parking-div">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d89500.75621796442!2d-73.84378810273436!3d45.491986000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc917d1536e3e4f%3A0x628982dfacdbf88d!2sIKEA%20Montr%C3%A9al!5e0!3m2!1sfr!2sca!4v1728793160923!5m2!1sfr!2sca"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
  
  <?php include_once "footer.php"; ?>
</main>
<script src="script.js"></script>
<script>

    // Array of images

     // for the first 2 pic
     const images = [
            ["Images/about1.png", "Images/about2.png"], // Pair 1
            ["Images/about3.png", "Images/about4.png"]  // Pair 2
        ];
      let currentFirstImageIndex = 0;
     //cat   
    const catImages = ['Images/cat1.jpg', 'Images/cat2.jpg', 'Images/cat3.jpg'];
    let currentCatImageIndex = 0;
   

    // Function to change the background image
    function changeImages() {
      const imageElement1 = document.getElementById("image1");
      const imageElement2 = document.getElementById("image2");

        // Ensure image elements are found
        if (imageElement1 && imageElement2) {
            // Change the images
            imageElement1.src = images[currentFirstImageIndex][0];
            imageElement2.src = images[currentFirstImageIndex][1];
            // Update the index for the next image pair
            currentFirstImageIndex = (currentFirstImageIndex + 1) % images.length;
        } else {
            console.error("Image elements not found.");
        }
    }

    function changeCatImage() {
        const item2 = document.getElementById('item-2');
        item2.style.backgroundImage = `url('${catImages[currentCatImageIndex]}')`;

        // Update the index for the next image
        currentCatImageIndex = (currentCatImageIndex + 1) % catImages.length; // Loop back to the first image
    }

    // Change the image every n seconds
    setInterval(changeImages, 3000);
    setInterval(changeCatImage, 3000);

    // Initial call to set the first image
    changeImages();
    changeCatImage();
</script>
</body>
</html>
