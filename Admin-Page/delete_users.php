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

  
    $sql = "DELETE FROM user WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        
        header("Location: display_users.php");
        exit(); 
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


$conn->close();
?>