
  
         <form method="POST" action="<?=BASE_PATH?>/account/register" >
          
            <div class="form-group py-2">
              <label for="firstName"><?= FIRST_NAME ?></label>
              <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $data["firstName"] ?? "" ?>" required>
            </div>
            <div class="form-group py-2">
              <label for="lastName"><?= LAST_NAME ?></label>
              <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $data["lastName"] ?? "" ?>" required>
            </div>
             <div class="form-group py-2">
                 <label for="email"><?= EMAIL ?></label>
                 <input type="email" class="form-control" id="email" name="email" value="<?= $data["email"] ?? "" ?>" required>
             </div>
            <div class="form-group py-2">
              <label for="birthDate"><?= BIRTHDAY ?></label>
              <input type="date" class="form-control"  id="birthDate" name="birthDate" value="<?= $data["birthDate"] ?? "" ?>">
            </div>
            <div class="form-group py-2">
              <label for="phoneNumber"><?= PHONE_NUMBER ?></label>
              <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" value="<?= $data["phoneNumber"] ?? "" ?>">
            </div>
            <div class="form-group py-2">
              <label for="password"><?= PASSWORD ?></label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group py-2">
              <label for="confirmPassword"><?= CONFIRM_PASSWORD ?></label>
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            </div>
            <?php if (isset($data["error"])): ?>
             <p><span style="color:red"><?php echo $data['error']; ?></span></p>
            <?php endif; ?>
            <ul>
            <?= PASS_MUST_CONTAIN ?>
              <li>1 <?= UPPERCASE ?></li>
              <li>1 <?= LOWERCASE ?></li>
              <li>1 <?= NUMBER ?></li>
              <li>1 <?= SYMBOL ?></li>
              <li><?= MIN_SIX_CHAR ?></li>
            </ul>
            
            