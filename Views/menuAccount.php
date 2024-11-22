<button type="button" class="btn btn-secondary" id="menuButton">Menu</button>
<script>
    
    $(document).ready(function () {

        $("#menuButton").hide();
        // Sidebar toggle button click event
        $("#menuButton").click(function (e) {
            e.stopPropagation(); // Prevent click event from bubbling up to document
            const sidebar = $("#sidebar");
            const content = $("#content");

            if (sidebar.css("left") === "0px") {
                // Hide the sidebar
                sidebar.animate({ left: "-280px" }, 300);
                content.animate({ marginLeft: "0px" }, 300);
            } else {
                // Show the sidebar
                sidebar.css("display", "block").animate({ left: "0px" }, 300);
                content.animate({ marginLeft: "280px" }, 300);
            }
        });

        // Close sidebar if clicked outside of it
        $(document).click(function (e) {
            const sidebar = $("#sidebar");
            const menuButton = $("#menuButton");
            
            // Check if the click was outside the sidebar or the menu button
            if (!sidebar.is(e.target) && !menuButton.is(e.target) && sidebar.has(e.target).length === 0) {
                // Hide the sidebar
                sidebar.animate({ left: "-280px" }, 300);
                $("#content").animate({ marginLeft: "0px" }, 300);
            }
        });

        // Prevent click event from propagating to the document when clicking inside the sidebar
        $("#sidebar").click(function (e) {
            e.stopPropagation();
        });
    });
</script>



