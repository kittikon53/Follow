<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="image"><img class="logo-followup" src="\HomePage-Edit1-main\Fotgot_password\img\logofollowup.png" /></div>
<div class="container">
    <h2>Reset Password</h2>
    <form action="forgot_password_process.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <div class="button-container">
            <button type="submit" class="reset-button">Reset Password</button>
            <a href="http://localhost/HomePage-Edit1-main/Login/form-login.php" class="login-button">Back to Login</a>
        </div>
    </form>
</div>
</body>
</html>