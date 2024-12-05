<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
?>

<?php include_once 'Views/nav.php'; ?>
<?php include_once 'Views/bookingModal.php'; ?>


<main class="container py-4">
    <div>
        <div class="green-background text-secondary  container slide-up ">
            <div class=" pb-5">
                <h1 class="mt-5 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center">
                    <?= VIEW_BOOKING ?></h1>
            </div>
        </div>
    </div>

    <div class="my-2 mx-3 on">
        <div>
            <div class="form-group  my-1">
                <label for="staticEmail" class=" col-form-label canvaSans-fontstyle "><?= PRICE ?></label><br>
                <div class="col-sm-10 border bg-light  p-1">
                    <input type="text" readonly class="form-control-plaintext " id="staticEmail"
                           value="<?= $data["booking"]->price ?>">
                </div>
            </div>
            <div class="form-group  my-3">
                <label for="staticEmail" class=" col-form-label canvaSans-fontstyle"><?= MESSAGE_REVIEW ?></label><br>
                <div class="col-sm-10 border bg-light p-1">
                    <input type="text" readonly class="form-control-plaintext " id="staticEmail"
                           value="<?= $data["booking"]->message ?>">
                </div>
            </div>
            <div class="form-group  my-3">
                <label for="staticEmail" class=" col-form-label canvaSans-fontstyle "><?= BOOKED_ON ?></label><br>
                <div class="col-sm-10 border bg-light p-2">
                    <input type="text" readonly class="form-control-plaintext " id="staticEmail"
                           value="<?= $data["booking"]->bookedOn ?>">
                </div>
            </div>
            <div class="form-group  my-3">
                <label for="staticEmail" class=" col-form-label canvaSans-fontstyle "><?= PAYED_ON ?></label><br>
                <div class="col-sm-10 border bg-light p-2">
                    <input type="text" readonly class="form-control-plaintext  " id="staticEmail"
                           value="<?= $data["booking"]->payedOn ?>">
                </div>
            </div>
            <div class="form-group  my-3">
                <label for="staticEmail" class=" col-form-label canvaSans-fontstyle "><?= LOCATION ?></label><br>
                <div class="col-sm-10 border bg-light p-2">
                    <input type="text" readonly class="form-control-plaintext " id="staticEmail"
                           value="<?= $data["booking"]->location ?>">
                </div>
            </div>
            <?php
            foreach ($data["booking"]->getServices() as $service) :
                ?>
                <div class="form-group  my-3">
                    <label for="staticEmail" class=" col-form-label canvaSans-fontstyle "><?= SERVICE ?></label><br>
                    <div class="col-sm-10 border bg-light p-2">
                        <input type="text" readonly class="form-control-plaintext " id="staticEmail" value="<?= $service->name ?>">
                    </div>
                </div>
            <?php
            endforeach;
            ?>
            <?php
            foreach ($data["booking"]->getColors() as $color) :
                ?>
                <div class="form-group  my-3">
                    <label for="staticEmail" class=" col-form-label canvaSans-fontstyle "><?= COLOR ?></label><br>
                    <div class="col-sm-10 border bg-light p-2">
                        <input type="text" readonly class="form-control-plaintext " id="staticEmail" value="<?= $color->name ?>">
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>

</main>

<?php include_once 'Views/footer.php'; ?>

</body>
</html>