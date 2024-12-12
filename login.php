<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Alle namen immer in der Konvention kleingeschrieben-kleingeschrieben -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="styles.css">
    <?php ?>
    <?php
    include 'start.php';
    ?>
</head>

<body>
    <img class="header-image" src="images/doge.jpg" alt='Chat-Symbol'>

    <h1>Please sign in</h1>
    <form method="post" onsubmit="login.php">
        <fieldset>
            <legend>Login</legend>
            <label for='username'>Username</label>
            <input type='text' id='username' placeholder='Username' name='username'>
            <br>
            <label for='Password'>Password</label>
            <input type='password' id='password' placeholder='Password' name='password'>
            <br>
        </fieldset>

        <!--damit die buttons später noch nebeneinander sind-->
        <div class="button-container">
            <form>
            <a href='register.html' id="register">
                <button>Register</button>
            </a>

            <a href='friends.html' id="login">
                <button type="submit" name="Login" value="login">Login</button>
            </a>
        </div>
    </form> 
</body>

</html>