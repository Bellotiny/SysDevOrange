document.addEventListener('DOMContentLoaded', function () {
  console.log("home");
  const slideElements = document.querySelectorAll('.slide-up');
  const modal = document.getElementById('welcomeModal');
  const tokenIsSet = document.cookie.indexOf('token=') !== -1;
  const hasSeenModal = sessionStorage.getItem('hasSeenModal') === 'true';

  if (!tokenIsSet && !hasSeenModal) {
    // Show modal with login and register options
    sessionStorage.setItem('hasSeenModal', 'true');
    new bootstrap.Modal(modal).show();
  } else if (tokenIsSet && !hasSeenModal) {
    // Show modal with welcome back message
    document.getElementById('showLogin').style.display = 'none';
    document.getElementById('showRegister').style.display = 'none';
    sessionStorage.setItem('hasSeenModal', 'true');
    new bootstrap.Modal(modal).show();
  }

    
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
