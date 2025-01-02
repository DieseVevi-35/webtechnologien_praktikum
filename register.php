<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <?php
    require 'start.php';
    if (isset($_SESSION["user"])) {
        header("Location: friends.php");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if (empty($username) || strlen($username) < 3) {
            $errorMessage = "Username must be at least 3 characters long.";
        }

        if (empty($password)) {
            $errorMessage = "Password cannot be empty.";
        } elseif (strlen($password) < 8) {
            $errorMessage = "Password must be at least 8 characters long.";
        } elseif ($password !== $confirm_password) {
            $errorMessage = "Passwords do not match.";
        }

        if (!isset($errorMessage)) {
            $registerSuccess = $service->register($username, $password);
            if ($registerSuccess) {
                header("Location: friends.php");
                exit();
            } else {
                $errorMessage = "Error occurred during registration.";
            }
        }
    }
    ?>

</head>

<body>
<img src="images/unicorn.jpg" style="width: 200px; height: auto;">

<style>
    body {
        background-color: rgb(255, 106, 198);
    }
</style>
        <h1>Register Yourself</h1>
        <form method="post">
            <fieldset>
                    <div class="mx-5 my-4" >
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" onkeyup="validateUsername(this)">
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Username must be at least 3 characters long.</div>
                </div>

                <div class="mx-5 my-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" onkeyup="validatePassword(this)">
                    <div class="valid-feedback">Password looks strong!</div>
                    <div class="invalid-feedback">Password must be at least 8 characters long.</div>
                </div>

                <div class="mx-5 my-4">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" onkeyup="validateConfirmPassword(this)">
                    <div class="valid-feedback">Passwords match!</div>
                    <div class="invalid-feedback">Passwords do not match.</div>
                </div>
            </fieldset>

            <?php if (isset($errorMessage)): ?>
                <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary">Create Account</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='login.php'">Cancel</button>
        </form>


    <script>
        function validateUsername(input) {
            if (input.value.length >= 3) {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
            } else {
                input.classList.remove('is-valid');
                input.classList.add('is-invalid');
            }
        }

        function validatePassword(input) {
            if (input.value.length >= 8) {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
            } else {
                input.classList.remove('is-valid');
                input.classList.add('is-invalid');
            }
        }

        function validateConfirmPassword(input) {
            const password = document.getElementById('password').value;
            if (input.value === password) {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
            } else {
                input.classList.remove('is-valid');
                input.classList.add('is-invalid');
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
