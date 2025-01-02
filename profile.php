<?php
require_once 'start.php';

if (!isset($_SESSION['user'])) {
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
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: rgb(255, 106, 198);
            color: white;
        }
        .profile-container {
            margin: 30px auto;
            max-width: 800px;
            padding: 20px;
            background-color: rgb(179, 0, 110);
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            margin-bottom: 20px;
        }
        .profile-header h1 {
            font-size: 1.5rem;
        }
        .profile-buttons {
            margin-bottom: 20px;
        }
        .profile-body {
            display: flex;
            gap: 20px;
        }
        .profile-img {
            flex: 1;
            max-width: 200px;
        }
        .profile-img img {
            width: 100%;
            border-radius: 10px;
        }
        .profile-details {
            flex: 2;
        }
        .profile-details dl {
            margin-top: 20px;
        }
        .profile-details dt {
            font-weight: bold;
        }
    </style>

</head>

<body>
    <div class="container profile-container">
        <!-- Header Section -->
        <div class="profile-header d-flex justify-content-between align-items-center">
            <h1>Profile of <?php echo isset($user) ? htmlspecialchars($user->getUsername()) : ""; ?></h1>
        </div>
        <div class="profile-buttons">
            <a href="chat.php" class="btn btn-secondary me-2">&lt; Back to Chat</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeFriendModal">
                Remove Friend
            </button>

        </div>

        <div class="profile-body">
            <!-- Profile Image -->
            <div class="profile-img">
                <img src="images/profile.png" alt="Profile Symbol">
            </div>

            <div class="profile-details">
                <p>
                    <?php echo isset($user) ? htmlspecialchars($user->getAbout()) : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam."; ?>
                </p>
                <dl class="row">
                    <dt class="col-sm-4">Coffee or Tea?</dt>
                    <dd class="col-sm-8"><?php echo isset($user) ? htmlspecialchars($user->getDrink()) : ""; ?></dd>

                    <dt class="col-sm-4">Name</dt>
                    <dd class="col-sm-8">
                        <?php echo isset($user) ? htmlspecialchars($user->getFirstName()) . ' ' . htmlspecialchars($user->getLastName()) : ""; ?>
                    </dd>
                </dl>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="removeFriendModal" tabindex="-1" aria-labelledby="removeFriendModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="removeFriendModalLabel">Confirm Remove Friend</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove <strong><?php echo isset($user) ? htmlspecialchars($user->getUsername()) : ""; ?></strong> as a friend?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="post" action="friends.php">
                        <input type="hidden" name="to_be_removed_friend" value="<?php echo isset($user) ? htmlspecialchars($user->getUsername()) : ""; ?>">
                        <button type="submit" class="btn btn-danger">Yes, Remove Friend</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
