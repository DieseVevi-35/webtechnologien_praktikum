<?php
    require 'start.php';

    use Model\User;

    if (isset($_SESSION['user'])){
        header("Location: friends.php"); //header in Datenpaket deshalb lieber ganz vorne hinpacken 
        exit();
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
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Alle namen immer in der Konvention kleingeschrieben-kleingeschrieben -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' crossorigin='anonymous'>
    
</head>

<body class="container-fluid" style="background-color: #FF00FF;">
    <div class="text-center mt-3">
        <img class="rounded-circle" src="images/doge.jpg" alt='Chat-Symbol' style="width: 150px; height: 150px; object-fit: cover; margin:50px;">
    </div>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center">Please sign in</h1>
                        <form method="post" action="login.php">
                            
                                <!-- <legend>Login</legend> -->
                                <div class="form-floating mb-3">
                                    <input type='text' id='username' placeholder='Username' name='username'class="form-control">
                                    <label for='username'>Username</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type='password' id='password' placeholder='Password' name='password' class="form-control">
                                    <label for='Password'>Password</label>
                                </div>
                                
                            

                            <!--hier für das Feedback falls falsch eingegeben -->
                            <?php if (isset($errorMessage)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $errorMessage; ?>
                            </div>
                            <?php endif; ?>

                            <!--damit die buttons später noch nebeneinander sind-->
                            <div class="d-flex justify-content-between">
                                <a href='register.php' id="register" class="flex-grow-1 me-2">
                                    <button type="button" class="btn btn-secondary w-100">Register</button>
                                </a>
                                <!-- Buttons müssen immer mit btn anfangen und dann mit btn-primary etc erweitert werden! -->
                                <button type="submit" name="login" value="login" class="btn btn-primary flex-grow-1 w-100">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>