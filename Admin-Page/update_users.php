<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "safe19"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $mobileNo = $_POST["mobileNo"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $nic = $_POST["nic"];
    $vaccinationHistory = $_POST["vaccinationHistory"];
    $password = $_POST["password"];
    $medicalHistory = $_POST["medicalHistory"];
    $gender_genderid = $_POST["gender_genderid"];

    $sql = "UPDATE user SET 
            name='$name',
            dob='$dob',
            mobileNo='$mobileNo',
            address='$address',
            email='$email',
            nic='$nic',
            password='$password',
            vaccinationHistory='$vaccinationHistory',
            medicalHistory='$medicalHistory',
            gender_genderid='$gender_genderid'
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: display_users.php");
        exit; 
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
