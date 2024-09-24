<?php include_once "head.php" ?>
<body>
<header>
      <nav id="nav"></nav>
      </header>
  <main>
  <div id="service-grid">
    <div id="left-column">
        <div id="top_left_service">
            <h3 class="service_left_description">Base Price Extension</h3>
            <p class="left_price">45 CAD</p>
        </div>
        <div id="bottom_left_service">
            <div class="bottom_info"> <!--This will separate the description from the price-->
                <h3 class="service_left_description">Nail Art</h3>
                <p class="extra_service_detail">Per Finger</p> 
            </div>
            <p class="left_price">5 CAD</p>
        </div>
    </div>
    
    <div id="service_main"> <!-- Center column with the main content -->
      <div id="service_h1_div">
        <h1 id="service_h1">Services</h1>
      </div>
    </div>
    
    <div id="right-column">
        <div id="top_right_service">
            <p class="right_price">35 CAD</p>
            <h3 class="service_right_description">Base Price</h3>
        </div>
        <div id="bottom_right_service">
            <p class="right_price">5 CAD</p>
            <div class="bottom_info">
                <h3 class="service_right_description">French Tips</h3>
                <p class="extra_service_detail">Plus Base</p>
            </div>

        </div>
    </div> <!-- Empty right column for the 40% width -->
  </div>

  <div id="add-service-grid">
    <div id="add-left-column">
        <div id="add_left_service">
            <h3 class="add_service_left_description">Nail Take Off</h3>
            <p class="add_left_price">10+ CAD</p>
        </div>
        <div id="add_bottom_left_service">
            <div id="add_bottom_info"> <!--This will separate the description from the price-->
                <h3 class="add_service_left_description">Pre-Painted <br> Nail Art</h3> 
            </div>
            <p class="add_left_price">Price given <br> after consultation</p>
        </div>
    </div>
    
    
    <div id="add_service_main"> <!-- Center column with the main content -->
      <div id="add_service_h1_div">
        <h1 id="add_service_h1">Additonal Services</h1>
      </div>
    </div>
    
    <div id="add-right-column">
        <div id="add_right_service">
            <p class="add_right_price">10+ CAD</p>
            <h3 class="add_service_right_description">Nail Polish Change</h3>
        </div>

    </div> <!-- Empty right column for the 40% width -->
  </div>
  <?php
      include_once "footer.php"
  ?>
  <script src="script.js"></script>
</body>
</html>
