<?php

require 'config.php';

$sql="SELECT * FROM contactus";

$result=$con->query($sql);

if($result->num_rows>0)
{
    echo "<table border='1'>";

    while($row=$result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>".$row["ID"]."</td>"."<td>".$row["Name"]."</td>"."<td>".$row["Email"]."</td>"."<td>".$row["Message"]."</td>"."<br>";
        echo "</tr>";
    }

    echo "</table>";

}
else{
    
    echo "No Result";
}

?>


