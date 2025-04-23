<?php

session_start();

$conn = new mysqli("localhost","root","","safe19");

if ($conn->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
