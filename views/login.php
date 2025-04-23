<?php


if (isset($_GET["status"])) {
    echo '<script>
    setTimeout(function() {
        alert("' . $_GET["status"] . '");
    }, 1000); </script>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <style>
        body {
            background-color: rgb(230, 234, 238);
        }
    </style>
    <?php include '../views/header.php'; ?>

    <div class="container">
        <h1>Sign in</h1>
        <form action="../processes/loginProcess.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <a href="../Forgot password/forget_password.html" class="forgot-password">Forgot Password</a>
            </div>
            <button type="submit" name="submit" class="btn">Sign in</button>
        </form>
        <div class="social-login">
            <p>Sign in with</p>
            <div class="social-buttons">
                <a href="https://google.com" target="_blank" class="social-btn google">G</a>
                <a href="https://twitter.com" target="_blank" class="social-btn twitter">X</a>
                <a href="https://facebook.com" target="_blank" class="social-btn facebook">f</a>
            </div>
        </div>
        <p class="create-account">Don't have Account? <a href="../register/Registration-page.php" class="create-account-link">Create Account</a></p>
    </div>

</body>

</html>