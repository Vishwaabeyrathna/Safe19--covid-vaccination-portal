<?php
include 'submit.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $issueType = $_POST["issueType"];
    $issue = $_POST["issue"];
    $id = $_POST['id'];


    $sql = "UPDATE `patient` SET `name`=?, `email`=?, `phone`=?, `issue_type`=?, `description`=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $email, $phone, $issueType, $issue, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $stmt->close();
        $conn->close();
        header("Location: update.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    header("Location: update.php");
    exit();
}
