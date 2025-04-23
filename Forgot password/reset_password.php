<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    $sql_doctors = "SELECT * FROM doctors WHERE email = '$email' AND dob = '$dob';";
    $result_doctors = $conn->query($sql_doctors);

    if ($result_doctors->num_rows > 0) {
        $update_sql_doctors = "UPDATE doctors SET password = '$new_password' WHERE email = '$email' AND dob = '$dob';";
        if ($conn->query($update_sql_doctors) === TRUE) {
            echo "Password reset successfully for doctors!";
            require "../login.php";
        } else {
            echo "Error updating password for doctors: " . $conn->error;
        }
    } else {
        $sql_user = "SELECT * FROM user WHERE email = '$email' AND dob = '$dob';";
        $result_user = $conn->query($sql_user);

        if ($result_user->num_rows > 0) {
            $update_sql_user = "UPDATE user SET password = '$new_password' WHERE email = '$email' AND dob = '$dob';";
            if ($conn->query($update_sql_user) === TRUE) {
                echo "Password reset successfully for user!";
                require "../views/login.php";
            } else {
                echo "Error updating password for user: " . $conn->error;
            }
        } else {
            echo "Invalid email or date of birth.";
        }
    }
}
$conn->close();
?>
