<?php

$id = "";

if ($_GET['id'] != "") {
    $id = $_GET['id'];
} else {
    header("location:update.php");
}

require 'submit.php';
$sql = "SELECT name,email,phone,issue_type,description From patient where id = {$id}";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

    $data = $result->fetch_assoc();

    $name = $data['name'];
    $email = $data['email'];
    $description = $data['description'];
    $phone = $data['phone'];
    $issue_type = $data['issue_type'];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Technical Support Form</h2>
        <img src="https://img.freepik.com/premium-vector/support-people-call-center-online-customer-support_123447-4086.jpg?w=2000" alt="support" width="500" height="400">
        <form id="supportForm" action="update_action.php" method="post">
            <div class="form group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $name; ?>">
                <input type="number" name="id" value="<?php echo $id; ?>" style="display:none;">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>">
            </div>
            <div class="form-group">
                <label for="issueType">Issue Type:</label>
                <select id="issueType" name="issueType" value="<?php echo $issue_type; ?>" required>
                    <option value="">Select Issue Type</option>
                    <option value="Technical Issue">Technical Issue</option>
                    <option value="Login Problem">Login Problem</option>
                    <option value="Appointment Issue">Appointment Issue</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="issue">Describe the Issue:</label>
                <textarea id="issue" name="issue" rows="4" value="<?php echo $description; ?>" required><?php echo $description; ?></textarea>
            </div>
            <input type="submit" value="Update">
        </form>
    </div>

</body>

</html>