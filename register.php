<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Alle namen immer in der Konvention kleingeschrieben-kleingeschrieben -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="styles.css">
    <?php
    require 'start.php';
    if (isset($_SESSION["user"])){
        header("Location: friends.php");
    }
    

    //Login handling
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //retrieve input here
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate username
        if (empty($username) || strlen($username) < 3) {
            $errorMessage = "Username must be at least 3 characters long.";
        }
        //  elseif ($service->userExists($username)) {
        //     $errorMessage = "Username is already taken.";
        // }

        if (empty($password)) {
            $errorMessage = "Password cannot be empty.";
        } elseif (strlen($password) < 8) {
            $errorMessage = "Password must be at least 8 characters long.";
        } elseif ($password !== $confirm_password) {
            $errorMessage = "Passwords do not match.";
        }

        if (!isset($errorMessage)) {
    
            //call login method
            $registerSuccess = $service->register($username,$password);

            //handling of result
            if ($registerSuccess){
                //redirect to freinds by creating header
                header("Location: friends.php");
                exit();
            } else {
                //Loginfail
                $errorMessage="Error occured during registration.";
            }
        }
    }
    ?>
</head>

<body>
    <img class="header-image" src="images/unicorn.jpg" alt='Chat-Symbol'>

    <h1>Register yourself</h1>

    <form method="post" onsubmit="register.php">

        <fieldset>
            <legend>Register</legend>

                <label for='username'>Username</label>
                <input type='text' id='username' placeholder='Username' name='username' required> <br>

                <label for='password'>Password</label>
                <input type='password' id='password' placeholder='Password' name='password'> <br>

                <label for='confirm-password'>Confirm Password</label>
                <input type='password' id='confirm_password' placeholder='Confirm Password' name='confirm_password'> <br>

        </fieldset>

        <?php if (isset($errorMessage)): ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>

        <div class="button-container">
            <button type="button" onclick="window.location.href='login.php'">Cancel</button>
            <button type="submit">Create Account</button>
        </div>

    </form>

    <script src="constants.js"></script>
    <script src="register.js"></script>
</body>

</html>