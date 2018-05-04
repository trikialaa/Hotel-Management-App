<!DOCTYPE html>
<html lang="en" >


<head>
    <meta charset="UTF-8">
    <title>Systéme de gestion d'un hotel</title>
    <link rel="stylesheet" href="app\css\login.css">
</head>

<body>

<div id="box1" class="box blurred-bg tinted">
    <div class="content">
        <h1>Systéme de gestion </h1>
        <p class="related">Royal Venus</p>
        <div>
            <div class="img_container">
                <img src="app\img\logo_black.png" alt="Avatar" class="avatar">
            </div>
            <form action="app\php\controlClass\login.php" method="post">
            <div class="container">
                <label for="username"><b>Username</b></label>
                <input id="username" type="text" placeholder="Enter Username" name="username" required>

                <label for="password"><b>Password</b></label>
                <input id="password" type="password" placeholder="Enter Password" name="password" required>

                <div class="container">
                    <button type="submit" class="cancel_btn">Login</button>
                    <button type="button" class="cancel_btn">Cancel</button>
                </div>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>
            </form>

        </div>



    </div>
</div>
</body>
</html>
