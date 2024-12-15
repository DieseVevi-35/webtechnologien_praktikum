<?php
require_once 'start.php';

if (!isset($_SESSION['user'])){
    header("Location: login.php");
} elseif (!isset($_GET['user'])) {
    header("Location: friends.php");
}

$user = $service->loadUser($_GET['user']);
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
        <h1> Profile of <?php echo isset($user) ? $user->getUsername() : ""; ?></h1>
        <a href="chat.php"> &lt Back to Chat</a> 
        |
        <form method="post" action="friends.php">
            <input type="hidden" name="to_be_removed_friend" value="<?php echo $user->getUsername() ?>">
            <button id="critical-link">Remove Friend</button>
        </form>

        <div class="profile">
            <div class="profile-image">
                <img src="images/profile.png" alt='profile-symbol' width='200' height='200'>
            </div>
            <div class="profile-info">
                <p> <?php echo isset($user) ? $user->getAbout() : "This should actually contain data from your friends"; ?>
                </p>
                <dl>
                    <dt>Coffee or Tea?</dt>
                    <dd> <?php echo isset($user) ? $user->getDrink() : ""; ?></dd>
                    <dt>Name</dt>
                    <dd> <?php echo isset($user) ? $user->getFirstName() . ' ' . $user->getLastName() : ""; ?></dd>
                </dl>
            </div>
        </div>
    </div>
</body>
</html>