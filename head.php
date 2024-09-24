

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="jquery-3.7.1.min.js"></script>
        <?php
            $page = basename($_SERVER['PHP_SELF']); // Get the file name
            $page = pathinfo($page, PATHINFO_FILENAME); // Remove the file extension
            $page = ucfirst($page);
            if($page == "Index") {
                $page = "Home";
            }
            echo "<title>${page}</title>";
        ?>
        <link rel="stylesheet" href="CSS/style.css">
    </head>