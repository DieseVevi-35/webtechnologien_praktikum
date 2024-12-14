<?php
require_once 'start.php';

use Model\Friend;

//Prüfung ob eingeloggt
/*if (!($BackendService->isAuthentificated)) {
    header('Location: login.php');
    exit;
}
*/

//wenn kein Nutzer angegeben auf freundesliste weiterleiten
/*
if (!$friend) {
    header('Location: friends.php');
    exit;
}
*/

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="centered-container">
    <div class="content-container">
        <h1> Profile of <?php echo isset($friend) ? $friend->getFirstName() : ""; ?></h1>
        <a href="chat.php"> &lt Back to Chat</a> 
        |
        <a href="friends.php">Remove Friend</a> <br><br> <!-- abklären Query Parameter. Link Ziel Friendsliste (Funktionalität entsprechend umsetzten!) -->

        <div class="profile">
            <div class="profile-image">
                <img src="images/profile.png" alt='profile-symbol' width='200' height='200'>
            </div>
            <div class="profile-info">
                <p> <?php echo isset($friend) ? $friend->getAbout() : "This should actually contain data from your friends"; ?>
                </p>
                <dl>
                    <dt>Coffee or Tea?</dt>
                    <dd>Tea</dd>
                    <dt>Name</dt>
                    <dd> <?php echo isset($friend) ? $user->getFirstName() . ' ' . $friend->getLastName() : ""; ?></dd>
                </dl>
            </div>
        </div>
    </div>
</body>
</html>