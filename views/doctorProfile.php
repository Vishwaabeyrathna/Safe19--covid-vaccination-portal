<?php

require "../processes/db.php";

if (isset($_GET["status"])) {
  echo '<script>
  setTimeout(function() {
      alert("' . $_GET["status"] . '");
  }, 1000); </script>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>
  <link rel="stylesheet" href="../css/user_profile.css">
</head>

<body>



  <div class="account-info">
    <h2>Account Information</h2>

    <form action="./processes/doctorProfileUpdateProcess.php" method="POST">

      <div class="form-group">
        <label for="full-name">Full Name*</label>
        <input type="text" id="full-name" name="full_name" placeholder="Full Name" required>
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" placeholder="Address" required>
      </div>
      <div class="form-group">
        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
          <?php
          if ($_SESSION["doctor"]["gender_genderId"] == 1) {
          ?>
            <option value="1" selected>Male</option>
            <option value="2">Female</option>
          <?php
          } elseif ($_SESSION["doctor"]["gender_genderId"] == 2) {
          ?>
            <option value="2" selected>Female</option>
            <option value="1">Male</option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="mobile" placeholder="Phone" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>

      <button class="update" name="update">Update</button>
      <button class="delete-profile" name="delete">Delete Profile</button>

    </form>
  </div>


</body>

</html>