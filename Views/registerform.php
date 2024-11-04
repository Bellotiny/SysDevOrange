
  
         <form method="POST">
          
            <div class="form-group py-2">
              <label for="firstName">First Name</label>
              <input type="text" class="form-control" id="firstName" name="firstName" required>
            </div>
            <div class="form-group py-2">
              <label for="lastName">Last Name</label>
              <input type="text" class="form-control" id="lastName" name="lastName" required>
            </div>
            <div class="form-group py-2">
              <label for="birthDate">Birthday:</label>
              <input type="date" class="form-control"  id="birthDate" name="birthDate" >
            </div>
            <div class="form-group py-2">
              <label for="phoneNumber">Phone Number</label>
              <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
            </div>
            <div class="form-group py-2">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
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
                <span style="color:red"><p><?php echo $data['error']; ?></p></span>
            <?php endif; ?>
            <ul>
            Password must contain
              <li>1 uppercase</li>
              <li>1 lowercase</li>
              <li>1 number</li>
              <li>1 symbol</li>
              <li>Minimum of 6 characters</li>
            </ul>
            
            