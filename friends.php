
<?php
    require 'start.php';
    if (!isset($_SESSION['user'])){
        header("Location: login.php");
    }

    $friends = $service->loadFriends();
    $users = $service->loadUsers();
    $current_user = $_SESSION['user'];

    $not_friends = [];

    foreach($users as $user) {
        if ($user != $current_user->getUsername()) {
            $is_friend = false;

            foreach($friends as $friend) {
                echo $friend;
                if($friend->getUsername() == $user->getUsername()) {
                    $is_friend = true;
                    break;
                }
            }
        }

        if (!$is_friend) {
            array_push($not_friends, $user);
        }
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Alle namen immer in der Konvention kleingeschrieben-kleingeschrieben -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>friends</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="centered-container">
    <div class="content-container">
        <h1>Friends</h1>
        <a href='logout.php' id="critical-link">&lt Log out</a> |
        <a href='settings.php'>Settings</a>

        <hr>

        <ul id="friend-list">
            <?php 
                 foreach($friends as $friend){
                    echo '<li><a href="chat.html?friend=' . $friend->getUsername() . '">' . $friend->getUsername() . '</a><span class="notification">' . $friend->getUnread() . '</span></li>';
                }
            
            ?>
        </ul>

        <hr>

        <h3>New Requests</h3>
        <ol id="request-list">
        </ol>

        <hr>

        <input type='text' id='add-friend' placeholder='Add Friend to List' name='add-friend' list="friend-selector">
        <datalist id="friend-selector">
            <?php
                foreach($not_friends as $username) {
                    echo '<option value="' . $username . '"></option>';
                }
                ?>
        </datalist>
        <button type="button">Add</button>
    </div>
</body>

<script src="https_calls.js"></script>
<script src="constants.js"></script>
<script src="friends.js"></script>

</html>