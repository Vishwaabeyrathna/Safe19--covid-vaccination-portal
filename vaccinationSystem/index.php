<?php

session_start();

if (!isset($_SESSION["user"])) {
    header("location: ./login.php");
    exit();
}

?>
<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar {
            overflow: hidden;
            background-color: #333;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .navbar a:hover {
            background: #ddd;
            color: black;
        }

        @media screen and (max-width: 600px) {
            .navbar a {
                float: none;
                display: block;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <a href="index.php">Home</a>
        <?php

        if (isset($_SESSION["user"])) {
            ?>
            <a href="userProfile.php">Profile Settings</a>  
            <?php
        } elseif (isset($_SESSION["doctor"])) {
            ?>
            <a href="doctorProfile.php">Profile Settings</a>
            <?php
        }

        ?>
        <a href="./processes/destroy.php?sess=des">Logout</a>
    </div>

    <div style="padding:20px;margin-top:30px;background-color:#1abc9c;height:1500px;">
        <?php

        if (isset($_SESSION["user"])) {
            ?>
            <h1>Welcome to Homepage <?php echo ($_SESSION["user"]["name"]); ?></h1>
            <p>User</p>
            <?php
        } elseif (isset($_SESSION["doctor"])) {
            ?>
            /*<h1>Welcome to Homepage <?php echo ($_SESSION["doctor"]["name"]); ?></h1>
            <p>Doctor</p>
            <?php
        }

        ?>
    </div>

</body>

</html>