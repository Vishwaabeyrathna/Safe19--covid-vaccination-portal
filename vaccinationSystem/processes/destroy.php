<?php
session_start();

if ($_GET["sess"] == "des" && isset($_GET["sess"])) {

    session_destroy();
    
    header("location: ../login.php?status=Logged Out !");
    exit();
} else {
    header("location: ../index.php?status=Log Out Unsuccessfull !");
    exit();
}
