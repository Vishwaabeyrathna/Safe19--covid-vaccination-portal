<?php
  include 'config.php';
  
  if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql = "DELETE FROM `doctors` WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if($result){
      echo "Deleted Successfully";
      header('location:read.php');
    }
    else {
      die(mysqli_error($conn));
    }
  }
?>