document.addEventListener("DOMContentLoaded", function() {
  console.log('Genral script')

  //query all the elements with slide-up class
  const slideElements = document.querySelectorAll('.slide-up');

  const checkSlide = () => {
    slideElements.forEach((element) => {
        const rect = element.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom >= 0) {
            element.classList.add('active'); // Add active class when in viewport
        } else {
            element.classList.remove('active'); // Remove active class if out of viewport
        }
    });
  };

  window.addEventListener('scroll', checkSlide);
  checkSlide(); 

  const checkbox = document.getElementById("bookingCheckBox");
  const confirmButton = document.getElementById("confirmButton");

  checkbox.addEventListener("change", function () {
    if(checkbox.checked){
      confirmButton.classList.remove("disabled");
    }else{
      confirmButton.classList.add("disabled");
    }

  });
  


});