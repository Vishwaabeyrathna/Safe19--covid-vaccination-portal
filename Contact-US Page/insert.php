<?php

include 'config.php';

$patientName=$_POST["pname"];
$patientEmail=$_POST["pemail"];
$patientMessage=$_POST["pmessage"];

$sql="INSERT INTO contactus (Name,Email,Message) values('$patientName','$patientEmail','$patientMessage')";

if($con->query($sql))
{
	echo "<script>alert('Insert Successful'); window.location.href = 'Contact-Us.php';</script>";
	exit;
}
else{
    echo "<script>alert('Error'); window.location.href = 'Contact-Us.php';</script>";
	exit;
}
$con->close();

?>