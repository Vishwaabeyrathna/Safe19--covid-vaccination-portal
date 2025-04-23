<?php

require "db.php";

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $pwd = $_POST["password"];

    if (
        empty($_POST["email"]) || empty($_POST["password"])
    ) {
        header("location: ../login.php?status=Fill All Fields !");
        exit();
    } else {

        
        $q1 = "SELECT * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $pwd . "'";
        $rs1 = $conn->query($q1);
        $n1 = $rs1->num_rows;
        $d1 = $rs1->fetch_assoc();


        $conn->close();

        if ($n1 >= 1) {

            if (isset($_SESSION["user"])) {
                header("location: ../index.php");
                exit();
            } else {
                $_SESSION["user"] = $d1;
                header("location: ../index.php");
                exit();
            }


        } else {
            header("location: ../login.php?status=Invalid Email or Password !");
            exit();
        }
    }
} else {
    header("location: ../login.php");
    exit();
}
