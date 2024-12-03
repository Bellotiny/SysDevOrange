<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<body id="contact" class="background_color">
<?php
include_once 'Views/nav.php';
include_once 'Views/bookingModal.php';
?>


<main class="container my-5">

    <div class="row justify-content-center card-container pt-5 slide-up">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0">
                <!-- Card Header -->
                <div class="card-header">
                    <h1 class="custom-header display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up"><?= CONTACT_US ?></h1>
                </div>

                <!-- Card Body -->
                <div class="card-body p-4">
                    <?= CONFIRM_MESSAGE ?>
                </div>
                <div class="d-grid">
                    <a href="<?=BASE_PATH?>" class="btn bttn-green slide-up"><?= BACK_TO_HOME ?></a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once 'Views/footer.php'; ?>

</body>
</html>
