<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
    $rid = $_POST['rid'];

    $sql = "UPDATE `reservation` SET `FirstName`=?, `LastName`=?, `Phone`=?, `Email`=?, `address`=?, `DOB`=?, `Gender`=?, `VaccineType`=?, `BloodGroup`=?, `Hospital`=?, `Date`=?, `Time`=? WHERE `rid`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssi", $firstName, $lastName, $phone, $email, $address, $dob, $gender, $vaccineType, $bloodGroup, $hospital, $vaccinationDate, $vaccinationTime, $rid);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $stmt->close();
        $conn->close();
        header("Location: reservation_read.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    header("Location: reservation_update.php");
    exit();
}
?>
