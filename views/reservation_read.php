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
  border: none;
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
require 'header.php';
require 'config.php';

echo "<h1>Your Reservation successfully!</h1>";
echo '<br>';

$sql = "SELECT * FROM `reservation` ORDER BY rid DESC LIMIT 1;";
$result = $conn->query($sql);

if ($result->num_rows>0) {
    echo "<table id='rtable'>
        <tr> 
            <th>Reference No.</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Contcat No.</th>
            <th>Email</th>
            <th>Address</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Vaccine Type</th>
            <th>Blood Group</th>
            <th>Hospital</th>
            <th>Vaccination Date</th>
            <th>Vaccination Time</th>
        </tr>";
    
    $row = $result->fetch_assoc();
        

    $rid = $row['rid'];
        echo '<tr>
            <td>'.'RID00'.$row['rid'].'</td>
            <td>'.$row['FirstName'].'</td>
            <td>'.$row['LastName'].'</td>
            <td>'.$row['Phone'].'</td>
            <td>'.$row['Email'].'</td>
            <td>'.$row['Address'].'</td>
            <td>'.$row['DOB'].'</td>
            <td>'.$row['Gender'].'</td>
            <td>'.$row['VaccineType'].'</td>
            <td>'.$row['BloodGroup'].'</td>
            <td>'.$row['Hospital'].'</td>
            <td>'.$row['Date'].'</td>
            <td>'.$row['Time'].'</td>
            <br>
        </tr>
        </table>
        
          
<a href="reservation_update.php?rid='. $rid .'" ><button class="button update">Update</button></a>
<a href="reservation_delete.php?deleteid='.$rid.'"><button class="button delete">Delete</button></a>';

       
    
} else {
    echo "Deleted Successfully";
}

?>

<!--<?php include "footer.php" ?>-->

  
</body>
</html>