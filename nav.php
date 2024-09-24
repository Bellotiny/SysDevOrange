
        <header>
        <div id="nav-container">
            <!-- First div with navigation links -->
            <div id="nav-main">
                <a class="nav-item" href="index.php">Home</a>
                <a class="nav-item" href="about.php">About</a>
                <a class="nav-item" href="services.php">Services</a>
                <a class="nav-item" href="gallery.php">Gallery</a>
                <a class="nav-item" href="contact.php">Contact</a>
            </div>

            <!-- Second div with the Book link and the account image -->
            <div id="nav-extra">
                <a class="Nav-Split" href="book.php">Book</a>
                <a href="account.php">
                    <img id="account_img" src="Images/account.png" >
                </a>
                
            </div>
        </div>

        <script>
            $(document).ready(function () {
            
                var currentPage = window.location.pathname.split("/").pop();

                // Highlight the link that matches the current page URL
                $('#nav-main > a[href="' + currentPage + '"]').css('background-color', '#1b613e').css('color', '#fadadd')

                $('#nav-main > a').click(function (e) {
                    // Clear the background color of all links
                    $('#nav-main > a').css('background-color', 'transparent').css('color', '#1b613e');

                    // Apply background color to the clicked link
                    $(this).css('background-color', '#1b613e').css('color', '#fadadd').css('vertical-align', 'center');

                    var selectedHref = $(this).attr('href');
                    localStorage.setItem('activeLink', selectedHref);
                });
                localStorage.removeItem('activeLink');
            });
        </script>
        </header>