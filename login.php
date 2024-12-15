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
    require 'start.php';
    if (isset($user)){
        header("Location friends.php");
    }
    include 'utils/BackendService.php';

    //Login handling
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //retrieve input here
        $username = $_POST['username'];
        $password = $_POST['password'];

        //create a new BackendService Object
        $backendService = new \Utils\BackendService('https://online-lectures-cs.thi.de/chat','1960b373-3673-45f0-8509-c3d7d901a332');

        //call login method
        $loginSuccess = $backendService->login($username,$password);

        //handling of result
        if ($loginSuccess){
            //redirect to freinds by creating header
            header("Location: friends.php");
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
            <form>
            <a href='register.php' id="register">
                <button>Register</button>
            </a>

            <a href='friends.php' id="login">
                <button type="submit" name="Login" value="login">Login</button>
            </a>
        </div>
    </form> 
</body>

</html>