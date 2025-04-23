<?php

require "../processes/db.php";

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

  <div class="profile-section">
    <div class="profile-header">
      <span class="userprofile">User Profile</span>
      <a href="../views/index.php">
        <button class="logout">Home</button>
      </a>
    </div>
  </div>



  <div class="account-info">
    <h2>Account Information</h2>

    <form action="../processes/profileUpdateProcess.php" method="POST">

      <div class="form-group">
        <label for="full-name">Full Name*</label>
        <input type="text" id="full-name" name="full_name" placeholder="Full Name" required>
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" placeholder="Address" required>
      </div>
      <div class="form-group">
        <label for="nic">NIC Number</label>
        <input type="text" id="nic" name="nic" placeholder="NIC Number" required>
      </div>
      <div class="form-group">
        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
          <?php
          if ($_SESSION["user"]["gender_genderId"] == 1) {
          ?>
            <option value="1" selected>Male</option>
            <option value="2">Female</option>
          <?php
          } elseif ($_SESSION["user"]["gender_genderId"] == 2) {
          ?>
            <option value="2" selected>Female</option>
            <option value="1">Male</option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="birth-date">Birth Date</label>
        <input type="date" id="birth-date" name="dob" placeholder="DD/MM/YYYY" required>
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
      <div class="form-group">
        <label for="vaccination-history">Vaccination History (Fully Vaccinated)</label>
        <select id="vaccination-history" name="vaccination_history" required>
          <?php
          if ($_SESSION["user"]["vaccinationHistory"] == 0) {
          ?>
            <option value="0" selected>No</option>
            <option value="1">Yes</option>
          <?php
          } elseif ($_SESSION["user"]["vaccinationHistory"] == 1) {
          ?>
            <option value="0">No</option>
            <option value="1" selected>Yes</option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="medical-history">Medical History (Allergies)</label>
        <select id="medical-history" name="medical_history" required>
          <?php
          if ($_SESSION["user"]["medicalHistory"] == 0) {
          ?>
            <option value="0" selected>None</option>
            <option value="1">Have Allergies</option>
          <?php
          } elseif ($_SESSION["user"]["medicalHistory"] == 1) {
          ?>
            <option value="0">None</option>
            <option value="1" selected>Have Allergies</option>
          <?php
          }
          ?>
        </select>
      </div>
      <button class="update" name="update">Update</button>
      <button class="delete-profile" name="delete">Delete Profile</button>

    </form>
  </div>


</body>

</html>