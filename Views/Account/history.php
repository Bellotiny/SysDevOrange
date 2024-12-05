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
        <div class="w-100 slide-up">
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
                        <div class="d-flex align-items-center py-2">
                            <div class="w-100 ">
                                <p class="card-text mb-auto"><?= $booking->message ? "Message: " . $booking->message : "" ?></p>
                                <p class="card-text mb-auto"><?= LOCATION ?> <?= $booking->location ?? "Owner's place" ?></p>
                                <div>
                                    <?php if ($booking->discount) : ?>
                                        <h5 class="mb-0"><?= DISCOUNT_BREAKDOWN ?></h5>
                                        <p class="card-text mb-auto"><?= ORIGINAL_PRICE ?><?= $booking->price ?></p>
                                        <p class="card-text mb-auto"><?= $booking->discount->amount ? $booking->discount->name . ": -" . $booking->discount->amount . "$" : "" ?></p>
                                        <p class="card-text mb-auto"><?= $booking->discount->percent ? $booking->discount->name . ": -" . $booking->discount->percent . "%" : "" ?></p>
                                    <?php endif; ?>
                                    <h3 class="mb-0"><?= TOTAL_ACCOUNT_HISTORY ?><?= $booking->getFinalPrice() ?></h3>
                                </div>
                                <p class="card-text mb-auto"><?= BOOKED_ON ?> <?= date("Y-m-d H:i", strtotime($booking->bookedOn)) ?></p>
                                <p class="card-text mb-auto"><?= $booking->payedOn ? "Payed: " . date("Y-m-d H:i", strtotime($booking->payedOn)) : "" ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <strong class="d-inline-block mb-2 text-primary-emphasis "><?= DATE ?> <?= $date ?> <?= $start ?> - <?= $end ?></strong>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
<!---->
<!--        <div class="album py-5 bg-body-tertiary">-->
<!--            <div class="container">-->
<!--                <div class="container my-2">-->
<!--                    --><?php //include_once 'Views/menuAccount.php'; ?>
<!--                </div>-->
<!--                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-center text-center"-->
<!--                     id="content">-->
<!--                    --><?php //foreach ($data["availabilities"] as $availability): ?>
<!--                        <div class="col">-->
<!--                            <div class="card shadow-sm">-->
<!--                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"-->
<!--                                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"-->
<!--                                     preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>-->
<!--                                    <rect width="100%" height="100%" fill="#55595c"></rect>-->
<!--                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>-->
<!--                                </svg>-->
<!--                                <div class="card-body">-->
<!--                                    <p class="card-text">This is a wider card with supporting text below as a natural-->
<!--                                        lead-in to additional content. This content is a little bit longer.</p>-->
<!--                                    <div class="d-flex justify-content-between align-items-center">-->
<!--                                        <div class="btn-group">-->
<!--                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>-->
<!--                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>-->
<!--                                        </div>-->
<!--                                        <small class="text-body-secondary">9 mins</small>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //endforeach; ?>
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <!---pagination--->
<!--        <div class="d-flex justify-content-center my-3">-->
<!--            <nav aria-label="Page navigation example">-->
<!--                <ul class="pagination">-->
<!--                    <li class="page-item"><a class="page-link" href="#">--><?php //= PREVIOUS ?><!--</a></li>-->
<!--                    <li class="page-item"><a class="page-link" href="#">1</a></li>-->
<!--                    <li class="page-item"><a class="page-link" href="#">2</a></li>-->
<!--                    <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--                    <li class="page-item"><a class="page-link" href="#">--><?php //= NEXT ?><!--</a></li>-->
<!--                </ul>-->
<!--            </nav>-->
<!--        </div>-->
    </div>

</main>
<!-- Include scripts here -->
<?php include_once 'Views/Scripts/accountImportantScript.php'; ?>
</body>
</html>