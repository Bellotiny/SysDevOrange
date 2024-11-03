
// public/assets/JS/script.js

document.addEventListener("DOMContentLoaded", function() {
    console.log("about script");

    // Print BASE_URL to the console
    console.log("BASE_URL:", BASE_URL); // This should work now

    // Your existing code...
    const images = [
        [`${BASE_URL}/Views/Images/about1.png`, `${BASE_URL}/Views/Images/about2.png`], // Pair 1
        [`${BASE_URL}/Views/Images/about3.png`, `${BASE_URL}/Views/Images/about4.png`]  // Pair 2
    ];
    let currentFirstImageIndex = 0;

    // Cat images
    const catImages = [`${BASE_URL}/Views/Images/cat1.jpg`, `${BASE_URL}/Views/Images/cat2.jpg`, `${BASE_URL}/Views/Images/cat3.jpg`];
    let currentCatImageIndex = 0;

    // Your existing functions...
});
