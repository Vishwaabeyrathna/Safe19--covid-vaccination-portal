<?php

require 'config.php';

$patientName = $_POST["pname"];
$patientEmail = $_POST["pemail"];
$patientMessage = $_POST["pmessage"];


if (empty($patientName) || empty($patientEmail) || empty($patientMessage)) 
{
    echo "All fields are required";
} 
else 
{

    $patientName = mysqli_real_escape_string($con, $patientName);
    $patientEmail = mysqli_real_escape_string($con, $patientEmail);
    $patientMessage = mysqli_real_escape_string($con, $patientMessage);

    if(isset($_POST["pid"])) {

        $ID = $_POST["pid"];
        
        $sql = "UPDATE contactus SET Name='$patientName', Email='$patientEmail', Message='$patientMessage' WHERE ID='$ID'";
    } else {
        
        $sql = "INSERT INTO contactus (Name, Email, Message) VALUES ('$patientName', '$patientEmail', '$patientMessage')";
    }

    
    if ($con->query($sql)) {

        echo "Updated";
    } else {
        echo "Error: " . $con->error;
    }
}

?>