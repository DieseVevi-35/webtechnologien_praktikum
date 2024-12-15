<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    require("start.php");
    $user = new Model\User("Test");
    $json = json_encode($user);
    ?>

</head>
<body>
    <?php echo $json; ?>
</body>
</html>