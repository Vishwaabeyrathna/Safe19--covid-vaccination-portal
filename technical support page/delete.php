<?php
if(isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM support_requests WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
$conn->close();
?>	