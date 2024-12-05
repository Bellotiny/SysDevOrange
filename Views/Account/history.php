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
                                            <h5 class="card-title">Message:</h5>
                                            <p class="card-text"> <?= $booking->message ? $booking->message : "" ?></p>
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
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"><?= ORIGINAL_PRICE ?></th>
                                                        <?php if (isset($booking->discount) && $booking->discount !== null): ?>
                                                            <th scope="col"><?= $booking->discount->amount ? $booking->discount->name : "No discount amount" ?></th>
                                                            <th scope="col"><?= $booking->discount->percent ? $booking->discount->name : "No discount percent" ?></th>
                                                        <?php else: ?>
                                                            <th scope="col"><?= NO_DISCOUNT ?></th>
                                                            <th scope="col"><?= NO_DISCOUNT ?></th>
                                                        <?php endif; ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"><?= $booking->price ?></th>
                                                        <td><?= isset($booking->discount) && $booking->discount !== null ? $booking->discount->amount . "$" : "" ?></td>
                                                        <td><?= isset($booking->discount) && $booking->discount !== null ? $booking->discount->percent . "%" : "" ?></td>
                                                    
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
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