<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Views/head.php';
?>

<?php include_once 'Views/nav.php'; ?>
<?php include_once 'Views/bookingModal.php'; ?>

<main class="container py-4">


    <div class="green-background text-secondary  container slide-up mb-3 ">
        <div class=" pb-5">
            <h1 class="mt-5 display-3 fw-bold text-green amsterdamThree-fontstyle text-shadow-pink slide-up text-center"><?= REVIEWS ?></h1>
        </div>
    </div>
    <form method="POST" class="mt-3 mb-3">
        <div class="d-flex flex-column flex-sm-row">
            <div class="flex-grow-1 mb-2 mb-sm-0 me-2">
                <label for="searchInput" class="form-label sr-only"><?= SEARCH ?></label>
                <input type="text" name="search" class="form-control" id="searchInput"
                       placeholder="<?= SEARCH_FOR_REVIEWS ?>" value="<?= $data["search"] ?? "" ?>">
            </div>
            <button type="submit" class="btn bttn-green w-40 w-sm-auto"><?= SEARCH ?></button>
        </div>
    </form>

    <div class="col-lg-6 col-xxl-4 my-5 mx-auto">
        <div class="d-grid gap-2">
            <a href="<?= BASE_PATH ?>/reviews/add" class="btn bttn-green slide-up" type="button"
               id="toggleReviewFormButton" aria-expanded="false">
                <i class="bi bi-pencil-square me-2"></i><?= WRITE_REVIEW ?>
            </a>
        </div>
    </div>


    <div class="w-100 slide-up">

        <?php foreach ($data['reviews'] as $review) { ?>
            <div class="d-flex align-items-center py-2 my-2">
                <div class="me-3">
                    <?php if ($review->image): ?>
                        <img src="<?= BASE_PATH ?>/<?= $review->image->getPath() ?>" alt="Review Image" class="rounded"
                             style="width: 200px; height: 200px;">
                    <?php else: ?>
                        <img src="<?= BASE_PATH ?>/Views/Images/background2.png" alt="Default Image" class="rounded"
                             style="width: 200px; height: 200px;  object-fit: cover;">
                    <?php endif; ?>
                </div>

                <div class="w-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Date -->
                        <strong class="d-inline-block mb-2 text-primary-emphasis"><?= htmlspecialchars($review->date) ?></strong>
                        <div>
                            <?php if ($this->verifyRights("edit")): ?>
                                <a href="<?= BASE_PATH ?>/reviews/delete/<?= $review->id ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                         class="bi bi-trash3 mx-3 text-primary-emphasis" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if ($this->verifyRights("delete")): ?>
                                <a href="<?= BASE_PATH ?>/reviews/edit/<?= $review->id ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                         class="bi bi-pencil-square text-primary-emphasis" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd"
                                              d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div>
                        <!-- Title comment -->
                        <h3 class="mb-0"><?= htmlspecialchars($review->title) ?></h3>
                        <!-- Comment -->
                        <p class="card-text mb-auto"><?= nl2br(htmlspecialchars($review->message)) ?></p>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                             class="bi bi-bullseye me-2" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10m0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8"/>
                            <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                        </svg>
                        <div class="mb-1 text-body-secondary"><?= htmlspecialchars($review->user->firstName) ?> <?= htmlspecialchars($review->user->lastName) ?></div>
                    </div>
                </div>
            </div>
        <?php } ?>


    </div>

    </div>


</main>

<?php include_once 'Views/footer.php'; ?>
</body>
</html>