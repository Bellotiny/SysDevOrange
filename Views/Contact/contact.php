<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<body id="contact" class="background_color">
    <?php include_once ROOT . '/Views/nav.php'; ?> 

    <main class="container mt-5">

        <div class="row justify-content-center card-container">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0">
                    <!-- Card Header -->
                    <div class="card-header">
                        <h1 class="custom-header">Contact Us</h1>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-4">
                        <form autocomplete="on">
                            <!-- First Name -->
                            <div class="form-group mb-3">
                                <label for="contact_fname" class="form-label">First Name:</label>
                                <input type="text" class="form-control" id="contact_fname" name="contact_fname" required>
                            </div>
                            <!-- Last Name -->
                            <div class="form-group mb-3">
                                <label for="contact_lname" class="form-label">Last Name:</label>
                                <input type="text" class="form-control" id="contact_lname" name="contact_lname">
                            </div>
                            <!-- Message -->
                            <div class="form-group mb-4">
                                <label for="contact_message" class="form-label">Message:</label>
                                <textarea class="form-control" id="contact_message" name="contact_message" rows="5" required></textarea>
                            </div>
                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="mt-5">
        <?php include_once ROOT . '/Views/footer.php'; ?>
    </footer>

    <script src="script.js"></script>
</body>
</html>
