document.addEventListener("DOMContentLoaded", function() {
  console.log("about script");

  // for the first 2 pic
  const images = [
    ["<?php echo BASE_URL; ?>/Views/Images/about1.png", "<?php echo BASE_URL; ?>/Views/Images/about2.png"], // Pair 1
    ["<?php echo BASE_URL; ?>/Views/Images/about3.png", "<?php echo BASE_URL; ?>/Views/Images/about4.png"]  // Pair 2
];
let currentFirstImageIndex = 0;
//cat   
const catImages = ['<?php echo BASE_URL; ?>/Views/Images/cat1.jpg', '<?php echo BASE_URL; ?>/Views/Images/cat2.jpg', '<?php echo BASE_URL; ?>/Views/Images/cat3.jpg'];
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

// Interval
setInterval(changeImages, 3000);
setInterval(changeCatImage, 3000);

// Initial call to set the first image
changeImages();
changeCatImage();



});