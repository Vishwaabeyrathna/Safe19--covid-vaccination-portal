<?php

require "db.php";

if (isset($_POST["submit"])) {

    $name = $_POST["full_name"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $nic = $_POST["nic"];
    $address = $_POST["address"];
    $vacHis = $_POST["vaccination_history"];
    $mediHis = $_POST["medical_history"];
    $pwd = $_POST["password"];
    $rePwd = $_POST["confirm_password"];
    $tc = $_POST["terms"];

    if (
        empty($_POST["full_name"])
        || empty($_POST["mobile"])
        || empty($_POST["email"])
        || empty($_POST["dob"])
        || empty($_POST["nic"])
        || empty($_POST["address"])
        || empty($_POST["password"])
        || empty($_POST["confirm_password"])
    ) {
        header("location: ../registration.php?status=Fill All Fields !");
        exit();
    } else {

        $q1 = "SELECT * FROM `user` WHERE email='" . $email . "'";
        $rs1 = $conn->query($q1);
        $n1 = $rs1->num_rows;

        $q2 = "SELECT * FROM `user` WHERE mobileNo='" . $mobile . "'";
        $rs2 = $conn->query($q2);
        $n2 = $rs2->num_rows;


        if ($n1 >= 1) {
            header("location: ../registration.php?status=This Email is Unavailable !");
            exit();
        }

        if ($n2 >= 1) {
            header("location: ../registration.php?status=This Mobile Number is Unavailable !");
            exit();
        }
        
        if (strlen($name) < 2 || strlen($name) > 50) {
            header("location: ../registration.php?status=Invalid Full Name !");
            exit();
        } else if (strlen($nic) < 5 || strlen($nic) > 20) {
            header("location: ../registration.php?status=Invalid NIC Number !");
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: ../registration.php?status=Invalid Email !");
            exit();
        } elseif (strlen($pwd) < 3 || strlen($pwd) > 15) {
            header("location: ../registration.php?status=Invalid Password !");
            exit();
        } elseif ($pwd != $rePwd) {
            header("location: ../registration.php?status=Invalid Re Enter Password !");
            exit();
        
        } else if (empty($tc)) {
            header("location: ../registration.php?status=Terms And Conditions should be accepted !");
            exit();
        } else {
            if ($gender == 'male') {
                $gender = 1;
            } elseif ($gender == 'female') {
                $gender = 2;
            }
            $q1 = "INSERT INTO `user` (`name`,`dob`,`mobileNo`,`address`,`email`,`nic`,`password`,
            `vaccinationHistory`,`medicalHistory`,`gender_genderId`) 
            VALUES ('" . $name . "','" . $dob . "','" . $mobile . "','" . $address . "','" . $email . "',
            '" . $nic . "','" . $pwd . "','" . $vacHis . "','" . $mediHis . "','" . $gender . "')";

            $rs1 = $conn->query($q1);
            $conn->close();

            header("location: ../login.php?status=Successfully Registered !");
            exit();
        }
    }
} else {
    header("location: ../registration.php");
    exit();
}
