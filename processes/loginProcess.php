<?php

require "db.php";

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $pwd = $_POST["password"];

    if (
        empty($_POST["email"]) || empty($_POST["password"])
    ) {
        header("location: ../views/login.php?status=Fill All Fields !");
        exit();
    } else {

        $q1 = "SELECT * FROM user WHERE email='" . $email . "' AND password='" . $pwd . "'";
        $rs1 = $conn->query($q1);
        $n1 = $rs1->num_rows;
        $d1 = $rs1->fetch_assoc();

        $q2 = "SELECT * FROM doctors WHERE email='" . $email . "' AND password='" . $pwd . "'";
        $rs2 = $conn->query($q2);
        $n2 = $rs2->num_rows;
        $d2 = $rs2->fetch_assoc();

        $conn->close();

        if ($email == "admin@gmail.com" && $pwd == "admin") {
            session_destroy();

            $_SESSION["admin"] = $d1;
            header("location: ../Admin-Page/display_users.php");
            exit();
        } else if ($n1 >= 1) {
            session_destroy();

            $_SESSION["user"] = $d1;
            header("location: ../views/userProfile.php");
            exit();
        } else if ($n2 >= 1) {
            session_destroy();

            $_SESSION["doctor"] = $d2;
            header("location: ../Doctor registration/read.php");
            exit();
        } else {
            header("location: ../views/login.php?status=Invalid Email or Password !");
            exit();
        }
    }
} else {
    header("location: ../views/login.php");
    exit();
}
