<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "safe19";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $medical_license = $_POST["medical_license"];
    $nic = $_POST["nic"];
    $speciality = $_POST["speciality"];
    $experience = $_POST["experience"];
    $hospital = $_POST["hospital"];
    $availability = $_POST["availability"];
    $password = $_POST["password"];

    $sql = "INSERT INTO doctors (fullname, address, dob, phone, email, gender, medical_license, nic, speciality, experience, hospital, availability,password)
    VALUES ('$fullname', '$address', '$dob', '$phone', '$email', '$gender', '$medical_license', '$nic', '$speciality', '$experience', '$hospital', '$availability','$password')";


    if ($conn->query($sql) === TRUE ) {
        echo "New record created successfully";
        require "../views/login.php";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
       
    }
}

$conn->close();
?>
