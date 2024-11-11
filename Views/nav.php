<?php 
include_once 'head.php';
?>
<header class="d-flex">
<div class="container" id="desktop-nav">
    <div id="nav-container" class="d-flex justify-content-between align-items-center">
        
        <!-- Logo on the far left -->
        <div id="logo">
            <img src="./Views/Images/logo.png" alt="Logo" class="nav-logo">
        </div>

        <!-- Navigation Links in the center -->
        <div id="nav-main" class="d-flex justify-content-center">
            <a class="nav-item <?= ($currentPage == 'home') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/home">Home</a>
            <a class="nav-item <?= ($currentPage == 'about') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/about">About</a>
            <a class="nav-item <?= ($currentPage == 'services') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/services">Services</a>
            <a class="nav-item <?= ($currentPage == 'gallery') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/gallery">Gallery</a>
            <a class="nav-item <?= ($currentPage == 'contact') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/contact">Contact</a>
        </div>

        <!-- Book and Account Icon on the far right -->
        <div id="nav-extra" class="d-flex align-items-center">
            <a class="Nav-Split" data-bs-toggle="modal" data-bs-target="#modalBookingWarning" href="#">Book</a>
            <a href="<?=BASE_PATH?>/account">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                </svg>
            </a>
        </div>
    </div>
</div>


<!-- Mobile Navbar (Hamburger Menu) -->
<div class="container" id="hamburger">
    <nav class="navbar bg-body-tertiary" style="width: -webkit-fill-available;">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <button class="navbar-toggler" id="menuToggle" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Centered Logo -->
            <div class="logo-container">
                <a href="<?=BASE_PATH?>/home">
                     <img src="./Views/Images/logo.png" id="navbarLogo" alt="logo">
                </a>
            </div>
        </div>
    </nav>
    <div class="full-screen-overlay" id="navbarMenu">
        <div class="menu-content">
            <a class="nav-item <?= ($currentPage == 'home') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/home">Home</a>
            <a class="nav-item <?= ($currentPage == 'about') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/about">About</a>
            <a class="nav-item <?= ($currentPage == 'services') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/services">Services</a>
            <a class="nav-item <?= ($currentPage == 'gallery') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/gallery">Gallery</a>
            <a class="nav-item <?= ($currentPage == 'contact') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/contact">Contact</a>
            
            <!-- Row container for the "Book" and Account icon links -->
            <div class="nav-row">
                <a class="Nav-Split" data-bs-toggle="modal" data-bs-target="#modalBookingWarning" href="#">Book</a>
                <a href="<?=BASE_PATH?>/account">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" id="mobile-account">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>




</header>
<script>
    document.getElementById('menuToggle').addEventListener('click', function() {
    const navbarMenu = document.getElementById('navbarMenu');
    navbarMenu.classList.toggle('show');
});
</script>

