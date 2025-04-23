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
    $rid = $_POST["rid"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $vaccineType = $_POST["vaccineType"];
    $bloodGroup = $_POST["bloodGroup"];
    $hospital = $_POST["hospital"];
    $date = $_POST["date"];
    $time = $_POST["time"];

    $sql = "UPDATE reservation SET 
            FirstName='$firstName',
            LastName='$lastName',
            Phone='$phone',
            Email='$email',
            Address='$address',
            DOB='$dob',
            Gender='$gender',
            VaccineType='$vaccineType',
            BloodGroup='$bloodGroup',
            Hospital='$hospital',
            Date='$date',
            Time='$time'
            WHERE rid='$rid'";

    if ($conn->query($sql) === TRUE) {
        header("Location: display_reservation.php");
        exit; 
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
