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

    $sql = "UPDATE doctor SET 
            fullname='$fullname',
            address='$address',
            dob='$dob',
            phone='$phone',
            email='$email',
            gender='$gender',
            medical_license='$medical_license',
            nic='$nic',
            speciality='$speciality',
            experience='$experience',
            hospital='$hospital',
            availability='$availability',
            password='$password'
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: display_doctor.php");
        exit; 
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
