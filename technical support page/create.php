<?php
include 'submit.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $issueType = $_POST["issueType"];
    $issue = $_POST["issue"];

    $stmt = $conn->prepare("INSERT INTO patient (name, email, phone, issue_type, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $issueType, $issue);
    $stmt->execute();
    echo "Registration successfully...";
    header("Location: update.php");
    exit();
    $stmt->close();
    $conn->close();

    echo "Thank you, $name! Your issue has been submitted.";
} else {
    header("Location: index.html");
    exit();
}
