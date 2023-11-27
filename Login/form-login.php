<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="flex-container">
    <div class="frame-2"><div class="text-wrapper-4">Help</div></div>
    <div class="frame-3">
    <div class="text-wrapper-4">Contact</div>
</div>
<div class="icon-font-awesome">
    <img class="vector" src="\HomePage-Edit1-main\Login\img\home.png" />
</div>
</div>
<div class="image"><img class="logo-followup" src="\HomePage-Edit1-main\Login\img\logofollowup.png" /></div>

    <div class="container">
    <h1>Login</h1>
    <form action="process-login.php" method="POST">
        <div>
            <input name="username_account" type="text" placeholder="Username" required>
        </div>
        <div>
            <input name="password_account" type="password" placeholder="Password" required>
        </div>
        <button type="submit">Login</button>
        <div class="links-container">
            <a href="\HomePage-Edit1-main\Register\form-register.php">Register here</a>
            <a href="\HomePage-Edit1-main\Fotgot_password\forgot_password.php">Forget password</a>
        </div>
    </form>
</body>
</html>
