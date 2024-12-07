<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
include_once 'Views/bookingModal.php';
?>

<body>
<?php include_once 'Views/nav.php'; ?>

<main class="d-flex max-vh-100" id="account-Main">
    <?php include_once 'Views/sidebar.php'; ?>

    <!---screen for sidebar--->
    <div class="sideScreen slide-up">
        <!---default content will be the Personal info-->
        <!--content is load here-->
        <div class="w-100 slide-up container  my-2">
        <?php include_once 'Views/menuAccount.php'; ?>
            <div class="container mx-3">
                <div class="row">
            
                <?php
                    if ($data["availabilities"]) {
                        echo "<hr>";
                        $end = null;
                        for ($i = 0; $i < count($data["availabilities"]); $i++) {
                            $availability = $data["availabilities"][$i];
                            if ($availability->booking->id !== ($data["availabilities"][$i - 1] ?? null)?->booking->id) {
                                $end = date("H:i", strtotime($availability->timeSlot) + 30 * 60);
                            }
                            if ($availability->booking->id !== ($data["availabilities"][$i + 1] ?? null)?->booking->id) {
                                $booking = $availability->booking;
                                $date = date("Y-m-d", strtotime($availability->timeSlot));
                                $start = date("H:i", strtotime($availability->timeSlot));
                                ?>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                                    <div class="card p-2" style="width: 18rem;">

                                        <div class="card-body">
                                            <?= $availability->booking->id  ?>
                                            <a  href="<?=BASE_PATH?>/account/deleteavailability/<?= $availability->booking->id ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                                </svg>
                                            </a>
                                            <hr>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Message:</h5>
                                            <p class="card-text"> <?= $booking->message ? $booking->message : "None" ?></p>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?= LOCATION ?> </h5>
                                            <p class="card-text"> <?= $booking->location ?? "Owner's place" ?></p>
                                        </div>
                                        <hr>
                                        <ul class="list-group list-group-flush ">
                                            <li class="list-group-item"><?= TOTAL_ACCOUNT_HISTORY ?><?= $booking->getFinalPrice() ?></li>
                                            <li class="list-group-item"><?= BOOKED_ON ?> <?= date("Y-m-d H:i", strtotime($booking->bookedOn)) ?></li>
                                            <li class="list-group-item"><?= $booking->payedOn ? PAYED . date("Y-m-d H:i", strtotime($booking->payedOn)) : "" ?></li>
                                            <li class="list-group-item"><?= DATE ?> <?= $date ?> <?= $start ?> - <?= $end ?></li>
                                            
                                        </ul>                                      
                                        <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#bookingDetails<?= $availability->booking->id ?>" aria-expanded="false" aria-controls="#bookingDetails<?= $availability->booking->id ?>"><?= VIEW_MORE_DETAILS  ?></button>
                                       
                                        <div class="card-body  collapse" id="bookingDetails<?= $availability->booking->id?>">
                                            <h5 class="card-title"><?= DISCOUNT_BREAKDOWN ?></h5>
                                            <div class="list-group">
                                                <div class="list-group-item">
                                                    <strong><?= ORIGINAL_PRICE ?>:</strong> <?= $booking->price ?>
                                                </div>

                                                <?php if (isset($booking->discount) && $booking->discount !== null): ?>
                                                    <div class="list-group-item">
                                                        <strong><?= $booking->discount->amount ? $booking->discount->name : "No discount amount" ?>:</strong> <?= $booking->discount->amount ? $booking->discount->amount . "$" : "" ?>
                                                    </div>
                                                    <div class="list-group-item">
                                                        <strong><?= $booking->discount->percent ? $booking->discount->name : "No discount percent" ?>:</strong> <?= $booking->discount->percent ? $booking->discount->percent . "%" : "" ?>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="list-group-item">
                                                        <strong><?= NO_DISCOUNT ?>:</strong> <?= NO_DISCOUNT ?>
                                                    </div>
                                                    <div class="list-group-item">
                                                        <strong><?= NO_DISCOUNT ?>:</strong> <?= NO_DISCOUNT ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    
                                    </div>
                                </div>

                        <?php
                            }
                        }
                    }
                    ?>

                </div>

            </div>
   
    
        </div>


    </div>
    

</main>
<!-- Include scripts here -->
<?php include_once 'Views/Scripts/accountImportantScript.php'; ?>
</body>
</html>