<?php 
include_once ROOT . '/Views/head.php';
?>
<header class="d-flex">
    <div class="container">
        <div id="nav-container" class="d-flex justify-content-between align-items-center">
            <!-- First div with navigation links -->
            <div id="nav-main" class="d-flex ">
                <a class="nav-item" href="<?php echo BASE_URL; ?>/index.php?controller=home">Home</a>
                <a class="nav-item" href="<?php echo BASE_URL; ?>/index.php?controller=about">About</a>
                <a class="nav-item" href="<?php echo BASE_URL; ?>/index.php?controller=services">Services</a>
                <a class="nav-item" href="<?php echo BASE_URL; ?>/index.php?controller=gallery">Gallery</a>
                <a class="nav-item" href="<?php echo BASE_URL; ?>/index.php?controller=contact">Contact</a>
            </div>

            <!-- Second div with the Book link and the account image -->
            <div id="nav-extra" class="d-flex align-items-center">
                <a class="Nav-Split" data-bs-toggle="modal" data-bs-target="#modalBookingWarning" href="#">Book</a>
                <a href="<?php echo BASE_URL; ?>/index.php?controller=account&action=index">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                </a>
               
            </div>
        </div>
    </div>
    

</header>
