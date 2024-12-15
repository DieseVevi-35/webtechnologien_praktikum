
<?php
    require 'start.php';
    if (!isset($_SESSION['user'])){
        header("Location: login.php");
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['potential_friend_name'])) {
            echo $_POST['potential_friend_name'];
            $friend_name_array = array(
                'username' => $_POST['potential_friend_name'],
            );
            echo $service->friendRequest($friend_name_array);

        } elseif (isset($_POST['request_friend_name'])) {
            if (isset($_POST['accept'])) {
                $service->friendAccept($_POST['request_friend_name']);
            } else {
                $service->friendDismiss($_POST['request_friend_name']);
            }
        }
    }

    $friends = $service->loadFriends();
    $users = $service->loadUsers();
    $current_user = $_SESSION['user'];

    $not_friends = [];

    foreach($users as $user) {            
        $is_friend = false;

        if ($user != $current_user->getUsername()) {

            foreach($friends as $friend) {
                if($friend->getUsername() == $user) {
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
                    if ($friend->getStatus() == "accepted") {
                        echo '<li><a href="chat.html?friend=' . $friend->getUsername() . '">' . $friend->getUsername() . '</a><span class="notification">' . $friend->getUnread() . '</span></li>';
                    } else {
                        echo '<form method="post" onsubmit="friends.php"><li><input type="hidden" name="request_friend_name" value="' . $friend->getUsername() . '"> Friend request from <strong>' . $friend->getUsername() . '</strong><button name="accept">Accept</button><button name="reject">Reject</button></li></form>';
                    }

                }
            
            ?>
        </ul>

        <hr>

        <h3>New Requests</h3>
        <ol id="request-list">
        </ol>

        <hr>

        <form method="post" onsubmit="friends.php">
            <input type='text' id='add-friend' placeholder='Add Friend to List' name='potential_friend_name' list="friend-selector">

            <datalist id="friend-selector">
                <?php
                    foreach($not_friends as $username) {
                        echo '<option value="' . $username . '"></option>';
                    }
                    ?>
            </datalist>
            <button>Add</button>
        </form>
    </div>
</body>

<script src="https_calls.js"></script>
<script src="constants.js"></script>
<script src="friends.js"></script>

</html>