<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <?php
            $testWert = "";
            if(isset($_POST['test'])) {
                $testWert = $_POST['test'];
            }
        ?>
    </head>
        <!-- Why does the form also get -->
    <body>
    <form method="post" action="test.php">
        <input name="test" value="<?= $testWert; ?>">
        <button type="submit" name="action" value="foo1">Absenden1</button>
        <button type="submit" name="action" value="foo2">Absenden2</button>
        <button type="submit" name="bar" value="foo3">Absenden3</button>
    </form>
        <?php var_dump($_POST); ?>
    </body>
</html>