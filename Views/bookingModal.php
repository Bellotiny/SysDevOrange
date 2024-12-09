  <!-- Modal for Booking -->
  <div class="modal fade" id="modalBookingWarning" tabindex="-1" role="dialog" aria-labelledby="modalBookingWarningTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalBookingWarningTitle"><?= BOOKING_INFO ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <h4><?= BOOKING_RULES ?></h4>
                        <ul>
                            <li><strong><?= CLIENT_MUST_PAY ?> <span style="color: #d9534f;">$10</span> <?= UPON_BOOKING ?></strong><?= BE_DEUCTED ?></li>
                            <li><strong><?= YOU_MUST_AT_LEAST ?> <span style="color: #d9534f;"><?= ONE_COLOR ?></span>.</strong></li>
                            <li><strong><?= HOME_CONDITION ?><span style="color: #d9534f;"><?= CERTAIN_RANGE ?></span>.</strong></li>
                            <li><strong><?= THERE_ARE ?><span style="color: #d9534f;"><?= CATS ?></span><?= IN_MY_PLACE ?></strong></li>

                        </ul>
                        <hr>
                        <input class="form-check-input" type="checkbox" value="" id="bookingCheckBox">
                        <label class="form-check-label" for="flexCheckDefault">
                            <strong><?= READ_REMINDERS ?></strong>
                        </label>
                    </div>
                    <div class="container d-flex justify-content-center gap-4 my-5">
                      <a class="btn btn-primary w-50" href="<?=BASE_PATH?>/home" role="button"><?= CANCEL?></a>
                      <a class="btn btn-primary w-50 disabled" id="confirmButton" href="<?=BASE_PATH?>/book" role="button" ><?= CONFIRM ?></a>
                    </div>
                </div>
            </div>
  </div>
