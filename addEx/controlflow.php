<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        $list = array(1, 2, 3, 4, 5);
    ?>
</head>
<body>
    <?php
    //only dump the variables (no html)
        var_dump($list);

    //create a paragraph for every value
        foreach($list as $value){
            echo "<p>" . $value . "</p>";
        }
    ?>
    <br>
    <?php 
    //embed html in the iteration by breaking up the php flow
    //the loop is gonna create the html multiple times for each iteration
        foreach($list as $value){
    ?>
    <p><?php echo $value; ?></p>
    <?php
        }
    ?>
</body>
<!-- -->
</html>