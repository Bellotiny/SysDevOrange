<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
include_once 'Views/bookingModal.php';
?>

    <body class="">
    <?php include_once 'Views/nav.php'; ?>
    
    
    <main class="d-flex flex-grow-1 max-vh-100" id="account-Main">
    <?php include_once 'Views/sidebar.php'; ?>
    <!-- Added inline style so navbar does not clip the text -->
    <div class="sideScreen container" style="margin-top: 4%;">
        <p>Name: <?= $data[0]->firstName . " " . $data[0]->lastName ?></p>
        <p>Email: <?= $data[0]->email ?></p>
        <p>Phone Number: <?= $data[0]->phoneNumber ?></p>
        <p>Birthday: <?= $data[0]->birthDate ?></p>
</main>

      <!-- Include scripts here -->
<script src="<?=BASE_PATH?>/Views/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="<?=BASE_PATH?>/Views/script.js"></script>

      </div>
      
    </body>
</html>