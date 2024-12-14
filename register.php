<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Alle namen immer in der Konvention kleingeschrieben-kleingeschrieben -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <img class="header-image" src="images/unicorn.jpg" alt='Chat-Symbol'>

    <h1>Register yourself</h1>

    <fieldset>
        <legend>Register</legend>
        <form id="registerForm" action="friends.html" method="get" onsubmit="return validateForm(event);">

            <label for='username'>Username</label>
            <input type='text' id='username' placeholder='Username' name='username' required> <br>

            <label for='password'>Password</label>
            <input type='password' id='password' placeholder='Password' name='password'> <br>

            <label for='confirm-password'>Confirm Password</label>
            <input type='password' id='confirm_password' placeholder='Confirm Password' name='confirm_password'> <br>

    </fieldset>

    <div class="button-container">
        <button type="button" onclick="window.location.href='login.php'">Cancel</button>
        <button type="submit">Create Account</button>
    </div>

    </form>

    <script src="constants.js"></script>
    <script src="register.js"></script>
</body>

</html>