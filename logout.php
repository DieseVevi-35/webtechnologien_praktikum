<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Alle namen immer in der Konvention kleingeschrieben-kleingeschrieben -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Out</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' crossorigin='anonymous'>
    <?php include 'start.php';
    session_unset(); 
    session_destroy();
    ?>
</head> 
<body class="container-fluid" style="background-color: #FF00FF;">
<div class="text-center mt-3">
    <img class="rounded-circle" src="images/catBye.gif" alt='Chat-Symbol' style="width: 150px; height: 150px; object-fit: cover; margin:50px;">
</div>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center">Logged out...</h1>
                        <h3 class="card-subtitle text-center mt-3 mb-3">
                            See u!
                        </h3>
                        <a href='login.php' id="login" class="flex-grow-1 me-2">
                            <button type="button" class="btn btn-secondary w-100">Login again</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>