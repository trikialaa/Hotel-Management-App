<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="app/css/login.css">
    <link rel="stylesheet" href="app/css/navbarstyle.css">
</head>
<body>

<div class="bg-img">

    <form action="app/php/controlClass/login.php" method="POST">
        <div class="container1">
            <div class="img_container">
                <img src="app/img/img_avatar.png" alt="Avatar" class="avatar">
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

            <div class="container">
                <button type="button" class="cancel_btn">Cancel</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>