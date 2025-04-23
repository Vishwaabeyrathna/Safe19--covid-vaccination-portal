<?php

if (isset($_GET["status"])) {
    echo '<script>
    setTimeout(function() {
        alert("' . $_GET["status"] . '");
    }, 1000); </script>';
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Guest Registration</title> 
    <link rel="stylesheet" href="css/guest_regis.css">
</head>

<body>

    <div class="userform">
        <h1>Guest Registration</h1>
        <form id="registration-form" method="POST" action="./processes/registerProcess.php">
            <h3>01. Personal Information</h3>
            <div class="form-group">
                <label for="full-name">Full Name</label>
                <input type="text" id="full-name" name="full_name" placeholder="*Full Name" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="mobile" placeholder="*Phone Number" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="*Email" required>
            </div>
            <div class="form-group">
                <label for="dob">Date Of Birth</label>
                <input type="date" id="dob" name="dob" placeholder="DD/MM/YYYY" required>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <div class="radio-group">
                    <input type="radio" id="male" name="gender" value="male" checked>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="nic">NIC Number</label>
                <input type="text" id="nic" name="nic" placeholder="*20004090200" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="*Address" required>
            </div>

            <h3>02. Medical information</h3>
            <div class="form-group">
                <label for="vaccination-history">Vaccination History (Fully Vaccinated)</label>
                <select id="vaccination-history" name="vaccination_history" required>
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="medical-history">Medical History (Allergies)</label>
                <select id="medical-history" name="medical_history" required>
                    <option value="0">None</option>
                    <option value="1">Have Allergies</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Enter Your Password</label>
                <input type="password" id="password" name="password" placeholder="*Enter Your Password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Re-enter Password</label>
                <input type="password" id="confirm-password" name="confirm_password" placeholder="*Re Enter Password"
                    required>
            </div>
            <div class="form-group">
                <input type="checkbox" id="terms" name="terms" required>Terms & Condition
                <p>Any personal data shared is treated confidentially according to our privacy policy. You agree to use
                    the platform responsibly, refraining from unlawful activities. We reserve the right to terminate
                    guest registration for violations. These terms may change without notice, and your continued use
                    indicates acceptance.</p>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" id="register-btn">Register</button>
            </div>
            <br>
            <center>
                <p class="create-account">Already Have a Account ? <a href="./login.php" class="create-account-link">Log
                        In</a></p>
            </center>
        </form>
    </div>

</body>

</html>