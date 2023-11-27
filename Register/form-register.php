<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="image"><img class="logo-followup" src="\HomePage-Edit1-main\Register\img\logofollowup.png" /></div>
    <div class="container">
        <h1>Register</h1>
        <form action="process-register.php" method="POST">
            <div>
                <input name="username_account" type="text" placeholder="Username" required>
            </div>
            <div>
                <input name="email_account" type="email" placeholder="Email" required>
            </div>
            <div>
                <input name="password_account1" type="password" placeholder="Password" required>
            </div>
            <div>
                <input name="password_account2" type="password" placeholder="Confirm password" required>
            </div>
            <input type="submit" value="Register">
        </form>

        <p><a href="\HomePage-Edit1-main\Login\form-login.php">Login here</a></p>
    </div>
</body>
</html>
