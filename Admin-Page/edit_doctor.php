<!DOCTYPE html>
<html>
<head>
    <title>Edit Doctor</title>
    <link rel="stylesheet" type="text/css" href="Edit_styles.css">
</head>
<body>

<div class="container">
    <div class="box">
        <h2>Edit Doctor Information</h2>
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

            $sql = "SELECT * FROM doctor WHERE id='$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                echo "<form method='post' action='update_doctor.php'>";
                echo "<input type='hidden' name='id' value='".$row["id"]."'>";
                echo "<fieldset>";

                echo "Name: <input type='text' name='fullname' value='".$row["fullname"]."'><br>";

                echo "Address: <input type='text' name='address' value='".$row["address"]."'><br>";

                echo "DOB: <input type='text' name='dob' value='".$row["dob"]."'><br>";

                echo "Mobile No: <input type='text' name='phone' value='".$row["phone"]."'><br>";

                echo "Email: <input type='email' name='email' value='".$row["email"]."'><br>";

                echo "Gender: <input type='text' name='gender' value='".$row["gender"]."'><br>";

                echo "Medical License: <input type='text' name='medical_license' value='".$row["medical_license"]."'><br>";

                echo "NIC: <input type='text' name='nic' value='".$row["nic"]."'><br>";

                echo "Speciality: <input type='text' name='speciality' value='".$row["speciality"]."'><br>";

                echo "Experience: <input type='text' name='experience' value='".$row["experience"]."'><br>";

                echo "Hospital: <input type='text' name='hospital' value='".$row["hospital"]."'><br>";

                echo "Availability: <input type='text' name='availability' value='".$row["availability"]."'><br>";

                echo "Password: <input type='password' name='password' value='".$row["password"]."'><br>";

                echo "<input type='submit' value='Update'>";

                echo "</fieldset>";
                echo "</form>";
                
            } else {
                echo "Doctor not found.";
            }

            $conn->close();
        } else {
            echo "Doctor ID not provided.";
        }
        ?>
    </div>
</div>

</body>
</html>
