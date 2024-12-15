<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Alle namen immer in der Konvention kleingeschrieben-kleingeschrieben -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Out</title>
    <link rel="stylesheet" href="styles.css">
    <?php include 'start.php' 
    session_unset(); //Gott take a look at the workings when all files are complete 
    session_destroy();
    ?>
</head> 
<body>
    <img src="images/catBye.gif" alt='logout-symbol' width='100' height='100'>

    <h1>Logged out...</h1>
    <p>
        See u!
    </p>
    <a href='login.php'>Login again</a>
    
</body>
</html>