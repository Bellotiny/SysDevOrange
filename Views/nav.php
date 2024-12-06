<?php 
include_once 'head.php';

// Set the link text dynamically
$toggleText = (lang === "en" ? "FR" : "EN");
?>
<header class="d-flex">
<div class="container" id="desktop-nav">
    <div id="nav-container" class="d-flex justify-content-between align-items-center">
        
        <!-- Logo on the far left -->
        <div id="logo">
            <a href="<?=BASE_PATH?>/">
            <img src="<?=BASE_PATH?>/Views/Images/logo.png" alt="Logo" class="nav-logo">
            </a>
        </div>

        <!-- Navigation Links in the center -->
        <div id="nav-main" class="d-flex justify-content-center">
            <a class="nav-item <?= ($currentPage == 'home') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/"><?= HOME ?></a>
            <a class="nav-item <?= ($currentPage == 'about') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/about"><?= ABOUT ?></a>
            <a class="nav-item <?= ($currentPage == 'services') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/services"><?= SERVICE ?></a>
            <a class="nav-item <?= ($currentPage == 'gallery') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/gallery"><?= GALLERY ?></a>
            <a class="nav-item <?= ($currentPage == 'reviews') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/reviews"><?= REVIEWS ?></a>
            <a class="nav-item <?= ($currentPage == 'contact') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/contact"><?= CONTACT ?></a>
            <a class="nav-item lang"  onclick = "return changeLang()" href=""><?php echo $toggleText; ?></a>
         </div>

        <!-- Book and Account Icon on the far right -->
        <div id="nav-extra" class="d-flex align-items-center">
            <a class="Nav-Split" data-bs-toggle="modal" data-bs-target="#modalBookingWarning" href="#"><?= BOOK ?></a>
            <a href="<?=BASE_PATH?>/account">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="" class="bi bi-person-fill account-image" viewBox="0 0 16 16" >
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
                <a href="<?=BASE_PATH?>/">
                     <img src="<?=BASE_PATH?>/Views/Images/logo.png" id="navbarLogo" alt="Logo">
                </a>
            </div>
        </div>
    </nav>
    <div class="full-screen-overlay" id="navbarMenu">
        <div class="menu-content">
            <a class="nav-item <?= ($currentPage == 'home') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/"><?= HOME ?></a>
            <a class="nav-item <?= ($currentPage == 'about') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/about"><?= ABOUT ?></a>
            <a class="nav-item <?= ($currentPage == 'services') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/services"><?= SERVICE ?></a>
            <a class="nav-item <?= ($currentPage == 'gallery') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/gallery"><?= GALLERY ?></a>
            <a class="nav-item <?= ($currentPage == 'reviews') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/reviews"><?= REVIEWS ?></a>
            <a class="nav-item <?= ($currentPage == 'contact') ? 'active' : ''; ?>" href="<?=BASE_PATH?>/contact"><?= CONTACT ?></a>
            <a class="nav-item lang"  onclick = "return changeLang()" href=""><?php echo $toggleText; ?></a>
            
            <!-- Row container for the "Book" and Account icon links -->
            <div class="nav-row">
                <a class="Nav-Split" id="book" data-bs-toggle="modal" data-bs-target="#modalBookingWarning" href="#"><?= BOOK ?></a>
                <a href="<?=BASE_PATH?>/account">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="" class="bi bi-person-fill account-image" viewBox="0 0 16 16" >
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>




</header>
<script>
    //lang
    let lang = "<?= lang ?>";


    function clearLangCookies() {
    const paths = ['/', '/SysDevOrange/account','/SysDevOrange/book' ,'/subpath']; // List all possible paths
    paths.forEach(path => {
        document.cookie = `lang=;path=${path};expires=Thu, 01 Jan 1970 00:00:00 UTC;`;
    });
}

function changeLang() {
    clearLangCookies(); // Ensure old cookies are removed

    let lang = "<?= lang ?>"; // Get current language from PHP
    lang = lang === "en" ? "fr" : "en"; // Toggle language

    // Set the new cookie for the root path
    document.cookie = `lang=${lang};path=/;`;

    console.log("New lang cookie set:", document.cookie); // Debugging log
    location.reload(); // Reload to apply changes
}

//mobile version
document.getElementById('menuToggle').addEventListener('click', function () {
    const navbarMenu = document.getElementById('navbarMenu');
    const body = document.body;

    if (navbarMenu.classList.contains('show')) {
        // Close the menu
        navbarMenu.style.opacity = "0";
        navbarMenu.style.visibility = "hidden";
        navbarMenu.classList.remove('show');
        body.classList.remove('no-scroll');
    } else {
        // Open the menu
        navbarMenu.style.opacity = "1";
        navbarMenu.style.visibility = "visible";
        navbarMenu.classList.add('show');
        body.classList.add('no-scroll');
    }
});
document.getElementById('book').addEventListener('click', function () {
        // Close the menu after pressing book
        navbarMenu.style.opacity = "0";
        navbarMenu.style.visibility = "hidden";
        navbarMenu.classList.remove('show');
        body.classList.remove('no-scroll');
});
</script>

