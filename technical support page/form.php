<!DOCTYPE html>
<head>    
    <title>Technical Support Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
body{
   background-image: url('https://img.freepik.com/premium-vector/time-vaccinate-poster-design-with-vaccine-bottle-syringe-tablets-blue-coronavirus-background_1302-26090.jpg');
   }
</style>  
<body>
<?php include '../views/header.php'; ?>
    <div class="container">
        <h2>Technical Support Form</h2>
		<img src="https://img.freepik.com/premium-vector/support-people-call-center-online-customer-support_123447-4086.jpg?w=2000" alt="support" width="500" height="400">
        <form id="supportForm" action="create.php" method="post">
            <div class= "form group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="issueType">Issue Type:</label>
                <select id="issueType" name="issueType" required>
                    <option value="">Select Issue Type</option>
                    <option value="Technical Issue">Technical Issue</option>
                    <option value="Login Problem">Login Problem</option>
                    <option value="Appointment Issue">Appointment Issue</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="issue">Describe the Issue:</label>
                <textarea id="issue" name="issue" rows="4" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <?php include '../views/footer.php'; ?>

</body>
</html>
