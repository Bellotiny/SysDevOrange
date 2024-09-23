<?php include_once "head.php" ?>
    <body id="contact">
    <header>
  <nav id="nav"></nav>
  </header>

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
            <input type="submit">
        </form>
       </div>
       <div class="contact_footer">
       <?php include_once "footer.php"; ?>
       <script src="script.js"></script>
</div>
    </main>
    </body>
</html>
