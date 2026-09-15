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
                        <form autocomplete="on" action="<?=BASE_PATH?>/contact" method="POST">
                            <div class="form-group mb-3">
                                <label for="email" class="form-label"><?= EMAIL ?></label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <!-- First Name -->
                            <div class="form-group mb-3">
                                <label for="firstName" class="form-label"><?= FIRST_NAME ?></label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                            </div>
                            <!-- Last Name -->
                            <div class="form-group mb-3">
                                <label for="lastName" class="form-label"><?= LAST_NAME ?></label>
                                <input type="text" class="form-control" id="lastName" name="lastName" required>
                            </div>
                            <!-- Message -->
                            <div class="form-group mb-4">
                                <label for="message" class="form-label"><?= MESSAGE_REVIEW ?></label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn bttn-green slide-up"><?= SEND ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <?php include_once 'Views/footer.php'; ?>
   
</body>
</html>
