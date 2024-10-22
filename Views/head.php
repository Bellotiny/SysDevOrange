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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</head>
<body>
