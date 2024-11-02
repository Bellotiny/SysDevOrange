document.addEventListener("DOMContentLoaded", function() {
    console.log("Nav Script is connected and DOM is fully loaded!");
  
//1. NAV.PHP - highlighting the present page in the navigator

     // Extract the controller from the URL
     var urlParams = new URLSearchParams(window.location.search);
     var currentController = urlParams.get('controller') || 'home'; // Default to 'home'

     // Highlight the link that matches the current controller
    $('#nav-main > a').each(function() {
        var href = $(this).attr('href');

        if (href.includes('controller=' + currentController)) {
            $(this).css('background-color', '#1b613e').css('color', '#fadadd');
        }
    });

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