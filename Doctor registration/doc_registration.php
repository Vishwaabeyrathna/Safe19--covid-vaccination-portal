<?php 


?>
<!DOCTYPE html>
<html>

<head>
    <title>Doctor Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="userform">
        <h1>Doctor Registration</h1>
        <form id="registrationForm" method="post" action="..\Doctor registration\register.php" enctype="multipart/form-data" class="userform">
            <h3>01. Personal Information</h3>
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" placeholder="*Full Name" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="*Address" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" placeholder="*Phone Number" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="*Email" required>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <div class="radio-group">
                    <input type="radio" id="male" name="gender" value="male" required>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                    <input type="radio" id="other" name="gender" value="other">
                    <label for="other">Other</label>
                </div>
            </div>
            <div class="form-group">
                <label for="medical_license">Medical License Number</label>
                <input type="text" id="medical_license" name="medical_license" placeholder="*Medical License Number" required>
            </div>
            <div class="form-group">
                <label for="nic">NIC Number</label>
                <input type="text" id="nic" name="nic" placeholder="*NIC Number" required>


            <h3>02. Professional Information</h3>
            <div class="form-group">
                <label for="speciality">Speciality</label>
                <select id="speciality" name="speciality" required>
                    <option value="">Select Speciality</option>
                    <option value="Cardiology">Cardiology</option>
                    <option value="Dermatology">Dermatology</option>
                    <option value="Endocrinology">Endocrinology</option>
                    <option value="Immunology">Immunology</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="experience">Years of Experience</label>
                <input type="text" id="experience" name="experience" placeholder="*Years of Experience" required>
            </div>
            <div class="form-group">
                <label for="hospital">Hospital/Affiliation</label>
                <input type="text" id="hospital" name="hospital" placeholder="*Hospital/Affiliation" required>
            </div>
            <div class="form-group">
                <label for="availability">Availability</label>
                <select id="availability" name="availability" required>
                    <option value="">Select Availability</option>
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Contract">Contract</option>
                </select>
            </div>

            <h3>03. Account Information</h3>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="*Password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Re-enter Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="*Re-enter Password" required>
                <span id="passwordError" style="color: red;"></span>
            </div>
            <div class="form-group">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">I agree to the Terms and Conditions</label>
            </div>

            <div class="form-group">
                <a href="../viwes/login.php"><button type="submit" name="submit" id="register-btn">Register</button></a>
            </div>
            
        </form>
    </div>
    <script>
        document.getElementById("registrationForm").addEventListener("submit", function(event) {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;

            if (password !== confirmPassword) {
                document.getElementById("passwordError").textContent = "Passwords do not match";
                event.preventDefault();
            }
        });
    </script>
    <?php include '../views/footer.php'; ?>
</body>

</html>
