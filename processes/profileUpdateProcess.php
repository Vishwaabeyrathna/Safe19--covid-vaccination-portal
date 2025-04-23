<?php

require "db.php";

if (isset($_POST["update"])) {

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

    if (
        empty($_POST["full_name"])
        || empty($_POST["mobile"])
        || empty($_POST["email"])
        || empty($_POST["dob"])
        || empty($_POST["nic"])
        || empty($_POST["address"])
        || empty($_POST["password"])
    ) {
        header("location: ../userProfile.php?status=Fill All Fields !");
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

        if (($n1 >= 1 || $n3 >= 1) && $_SESSION["user"]["email"] != $email) {
            header("location: ../userProfile.php?status=This Email is Unavailable !");
            exit();
        }

        if (($n2 >= 1 || $n4 >= 1) && $_SESSION["user"]["mobileNo"] != $mobile) {
            header("location: ../userProfile.php?status=This Mobile Number is Unavailable !");
            exit();
        }
        date_default_timezone_set('Asia/Colombo');

        $date = date('Y-m-d');

        if ((strlen($name) < 2 || strlen($name) > 50 && $_SESSION["user"]["name"] != $name)) {
            header("location: ../userProfile.php?status=Invalid Full Name !");
            exit();
        } else if ((strlen($nic) < 5 || strlen($nic) > 20) && $_SESSION["user"]["nic"] != $nic) {
            header("location: ../userProfile.php?status=Invalid NIC Number !");
            exit();
        } elseif ((!filter_var($email, FILTER_VALIDATE_EMAIL)) && $_SESSION["user"]["email"] != $email) {
            header("location: ../userProfile.php?status=Invalid Email !");
            exit();
        } elseif ((strlen($pwd) < 8 || strlen($pwd) > 45) && $_SESSION["user"]["password"] != $pwd) {
            header("location: ../userProfile.php?status=Invalid Password !");
            exit();
        } elseif ((!preg_match("/07[0,1,2,4,5,6,7,8][0-9]{7}/", $mobile) || strlen($mobile) !== 10) && $_SESSION["user"]["mobileNo"] != $mobile) {
            header("location: ../userProfile.php?status=Invalid Mobile No !");
            exit();
        } elseif (($dob > $date || $dob == $date) && $_SESSION["user"]["dob"] != $dob) {
            header("location: ../userProfile.php?status=Invalid Date of Birth !");
            exit();
        } else if ((strlen($address) < 5 || strlen($address) > 150 && $_SESSION["user"]["address"] != $address)) {
            header("location: ../userProfile.php?status=Invalid Address !");
            exit();
        } else {
            if ($gender == 'male') {
                $gender = 1;
            } elseif ($gender == 'female') {
                $gender = 2;
            }

            $q1 = "UPDATE `user` SET name = '" . $name . "', dob = '" . $dob . "', address = '" . $address . "', nic = '" . $nic . "', gender_genderId = '" . $gender . "', mobileNo = '" . $mobile . "', 
            email = '" . $email . "', password = '" . $pwd . "', vaccinationHistory = '" . $vacHis . "', medicalHistory = '" . $mediHis . "' 
            WHERE id = '" . $_SESSION['user']['id'] . "'";

            $rs1 = $conn->query($q1);

            $q2 = "SELECT * FROM `user` WHERE id = '" . $_SESSION['user']['id'] . "'";
            $rs2 = $conn->query($q2);
            $n2 = $rs2->num_rows;
            $d2 = $rs2->fetch_assoc();

            $conn->close();

            $_SESSION['user'] = $d2;

            header("location: ../userProfile.php?status=Successfully Updated !");
            exit();
        }
    }
} elseif (isset($_POST["delete"])) {
    $q1 = "DELETE FROM `user` WHERE id='" . $_SESSION['user']['id'] . "'";
    $rs1 = $conn->query($q1);
    $conn->close();

    unset($_SESSION['user']);

    header("location: ../login.php?status=Account Deleted Successfully !");
    exit();
} else {
    header("location: ../index.php");
    exit();
}
