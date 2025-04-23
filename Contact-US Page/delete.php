
<?php
require 'config.php';

if(isset($_POST["pid"]))
 {
    $ID = mysqli_real_escape_string($con, $_POST["pid"]);

    $sql = "DELETE FROM contactus WHERE ID = '$ID'";

    if($con->query($sql)) {

        echo "Deleted!";
    } 
    
    else {
        echo "Not successful!";
    }

} else {

    echo "ID not provided!";
}


?>
