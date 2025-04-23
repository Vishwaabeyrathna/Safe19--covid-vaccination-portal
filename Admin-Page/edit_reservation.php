<!DOCTYPE html>
<html>
<head>
    <title>Edit Reservation</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

    <link rel="stylesheet" type="text/css" href="Edit_styles.css">
</head>
<body>

<div class="container">
    <div class="box">

  
    <h2>Edit Reservation</h2>
    <hr>
    
    <?php
    if(isset($_GET['rid'])) {
        $rid = $_GET['rid'];

        $servername = "localhost";
        $username = "root"; 
        $password = "";
        $database = "safe19"; 

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM reservation WHERE rid='$rid'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<form method='post' action='update_reservation.php'>";

            echo"<fieldset>";

            echo "<input type='hidden' name='rid' value='".$row["rid"]."'>";

            echo "First Name: <input type='text' name='firstName' value='".$row["FirstName"]."'><br>";

            echo "Last Name: <input type='text' name='lastName' value='".$row["LastName"]."'><br>";

            echo "Phone: <input type='text' name='phone' value='".$row["Phone"]."'><br>";

            echo "Email: <input type='email' name='email' value='".$row["Email"]."'><br>";

            echo "Address: <input type='text' name='address' value='".$row["Address"]."'><br>";

            echo "DOB: <input type='date' name='dob' value='".$row["DOB"]."'><br>";

            echo "Gender: <input type='text' name='gender' value='".$row["Gender"]."'><br>";

            echo "Vaccine Type: <input type='text' name='vaccineType' value='".$row["VaccineType"]."'><br>";

            echo "Blood Group: <input type='text' name='bloodGroup' value='".$row["BloodGroup"]."'><br>";

            echo "Hospital: <input type='text' name='hospital' value='".$row["Hospital"]."'><br>";
        
            echo "Date: <input type='date' name='date' value='".$row["Date"]."'><br>";

            echo "Time: <input type='time' name='time' value='".$row["Time"]."'><br>";

            echo "<input type='submit' value='Update'>";

            echo "</fieldset>";

            echo "</form>";


        } else {
            echo "Reservation not found.";
        }

        $conn->close();
    } else {
        echo "Reservation ID not provided.";
    }
    ?>
       </div>
</div>
</body>
</html>
