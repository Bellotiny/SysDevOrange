<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/bookingModal.php';
?>


<body id="services-body" class="background_color">
<?php include_once 'Views/nav.php'; ?>


<main class="container py-5">

  <div class="green-background text-secondary  container slide-up">
    <div class=" pb-5" >
      <h1 class="mt-5 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center">Services</h1>
    </div>
  </div>

    <?php
        foreach($data['services'] as $services){
            echo '<div class="row py-2  ">
                <div class="col-md-6 slide-up ">
                    <div class="services-card row g-0 border rounded overflow-auto flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-white">
                        <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">' . $services->type . '</strong>
                        <h3 class="mb-0">' . $services->name  . '</h3>
                        <div class="mb-1  text-success">' . $services->price . '</div>
                        <p class="card-text mb-auto ">' . $services->description . '</p>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="<?=BASE_PATH?>/Views/Images/pic2.jpg" alt="Thumbnail" width="200" height="250" class="img-fluid">
                        </div>
                    </div>
                </div>';
    
        }
    ?>
    

    <div class="mt-3 green-background text-secondary  container slide-up">
        <div class=" pb-5" >
            <h1 class="mt-2 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center">Color Swatches</h1>
        </div>
    </div>

    <div class="container marketing">

    <div class="row text-center py-3 slide-up">
              <!----here are the colors--->
              <?php
                foreach($data['colors'] as $colors){
                    echo '<div class="col-lg-2 mb-3  " >
                            <svg class="bd-placeholder-img rounded-circle"  onclick="selectColor(\'Color3\', \'None\', \'colorGroup3\')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="'.$colors->code.'"></rect></svg>
                            <h5 class="fw-normal">'.$colors->name.'</h5>
                        </div>';
                }
                ?>
          </div>
    </div>

    <!-- More colors -->
    <div class="col-6 col-sm-4 col-md-2 mb-3 color-item">
        <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Sky Blue', 'colorGroup3')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="RGB(135, 206, 235)"></rect>
        </svg>
        <h5 class="fw-normal">Sky Blue</h5>
    </div><!-- /.col-lg-2 -->

    <div class="col-6 col-sm-4 col-md-2 mb-3 color-item">
        <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Deep Purple', 'colorGroup3')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="RGB(75, 0, 130)"></rect>
        </svg>
        <h5 class="fw-normal">Deep Purple</h5>
    </div><!-- /.col-lg-2 -->

    <div class="col-6 col-sm-4 col-md-2 mb-3 color-item">
        <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Bold Orange', 'colorGroup3')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="RGB(255, 165, 0)"></rect>
        </svg>
        <h5 class="fw-normal">Bold Orange</h5>
    </div>

    <div class="col-6 col-sm-4 col-md-2 mb-3 color-item">
        <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Sunny Yellow', 'colorGroup3')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="RGB(255, 223, 0)"></rect>
        </svg>
        <h5 class="fw-normal">Sunny Yellow</h5>
    </div><!-- /.col-lg-2 -->

    <div class="col-6 col-sm-4 col-md-2 mb-3 color-item">
        <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Berry Pink', 'colorGroup3')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="RGB(199, 21, 133)"></rect>
        </svg>
        <h5 class="fw-normal">Berry Pink</h5>
    </div><!-- /.col-lg-2 -->

    <div class="col-6 col-sm-4 col-md-2 mb-3 color-item">
        <svg class="bd-placeholder-img rounded-circle" onclick="selectColor('Color3', 'Coral', 'colorGroup3')" width="40" height="40" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="RGB(255, 127, 80)"></rect>
        </svg>
        <h5 class="fw-normal">Coral</h5>
    </div>
</div>

    <!---pagination--->
    <div class="d-flex justify-content-center my-3">
      <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>
     </div>



</div>



</main>
<?php include_once 'Views/footer.php'; ?>
</body>
</html>
