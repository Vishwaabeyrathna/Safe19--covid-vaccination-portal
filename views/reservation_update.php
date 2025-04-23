<?php

$rid = 0;
if ($_GET['rid'] != "") {
    $rid = $_GET['rid'];
} else {
    header("location:reservation_read.php");
}
require 'config.php';
$sql = "SELECT FirstName, LastName, Phone, Email, Address, DOB, Gender,VaccineType, BloodGroup, Hospital,Date, Time From reservation where rid = {$rid}";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

    $data = $result->fetch_assoc();

    $firstName = $data['FirstName'];
    $lastName = $data['LastName'];
    $phone = $data['Phone'];
    $email = $data['Email'];
    $address = $data['Address'];
    $dob = $data['DOB'];
    $gender = $data['Gender'];
    $vaccineType = $data['VaccineType'];
    $bloodGroup = $data['BloodGroup'];
    $hospital = $data['Hospital'];
    $vaccinationDate = $data['Date'];
    $vaccinationTime = $data['Time'];

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Form</title>
    <link rel="stylesheet" href="../css/reservation.css">
</head>
<body>
<?php include 'header.php'; ?>

    <div class="form">
        <h2 class="heading2">Reservation Form</h2>
        <form id="reservationForm" action="update_action.php" method="POST">
            <h3 class="subheading">01. Personal Details</h3><hr>
            <div>
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" value="<?php echo $firstName; ?>" required>
                <input type="text" name="rid" value="<?php echo $rid; ?>" style="display:none;">
            </div>
            <div>
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required>
            </div>
            <div>
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" required>
            </div>
            <div>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo $address; ?>" required>
            </div>
            <div>
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>" required>
            </div>
            <div>
                <label for="gender">Gender:</label>
                    <input type="radio" id="male" name="gender" value="male">Male
                    <input type="radio" id="female" name="gender" value="female">Female<br>
            </div>

            <h3 class="subheading">02. Vaccine Details</h3><hr>
            <div>
                <label for="vaccineType">Vaccine Type:</label>
                <select id="vaccineType" name="vaccineType" required>
                    <option value="Pfizer">Pfizer</option>
                    <option value="Moderna">Moderna</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                    <option value="Sinopharm">Sinopharm</option>
                </select>
            </div>
            <div>
                <label for="bloodGroup">Blood Group:</label>
                <select id="bloodGroup" name="bloodGroup" required>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
            </div>
            <div>
                <label for="hospital">Nearest Hospital:</label>
                <input type="text" id="hospital" name="hospital" value="<?php echo $hospital; ?>"required>
            </div>
            <div>
                <label for="vaccinationDate">Vaccination Date:</label>
                <input type="date" id="vaccinationDate" name="vaccinationDate" value="<?php echo $date; ?>"required>
            </div>
            <div>
                <label for="vaccinationTime">Vaccination Time:</label>
                <input type="time" id="vaccinationTime" name="vaccinationTime" value="<?php echo $time; ?>"required>
            </div>

            <!-- Consent & Acknowledgement -->
            <div>
                <input type="checkbox" id="consent" name="consent" required>Consent and Acknowledgment:
                <p class="consent">     I hereby consent to receiving the COVID-19 vaccination. I have been provided with information about the vaccine, its potential side effects, and the importance of completing the recommended vaccination schedule. I understand that this information is subject to change based on ongoing research and public health guidelines.</p>
            </div>

            <!-- Buttons -->
            <div class="subbuttons">
                <button type="reset">Reset</button>
                <button type="submit">Updade</button>
            </div>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
