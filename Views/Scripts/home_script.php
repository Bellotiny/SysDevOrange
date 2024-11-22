document.addEventListener("DOMContentLoaded", function(){
  console.log('Home Script');
  const modal = new bootstrap.Modal(document.getElementById('welcomeModal'));
  const slideElements = document.querySelectorAll('.slide-up');

  window.onload = function () {
    // Check if user is logged in (token present in localStorage or session)
    const isLoggedIn = localStorage.getItem('token') !== null; // Adjust as needed for your auth system
    const hasSeenModal = localStorage.getItem('hasSeenModal') === 'true'; // Check if user has seen the modal

    // Check if it's the first time visiting the site
    const isFirstTime = localStorage.getItem('firstTime') !== 'false';

    // Show modal if not logged in and it's the first time visiting
    if (!isLoggedIn && isFirstTime && !hasSeenModal) {
        // Only show modal if user hasn't logged in and hasn't seen the modal before
        $('#welcomeModal').modal('show');
        localStorage.setItem('hasSeenModal', 'true'); // Mark that the user has seen the modal
        document.getElementById('showLogin').style.display = 'inline-block';
        document.getElementById('showRegister').style.display = 'inline-block';
    } else {
        // If logged in, hide login and register buttons
        document.getElementById('showLogin').style.display = 'none';
        document.getElementById('showRegister').style.display = 'none';
    }
  };
  
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

  // JavaScript to toggle between login, register forms, and welcome message
  document.addEventListener("DOMContentLoaded", function() {
    const welcomeMessage = document.getElementById("welcomeMessage");
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("registerForm");
    const forgotForm = document.getElementById("forgotForm");
    const authModalTitle = document.getElementById("authModalTitle");

    // Scroll event listener to handle sliding elements
    window.addEventListener('scroll', checkSlide);
    checkSlide(); 

    // Show login form
    document.getElementById("showLogin").addEventListener("click", function(event) {
      event.preventDefault();
      welcomeMessage.style.display = "none";
      registerForm.style.display = "none";
      loginForm.style.display = "block";
      authModalTitle.textContent = "Login";
    });

    // Show forgot form
    document.getElementById("showForgotForm").addEventListener("click", function(event) {
      event.preventDefault();
      welcomeMessage.style.display = "none";
      registerForm.style.display = "none";
      loginForm.style.display = "none";
      forgotForm.style.display = "block";
      authModalTitle.textContent = "Forgot Password";
    });

    // Show register form
    document.getElementById("showRegister").addEventListener("click", function(event) {
      event.preventDefault();
      welcomeMessage.style.display = "none";
      loginForm.style.display = "none";
      registerForm.style.display = "block";
      forgotForm.style.display = "none";
      authModalTitle.textContent = "Register";
    });

    // Show register form from within login form
    document.getElementById("showRegisterForm").addEventListener("click", function(event) {
      event.preventDefault();
      loginForm.style.display = "none";
      registerForm.style.display = "block";
      forgotForm.style.display = "none";
      authModalTitle.textContent = "Register";
    });

    // Show login form from within register form
    document.getElementById("showLoginFormRegister").addEventListener("click", function(event) {
      event.preventDefault();
      registerForm.style.display = "none";
      loginForm.style.display = "block";
      forgotForm.style.display = "none";
      authModalTitle.textContent = "Login";
    });

    // Show login form from within forgot form
    document.getElementById("showLoginForm").addEventListener("click", function(event) {
      event.preventDefault();
      registerForm.style.display = "none";
      loginForm.style.display = "block";
      forgotForm.style.display = "none";
      authModalTitle.textContent = "Login";
    });

    // Show forgot form from within login form
    document.getElementById("showForgotForm").addEventListener("click", function(event) {
      event.preventDefault();
      registerForm.style.display = "none";
      loginForm.style.display = "none";
      forgotForm.style.display = "block";
      authModalTitle.textContent = "Forgot Password";
    });

    // Go back to welcome message from login form
    document.getElementById("goBackFromLogin").addEventListener("click", function() {
      loginForm.style.display = "none";
      welcomeMessage.style.display = "block";
      authModalTitle.textContent = "Welcome to our nook!";
    });

    // Go back to welcome message from register form
    document.getElementById("goBackFromRegister").addEventListener("click", function() {
      registerForm.style.display = "none";
      welcomeMessage.style.display = "block";
      authModalTitle.textContent = "Welcome to our nook!";
    });

    // Go back to login form from forgot form
    document.getElementById("goBackFromForgot").addEventListener("click", function() {
      forgotForm.style.display = "none";
      loginForm.style.display = "block";
      authModalTitle.textContent = "Login";
    });
  });


})
