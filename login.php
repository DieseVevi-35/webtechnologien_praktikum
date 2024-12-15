<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Alle namen immer in der Konvention kleingeschrieben-kleingeschrieben -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="styles.css">
    <?php
    require 'start.php';

    use Model\User;

    if (isset($_SESSION['user'])){
        header("Location: friends.php");
    }
    

    //Login handling
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //retrieve input here
        $username = $_POST['username'];
        $password = $_POST['password'];

        //call login method
        $loginSuccess = $service->login($username,$password);

        //handling of result
        if ($loginSuccess){
            //redirect to freinds by creating header
            header("Location: friends.php");
            $_SESSION['user'] = User::create($username);
            exit();
        } else {
            //Loginfail
            $errorMessage="Invalid username or password.";
        }
    }
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

<!--hier für das Feedback falls falsch eingegeben -->
        <?php if (isset($errorMessage)): ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>

        <!--damit die buttons später noch nebeneinander sind-->
        <div class="button-container">
            <a href='register.php' id="register">
                <button type="button">Register</button>
            </a>

            <button type="submit" name="login" value="login">Login</button>
        </div>
    </form> 
</body>

</html>