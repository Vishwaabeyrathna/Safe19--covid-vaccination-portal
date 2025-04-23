<!DOCTYPE html>
<html>
<head>
    <title>doctor Data</title>
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

            <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <div class="container">
            <h1>Welcome to Admin Panel</h1>
            <hr>
            <br>
                <div class="navigation">
                     <a href="display_users.php"><button>Users Database</button></a>
                     <a href="display_reservation.php"><button>Reservation Database</button></a>
                </div>
     </div>

    <h2>Doctor Details</h2>
    <br>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>DOB</th>
            <th>Mobile No</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Medical License</th>
            <th>NIC</th>
            <th>Speciality</th>
            <th>Experience</th>
            <th>Hospital</th>
            <th>Availability</th>
            <th>Password</th>
            
            <th>Action</th> 
            <th>Action</th> 
        </tr>
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


        $sql = "SELECT id, fullname, address, dob, phone, email, gender, medical_license, nic, speciality, experience, hospital, availability, password FROM doctor";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["fullname"]."</td>";
            echo "<td>".$row["address"]."</td>";
            echo "<td>".$row["dob"]."</td>";
            echo "<td>".$row["phone"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["gender"]."</td>";
            echo "<td>".$row["medical_license"]."</td>";
            echo "<td>".$row["nic"]."</td>";
            echo "<td>".$row["speciality"]."</td>";
            echo "<td>".$row["experience"]."</td>";
            echo "<td>".$row["hospital"]."</td>";
            echo "<td>".$row["availability"]."</td>";
            echo "<td>".$row["password"]."</td>";



           
            echo "<td><a href='edit_doctor.php?id=".$row["id"]."' class='edit-button'>Edit</a></td>";



            echo "<td><form method='post' action='delete_doc.php'><input type='hidden' name='id' value='".$row["id"]."'><input type='submit' value='Delete'></form></td>"; // Delete button


           echo "</tr>";
        }


        $conn->close();
        ?>
    </table>
</body>
</html>
