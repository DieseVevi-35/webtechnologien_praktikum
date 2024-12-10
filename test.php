<!-- ... -->
<body>
<?php
if(isset($_GET["test"])) {
    if(!empty($_GET["test"])) {
    echo "Wert: " . $_GET["test"] ."<br>";
    } else {
    echo "Kein Wert!"."<br>";
    }
    } else {
    echo "Kein Parameter übergeben"."<br>";
    }
if(isset($_GET["foo"])) {
    if(!empty($_GET["foo"])) {
    echo "Wert: " . $_GET["foo"]."<br>";
    } else {
    echo "Kein Wert!"."<br>";
    }
    } else {
    echo "Kein Parameter übergeben"."<br>";
    }
?>
</body>
<!-- ... -->