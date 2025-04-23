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
<html>

<head>
    <title>User Data</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to Admin Panel</h1>
        <hr>
        <br>

        <div class="navigation">
            <a href="display_doctor.php"><button>Doctor Database</button></a>
            <a href="display_reservation.php"><button>Reservation Database</button></a>
        </div>
    </div>

    <h2>Users Details</h2>
    <br>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Mobile Number</th>
            <th>Address</th>
            <th>Email</th>
            <th>NIC</th>
            <th>Password</th>
            <th>Vaccination History</th>
            <th>Medical History</th>
            <th>Gender</th>
            <th>Action</th>
            <th>Action</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root"; 
        $password = "";
        $database = "safe19";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, name, dob, mobileNo, address, email, nic, password, vaccinationHistory, medicalHistory, gender_genderid FROM user";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["dob"] . "</td>";
            echo "<td>" . $row["mobileNo"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["nic"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td>" . $row["vaccinationHistory"] . "</td>";
            echo "<td>" . $row["medicalHistory"] . "</td>";
            echo "<td>" . $row["gender_genderid"] . "</td>";


            echo "<td><a href='edit_users.php?id=" . $row["id"] . "' class='edit-button'>Edit</a></td>";


            echo "<td><form method='post' action='delete_users.php'><input type='hidden' name='id' value='" . $row["id"] . "'><input type='submit' value='Delete' class='delete-btn'></form></td>"; // Delete button
            echo "</tr>";
        }

        $conn->close();
        ?>
    </table>
</body>

</html>