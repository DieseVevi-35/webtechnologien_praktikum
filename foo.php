<?php 
    require("start.php");
    $user = new Model\User("Test");
    $json = json_encode($user);
    echo $json . "<br>";
    $jsonObject = json_decode($json);
    $newUser = Model\User::fromJson($jsonObject);
    
    ?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php var_dump($newUser); ?>
</body>
</html>