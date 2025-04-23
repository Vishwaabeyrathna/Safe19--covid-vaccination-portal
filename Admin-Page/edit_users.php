<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" type="text/css" href="Edit_styles.css">
</head>
<body>

<div class="container">
    <div class="box">
        <h2>Edit User Information</h2>
        <hr>
        
        <?php
        if(isset($_GET['id'])) {
            $id = $_GET['id'];

            $servername = "localhost";
            $username = "root"; 
            $password = "";
            $database = "safe19"; 

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM user WHERE id='$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                $row = $result->fetch_assoc();

                echo "<form method='post' action='update_users.php'>";
                echo "<input type='hidden' name='id' value='".$row["id"]."'>";
                echo "<fieldset>";

                echo "Name: <input type='text' name='name' value='".$row["name"]."'><br>";

                echo "Date of Birth: <input type='text' name='dob' value='".$row["dob"]."'><br>";

                echo "Mobile Number: <input type='text' name='mobileNo' value='".$row["mobileNo"]."'><br>";

                echo "Address: <input type='text' name='address' value='".$row["address"]."'><br>";

                echo "Email: <input type='email' name='email' value='".$row["email"]."'><br>";

                echo "NIC: <input type='text' name='nic' value='".$row["nic"]."'><br>";

                echo "Password: <input type='password' name='password' value='".$row["password"]."'><br>";

                echo "Vaccination History: <input type='text' name='vaccinationHistory' value='".$row["vaccinationHistory"]."'><br>";

                echo "Medical History: <input type='text' name='medicalHistory' value='".$row["medicalHistory"]."'><br>";

                echo "Gender: <input type='text' name='gender_genderid' value='".$row["gender_genderid"]."'><br>";

                echo "<input type='submit' value='Update'>";

                echo "</fieldset>";

                echo "</form>";


            } else {
                echo "User not found.";
            }

            $conn->close();
        } else {
            echo "User ID not provided.";
        }
        ?>
    </div>
</div>

</body>
</html>
