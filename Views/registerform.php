
  
         <form method="POST">
          
            <div class="form-group py-2">
              <label for="firstName">First Name</label>
              <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $data["firstName"] ?? "" ?>" required>
            </div>
            <div class="form-group py-2">
              <label for="lastName">Last Name</label>
              <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $data["lastName"] ?? "" ?>" required>
            </div>
             <div class="form-group py-2">
                 <label for="email">Email</label>
                 <input type="email" class="form-control" id="email" name="email" value="<?= $data["email"] ?? "" ?>" required>
             </div>
            <div class="form-group py-2">
              <label for="birthDate">Birthday:</label>
              <input type="date" class="form-control"  id="birthDate" name="birthDate" value="<?= $data["birthDate"] ?? "" ?>">
            </div>
            <div class="form-group py-2">
              <label for="phoneNumber">Phone Number</label>
              <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" value="<?= $data["phoneNumber"] ?? "" ?>">
            </div>
            <div class="form-group py-2">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group py-2">
              <label for="confirmPassword">Confirm Password</label>
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            </div>
            <?php if (isset($data["error"])): ?>
             <p><span style="color:red"><?php echo $data['error']; ?></span></p>
            <?php endif; ?>
            <ul>
            Password must contain
              <li>1 uppercase</li>
              <li>1 lowercase</li>
              <li>1 number</li>
              <li>1 symbol</li>
              <li>Minimum of 6 characters</li>
            </ul>
            
            