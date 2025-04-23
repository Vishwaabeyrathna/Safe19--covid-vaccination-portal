<?php
session_start();
require "db.php";

if (isset($_POST["update"])) {

    $name = $_POST["full_name"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $pwd = $_POST["password"];

    if (
        empty($_POST["full_name"])
        || empty($_POST["mobile"])
        || empty($_POST["email"])
        || empty($_POST["address"])
        || empty($_POST["password"])
    ) {
        header("location: ../doctorProfile.php?status=Fill All Fields !");
        exit();
    } else {

        $q1 = "SELECT * FROM `user` WHERE email='" . $email . "'";
        $rs1 = $conn->query($q1);
        $n1 = $rs1->num_rows;

        $q2 = "SELECT * FROM `user` WHERE mobileNo='" . $mobile . "'";
        $rs2 = $conn->query($q2);
        $n2 = $rs2->num_rows;

        $q3 = "SELECT * FROM `doctor` WHERE email='" . $email . "'";
        $rs3 = $conn->query($q3);
        $n3 = $rs3->num_rows;

        $q4 = "SELECT * FROM `doctor` WHERE mobileNo='" . $mobile . "'";
        $rs4 = $conn->query($q4);
        $n4 = $rs4->num_rows;

        if (($n1 >= 1 || $n3 >= 1) && $_SESSION["doctor"]["email"] != $email) {
            header("location: ../doctorProfile.php?status=This Email is Unavailable !");
            exit();
        }

        if (($n2 >= 1 || $n4 >= 1) && $_SESSION["doctor"]["mobileNo"] != $mobile) {
            header("location: ../doctorProfile.php?status=This Mobile Number is Unavailable !");
            exit();
        }
        // set the time zone to Sri Lanka
        date_default_timezone_set('Asia/Colombo');

        // get the current time in Sri Lanka
        $date = date('Y-m-d');

        if ((strlen($name) < 2 || strlen($name) > 50 && $_SESSION["doctor"]["name"] != $name)) {
            header("location: ../doctorProfile.php?status=Invalid Full Name !");
            exit();
        } else if ((strlen($nic) < 5 || strlen($nic) > 20) && $_SESSION["doctor"]["nic"] != $nic) {
            header("location: ../doctorProfile.php?status=Invalid NIC Number !");
            exit();
        } elseif ((!filter_var($email, FILTER_VALIDATE_EMAIL)) && $_SESSION["doctor"]["email"] != $email) {
            header("location: ../doctorProfile.php?status=Invalid Email !");
            exit();
        } elseif ((strlen($pwd) < 8 || strlen($pwd) > 45) && $_SESSION["doctor"]["password"] != $pwd) {
            header("location: ../doctorProfile.php?status=Invalid Password !");
            exit();
        } elseif ((!preg_match("/07[0,1,2,4,5,6,7,8][0-9]{7}/", $mobile) || strlen($mobile) !== 10) && $_SESSION["doctor"]["mobileNo"] != $mobile) {
            header("location: ../doctorProfile.php?status=Invalid Mobile No !");
            exit();
        } elseif (($dob > $date || $dob == $date) && $_SESSION["doctor"]["dob"] != $dob) {
            header("location: ../doctorProfile.php?status=Invalid Date of Birth !");
            exit();
        } else if ((strlen($address) < 5 || strlen($address) > 150 && $_SESSION["doctor"]["address"] != $address)) {
            header("location: ../doctorProfile.php?status=Invalid Address !");
            exit();
        } else {
            if ($gender == 'male') {
                $gender = 1;
            } elseif ($gender == 'female') {
                $gender = 2;
            }

            $q1 = "UPDATE `doctor` SET name = '" . $name . "', address = '" . $address . "', gender_genderId = '" . $gender . "', mobileNo = '" . $mobile . "', 
            email = '" . $email . "', password = '" . $pwd . "' WHERE id = '" . $_SESSION['doctor']['id'] . "'";

            $rs1 = $conn->query($q1);

            $q2 = "SELECT * FROM `doctor` WHERE id = '" . $_SESSION['doctor']['id'] . "'";
            $rs2 = $conn->query($q2);
            $n2 = $rs2->num_rows;
            $d2 = $rs2->fetch_assoc();

            $conn->close();

            $_SESSION['doctor'] = $d2;

            header("location: ../doctorProfile.php?status=Successfully Updated !");
            exit();
        }
    }
} elseif (isset($_POST["delete"])) {
    $q1 = "DELETE FROM `doctor` WHERE id='" . $_SESSION['doctor']['id'] . "'";
    $rs1 = $conn->query($q1);
    $conn->close();

    unset($_SESSION['doctor']);

    header("location: ../login.php?status=Account Deleted Successfully !");
    exit();
} else {
    header("location: ../index.php");
    exit();
}
