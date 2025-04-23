<?php
require 'config.php';

$id = 0;
if ($_GET['id'] != "") {
    $id = $_GET['id'];
} else {
    header("location:read.php");
}

    $sql = "SELECT fullname,address,dob,phone,email,gender,medical_license,nic,speciality,experience,hospital,availability,id FROM doctors WHERE id={$id}";
    $result = $conn->query($sql);


if($result->num_rows > 0) {

    
    $row = mysqli_fetch_assoc($result);

    $fullname = $row["fullname"];
    $address = $row["address"];
    $dob = $row["dob"];
    $phone = $row["phone"];
    $email = $row["email"];
    $gender = $row["gender"];
    $medical_license = $row["medical_license"];
    $nic = $row["nic"];
    $speciality = $row["speciality"];
    $experience = $row["experience"];
    $hospital = $row["hospital"];
    $availability = $row["availability"];
    $id=$row["id"];

}


?>

<!DOCTYPE html>

<head>
    <title>Doctor Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="userform">
        <h1>Doctor Registration</h1>
        <form id="registrationForm" method="post" action="update_action.php" enctype="multipart/form-data" class="userform">
            <h3>01. Personal Information</h3>
            <div class="form-group">
            <input type="text"  name="id" value="<?php echo $id; ?>" style="display: none;">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="<?php echo $address; ?>" required>
            </div>
            <div class="form-group">s
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" value="<?php echo $phone; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>"  required>
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
                <input type="text" id="medical_license" name="medical_license" value="<?php echo $medical_license; ?>"  required>
            </div>
            <div class="form-group">
                <label for="nic">NIC Number</label>
                <input type="text" id="nic" name="nic" value="<?php echo $nic; ?>"  required>


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
                <input type="text" id="experience" name="experience" value="<?php echo $experience; ?>" required>
            </div>
            <div class="form-group">
                <label for="hospital">Hospital/Affiliation</label>
                <input type="text" id="hospital" name="hospital" value="<?php echo $hospital; ?>"  required>
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
                <input type="password" id="password" name="password" value="<?php echo $password; ?>"  required>
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
                <a href="../viwes/login.php"><button type="submit" name="submit" id="register-btn">Update</button></a>
            </div>
            
        </form>
    </div>
    <script>
        document.getElementById("registrationForm").addEventListener("submit", function(event) {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;

            if (password !== confirmPassword) {
                document.getElementById("passwordError").textContent = "Password and confirmpassword do not match please type again!";
                event.preventDefault();
            }
        });
    </script>
    <?php include '../views/footer.php'; ?>
</body>

</html>
