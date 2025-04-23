<!DOCTYPE html>
<html>
<head>
    <title>Reservation Data</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
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
            <a href="display_users.php"><button>Users Database</button></a>
            <a href="display_doctor.php"><button>Doctor Database</button></a>
        </div>
    </div>
    <h2>Reservation Details</h2>
    <br>
    
    <table>
        <tr>
            <th>ID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Vaccine Type</th>
            <th>Blood Group</th>
            <th>Hospital</th>
            <th>Date</th>
            <th>Time</th>
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

        $sql = "SELECT rid, FirstName, LastName, Phone, Email, Address, DOB, Gender, VaccineType, BloodGroup, Hospital, Date, Time FROM reservation";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["rid"]."</td>";
            echo "<td>".$row["FirstName"]."</td>";
            echo "<td>".$row["LastName"]."</td>";
            echo "<td>".$row["Phone"]."</td>";
            echo "<td>".$row["Email"]."</td>";
            echo "<td>".$row["Address"]."</td>";
            echo "<td>".$row["DOB"]."</td>";
            echo "<td>".$row["Gender"]."</td>";
            echo "<td>".$row["VaccineType"]."</td>";
            echo "<td>".$row["BloodGroup"]."</td>";
            echo "<td>".$row["Hospital"]."</td>";
            echo "<td>".$row["Date"]."</td>";
            echo "<td>".$row["Time"]."</td>";

            echo "<td><a href='edit_reservation.php?rid=".$row["rid"]."' class='edit-button'>Edit</a></td>";
 
            echo "<td><form method='post' action='delete_reser.php'><input type='hidden' name='rid' value='".$row["rid"]."'><input type='submit' value='Delete'></form></td>"; // Delete button
            echo "</tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
