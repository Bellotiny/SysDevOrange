<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <?php
        $page = basename($_SERVER['PHP_SELF']); // Get the file name
        $page = pathinfo($page, PATHINFO_FILENAME); // Remove the file extension
        $page = ucfirst($page);
        if ($page == "home") { 
            $page = "Home";
            echo "home";
        }
        echo "<title>{$page}</title>"; 
       
    ?>
   
    <link rel="stylesheet" href="<?=BASE_PATH?>/Views/CSS/style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body class="">
    <!-- Include Bootstrap CSS in head.php -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <!-- Include Bootstrap js in head.php -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzbh1Yz6rZjixF1W8z4xGZ5VFMfbg0g5E7IlBRp1aCzj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--GOOGLE MAP API--->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoXn_Mhjl6UIT0kzatQQTuKAsAdz_5wF8&libraries=places"async defer></script>
      <!-- Include customize js in head.php -->
    <script src="<?=BASE_PATH?>/Views/Scripts/script.php"></script><!--general functions for each pages-->
    <script src="<?=BASE_PATH?>/Views/Scripts/nav_script.php"></script><!--script for the nav-->
    <script src="<?=BASE_PATH?>/Views/Scripts/home_script.js"></script><!--script for the home-->
    <script src="<?=BASE_PATH?>/Views/Scripts/about_script.js"></script><!--script for the about-->
    <!-- <script src="<?=BASE_PATH?>/Views/Scripts/book_script.js"></script>script for the book -->

