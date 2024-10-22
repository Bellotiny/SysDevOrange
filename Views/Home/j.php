
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
        echo "<title>${page}</title>";
    ?>
    <link rel="stylesheet" href="http://localhost/SysDevOrange/Views/CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/5hb5A1z3k8+V7D5cIHJ8+JID8+EO5+8XNZD7r5" crossorigin="anonymous"></script>
</head>
<body>






<?php include_once ROOT . '/head.php'; ?>

  <body>
  <?php include_once ROOT . '/nav.php'; ?>

      <div id="homeImage"></div>

      <main class="container">
        <div class="row featurette">
          <div class="col-md-7">
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In egestas nisl vitae tristique tincidunt. Nam a condimentum urna, vitae interdum urna. Donec dignissim tincidunt ipsum et semper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi iaculis nunc ante, id congue sapien imperdiet sit amet. Praesent ac neque rutrum velit lobortis iaculis iaculis sed lacus. Praesent dictum sagittis ultrices. Nullam vitae dui mattis, mollis tortor id, euismod ligula. Integer a ligula magna. In hac habitasse platea dictumst. Aliquam erat volutpat. Donec scelerisque metus est.</p>
          </div>
          <div class="col-md-5">
          <img src="<?php echo ROOT; ?>/Images/about1.png" alt="Welcome image" class="img-fluid mx-auto" width="500" height="500">


            
          </div>
        </div>

      </main>
      <div class="row my-5 justify-content-center text-center bg-light p-5">
          <div class="col-lg-4">
            <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
            <p>Nail Care Tips & Dos and Don'ts </p>
            <p><a class="btn btn-secondary" href="#">View details »</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
            <p>The Importance of Professional</p>
            <p><a class="btn btn-secondary" href="#">View details »</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></svg>
            <p>The Benefits of Regular Manicures</p>
            <p><a class="btn btn-secondary" href="#">View details »</a></p>
          </div><!-- /.col-lg-4 -->
        </div>

        <div class="container my-5">
          <div class="position-relative p-5 text-center text-muted bg-body border border-dashed rounded-5 div-background">
            <button type="button" class="position-absolute top-0 end-0 p-3 m-3 btn-close bg-secondary bg-opacity-10 rounded-pill" aria-label="Close"></button>
            <svg class="bi mt-5 mb-3" width="48" height="48"><use xlink:href="#check2-circle"></use></svg>
            <h3 class="text-body-emphasis">Safe, Clean, and Beautiful Nails</h3>
            <p class="col-lg-6 mx-auto mb-4">
              This faded back jumbotron is useful for placeholder content. It's also a great way to add a bit of context to a page or section when no content is available and to encourage visitors to take a specific action.
            </p>
            <button class="btn btn-primary px-5 mb-5" type="button">
              Call to action
            </button>
          </div>
        </div>
  
      <?php 
        include_once "footer.php";
      ?>

    </body>
