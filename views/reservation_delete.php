<?php
  include 'config.php';
  
  if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql = "DELETE FROM `reservation` WHERE rid=$id";
    $result = mysqli_query($conn, $sql);

    if($result){
      echo "Deleted Successfully";
      header('location:reservation_read.php');
    }
    else {
      die(mysqli_error($conn));
    }
  }
?>