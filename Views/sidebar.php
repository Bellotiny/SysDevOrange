         <div class="d-flex flex-column flex-shrink-0 p-3 bg-light slide-up" style="width: 280px; height: 90vh;" id="sidebar">
          <a href="<?=BASE_PATH?>/account" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4"><?= ACCOUNT ?></span>
          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
              <a href="<?=BASE_PATH?>/account/personalInformation" class="nav-link link-dark" aria-current="page">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                <?= PERSONAL_INFO ?>
              </a>
            </li>
            
            <li >
              <a href="<?=BASE_PATH?>/account/history" class="nav-link link-dark" id="loadBookingHistory">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                <?= BOOKING_HISTORY ?>
              </a>
            </li> 
            <?php if ($this->checkAuthorization("schedule") === true): ?>
            <li>
              <a  href="<?= BASE_PATH ?>/account/schedule" class="nav-link link-dark">
                  <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#table"></use>
                  </svg>
                <?=  SCHEDULE ?> 
              </a>
            </li>
            <?php endif; ?>
            <?php if ($this->checkAuthorization("schedule") === true): ?>
            <li>
              <a href="<?=BASE_PATH?>/account/inventory" class="nav-link link-dark">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                <?= INVENTORY ?>
              </a>
            </li>
            <?php endif; ?>
          </ul>
          <hr>
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
              
              <strong><?= $this->user->firstName . " " . $this->user->lastName ?></strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
              <li><a class="dropdown-item" href="<?=BASE_PATH?>/account/edit"><?= EDIT_PROFILE ?></a></li>
              <li><a class="dropdown-item" href="<?=BASE_PATH?>/account/change-password"><?= CHANGE_PASSWORD ?></a></li>
              <li><a class="dropdown-item" href="<?=BASE_PATH?>/account/delete"><?= DELETE_PROFILE ?></a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?=BASE_PATH?>/account/logout"><?= SIGN_OUT ?></a></li>
            </ul>
          </div>
        </div>
        <script>
        $(document).ready(function() {
            // Get the current URL path
            var currentPath = window.location.pathname;
            var isActiveFound = false;


            // Loop through each link in the sidebar
            $('.nav-link').each(function() {
                var linkPath = $(this).attr('href');

                // Check if the link's href matches the current path
                if (linkPath && currentPath.includes(linkPath)) {
                    $(this).addClass('active');
                    isActiveFound = true;
                }
            });
            if (!isActiveFound) {
                $('.nav-link').first().addClass('active');
            }
        });
        </script>