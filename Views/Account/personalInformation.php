<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
?>

    <body class="">
    <?php include_once 'Views/nav.php'; ?>
    
    
    <main class="d-flex flex-grow-1 max-vh-100" id="account-Main">
    <?php include_once 'Views/sidebar.php'; ?>

    <div class="sideScreen container">
        <p>Name: <?= $data[0]->firstName . " " . $data[0]->lastName ?></p>
        <p>Email: <?= $data[0]->email ?></p>
        <p>Phone Number: <?= $data[0]->phoneNumber ?></p>
        <p>Birthday: <?= $data[0]->birthDate ?></p>
        <!-- Default content will be the Personal info -->
        <div class="d-flex justify-content-center gap-4 my-5" style="width: 100%;">
            <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/account/login" role="button">Login</a>
            <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/account/register" role="button">Register</a>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center my-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</main>

      <!-- Include scripts here -->
<script src="<?=BASE_PATH?>/Views/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="<?=BASE_PATH?>/Views/script.js"></script>

      </div>
      
    </body>
</html>