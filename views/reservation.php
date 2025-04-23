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
        <form id="reservationForm" action="process_reservation.php" method="POST">
            <h3 class="subheading">01. Personal Details</h3><hr>
            <div>
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
            </div>
            <div>
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
            </div>
            <div>
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" placeholder="Phone" required>
            </div>
            <div>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="E-mail" required>
            </div>
            <div>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" placeholder="Address" required>
            </div>
            <div>
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" placeholder="Date of Birth" required>
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
                <input type="text" id="hospital" name="hospital" placeholder="Nearest Hospital"required>
            </div>
            <div>
                <label for="vaccinationDate">Vaccination Date:</label>
                <input type="date" id="vaccinationDate" name="vaccinationDate" required>
            </div>
            <div>
                <label for="vaccinationTime">Vaccination Time:</label>
                <input type="time" id="vaccinationTime" name="vaccinationTime" required>
            </div>

            <div>
                <input type="checkbox" id="consent" name="consent" required>Consent and Acknowledgment:
                <p class="consent">     I hereby consent to receiving the COVID-19 vaccination. I have been provided with information about the vaccine, its potential side effects, and the importance of completing the recommended vaccination schedule. I understand that this information is subject to change based on ongoing research and public health guidelines.</p>
            </div>

            <div class="subbuttons">
                <button type="reset">Reset</button>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
