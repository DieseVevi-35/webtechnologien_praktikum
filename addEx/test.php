<!-- ... -->
<body>
<?php
if(isset($_POST["test"])) {
    if(!empty($_POST["test"])) {
        echo "Wert: " . $_POST["test"] ."<br>";
    } else {
        echo "Kein Wert!"."<br>";
    }
} else {
    echo "Kein Parameter übergeben"."<br>";
}

if(isset($_POST["foo"])) {
    if(!empty($_POST["foo"])) {
        echo "Wert: " . $_POST["foo"]."<br>";
    } else {
        echo "Kein Wert!"."<br>";
    }
} else {
    echo "Kein Parameter übergeben"."<br>";
}

var_dump($_POST);
?>
</body>
<!-- ... -->