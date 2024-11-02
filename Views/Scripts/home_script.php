document.addEventListener("DOMContentLoaded", function() {
  console.log('home script')

// HHOME.PHP - Login Modal, Register Modal, Wecome Modal,
  
  const modal = new bootstrap.Modal(document.getElementById('welcomeModal'));

  // Show the modal only once per session
  if (!sessionStorage.getItem('modalShown')) {
    modal.show();
    sessionStorage.setItem('modalShown', 'true');
  }


  // JavaScript to toggle between login, register forms, and welcome message
  document.addEventListener("DOMContentLoaded", function() {
    const welcomeMessage = document.getElementById("welcomeMessage");
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("registerForm");
    const authModalTitle = document.getElementById("authModalTitle");


    document.getElementById("showLogin").addEventListener("click", function(event) {
      event.preventDefault();
      welcomeMessage.style.display = "none";
      registerForm.style.display = "none";
      loginForm.style.display = "block";
      authModalTitle.textContent = "Login";
    });

    // Show register form
    document.getElementById("showRegister").addEventListener("click", function(event) {
      event.preventDefault();
      welcomeMessage.style.display = "none";
      loginForm.style.display = "none";
      registerForm.style.display = "block";
      authModalTitle.textContent = "Register";
    });

    // Show register form from within login form
    document.getElementById("showRegisterForm").addEventListener("click", function(event) {
      event.preventDefault();
      loginForm.style.display = "none";
      registerForm.style.display = "block";
      authModalTitle.textContent = "Register";
    });

    // Show login form from within register form
    document.getElementById("showLoginForm").addEventListener("click", function(event) {
      event.preventDefault();
      registerForm.style.display = "none";
      loginForm.style.display = "block";
      authModalTitle.textContent = "Login";
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
  });


});