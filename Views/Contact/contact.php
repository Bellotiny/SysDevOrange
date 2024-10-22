<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once ROOT . '/Views/head.php';
?>

<body id="contact">
    <?php include_once ROOT . '/Views/nav.php'; ?> 

    <main id="contact_main">
        <br>
        <div id="contact_h1_div">
            <h1 id="contact_h1">Contact Us</h1>    
        </div>
       <div id="contact_form">
        <form autocomplete="on">
            <div class="form-group">
                <label for="contact_fname">First Name:</label>
                <input type="text" id="contact_fname" name="contact_fname" required>
            </div>
            <div class="form-group">
                <label for="contact_lname">Last Name:</label>
                <input type="text" id="contact_lname" name="contact_lname">
            </div>
            <div class="form-group">
                <label for="contact_message">Message:</label>
                <textarea id="contact_message" name="contact_message" rows="5" required></textarea>
            </div>
            <?= "<input type=\"submit\" value=\"Send\">" ?> 
        </form>
       </div>
       <div class="contact_footer">
       
<?php include_once ROOT . '/Views/footer.php'; ?>
       
</div>
    </main>
    <script src="script.js"></script>
    </body>
</html>
