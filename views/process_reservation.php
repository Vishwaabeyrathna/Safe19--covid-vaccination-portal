<?php

require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $vaccineType = $_POST['vaccineType'];
    $bloodGroup = $_POST['bloodGroup'];
    $hospital = $_POST['hospital'];
    $vaccinationDate = $_POST['vaccinationDate'];
    $vaccinationTime = $_POST['vaccinationTime'];

    $sql = "INSERT INTO reservation (FirstName, LastName, Phone, Email, Address, DOB, Gender,VaccineType, BloodGroup, Hospital,Date, Time) VALUES ('$firstName', '$lastName', '$phone', '$email', '$address', '$dob' ,'$gender', '$vaccineType' ,'$bloodGroup', '$hospital' ,'$vaccinationDate', '$vaccinationTime' )";

    if (mysqli_query($conn, $sql)) {
        require 'reservation_read.php';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
