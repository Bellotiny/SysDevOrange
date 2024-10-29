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
   
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/Views/CSS/style.css"> 
      <!-- Include Bootstrap CSS in head.php -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <!-- Include Bootstrap js in head.php -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
