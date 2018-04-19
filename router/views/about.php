<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="css/login_theme.css">
    <link rel="stylesheet" href="./css/navbar_style.css">
</head>
<body>
<form action="action_page.php" method="POST">
    <div class="img_container">
        <img src="img/img_avatar.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label for="username"><b>Username</b></label>
        <input id="username" type="text" placeholder="Enter Username" name="username" required>

        <label for="password"><b>Password</b></label>
        <input id="password" type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Login</button>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancel_btn">Cancel</button>
    </div>
</form>
</body>
</html>