
<?php
    require 'start.php';
    if (!isset($_SESSION['user'])){
        header("Location: login.php");
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['potential_friend_name'])) {
            //echo $_POST['potential_friend_name'];
            $friend_name_array = array(
                'username' => $_POST['potential_friend_name'],
            );
            $service->friendRequest($friend_name_array);

        } elseif (isset($_POST['request_friend_name'])) {
            if (isset($_POST['accept'])) {
                $service->friendAccept($_POST['request_friend_name']);
            } else {
                $service->friendDismiss($_POST['request_friend_name']);
            }
        } elseif (isset($_POST['to_be_removed_friend'])) {
            $service->removeFriend($_POST['to_be_removed_friend']);
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
        </ul>

        <hr>

        <h3>New Requests</h3>
        <ol id="request-list">
        </ol>

        <hr>

        <form method="post" onsubmit="friends.php">
            <input type='text' id='add-friend' placeholder='Add Friend to List' name='potential_friend_name' list="friend-selector">

            <datalist id="friend-selector">
            </datalist>
            <button>Add</button>
        </form>
    </div>
</body>

<script>
    const currentUser = "<?php echo $_SESSION['user']->getUsername() ?>";
</script>
<script src="https_calls.js"></script>
<script src="constants.js"></script>
<script src="friends.js"></script>

</html>