<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>

    <style>
#rtable {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#rtable td, #rtable th {
  border: 1px solid #ddd;
  padding: 8px;
}

#rtable tr:nth-child(even){background-color: #f2f2f2;}

#rtable tr:hover {background-color: #ddd;}

#rtable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

h1{
    text-align:center;
}

.button {
  background-color: #04AA6D;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.update {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.update:hover {
  background-color: #008CBA;
  color: white;
}

.delete {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.delete:hover {
  background-color: #f44336;
  color: white;
}

</style>

</head>
<body>

<?php
require '../views/header.php';
require '../views/config.php';

echo "<h1>Your Registration successfully!</h1>";
echo '<br>';

$sql = "SELECT * FROM `doctors` ORDER BY id DESC LIMIT 1;";
$result = $conn->query($sql);

if ($result->num_rows>0) {
    echo "<table id='rtable'>
        <tr> 
            <th>Doctor ID</th>
            <th>Full Name</th>
            <th>Address</th>
            <th>Date of Birth</th>
            <th>Contcat No.</th>
            <th>Email</th>       
            <th>Gender</th>
            <th>NIC</th>
            <th>Medical License No.</th>
            <th>Speciality</th>
            <th>Exprience</th>
            <th>Hospital</th>
            <th>Availability</th>
        </tr>";
    
    $row = $result->fetch_assoc();
        

    $id = $row['id'];
        echo '<tr>
            <td>'.'DOC00'.$row['id'].'</td>
            <td>'.$row['fullname'].'</td>
            <td>'.$row['address'].'</td>
            <td>'.$row['dob'].'</td>
            <td>'.$row['phone'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['gender'].'</td>
            <td>'.$row['nic'].'</td>
            <td>'.$row['medical_license'].'</td>
            <td>'.$row['speciality'].'</td>
            <td>'.$row['experience'].'</td>
            <td>'.$row['hospital'].'</td>
            <td>'.$row['availability'].'</td>
            <br>
        </tr>
        </table>
        
          
<a href="../Doctor registration/update.php?id='. $id .'" ><button class="button update">Update</button></a>
<a href="delete.php?deleteid='.$id.'"><button class="button delete">Delete</button></a>';

       
    
} else {
    echo "Deleted Successfully";
}

?>

<!--<?php include "footer.php" ?>-->

  
</body>
</html>