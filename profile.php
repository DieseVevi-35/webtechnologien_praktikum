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
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' crossorigin='anonymous'>
</head>

<body class="container-fluid" style="background-color: #FF00FF;">

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="card" style="background-color:rgb(240, 175, 255);">
                    <div class="card-header">
                        <h1 class="text-center">Profile of <?php echo isset($user) ? htmlspecialchars($user->getUsername()) : ""; ?></h1>
                    </div>

                        <div class="card-body">
                            <div class="profile-buttons mb-3">
                                <a href="chat.php" class="btn btn-secondary me-2">&lt; Back to Chat</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeFriendModal">
                                    Remove Friend
                                </button>

                            </div>

                    
                            <div class="row">
                                <!-- Profile Image -->
                                <div class="col-sm-6">
                                    <img src="images/profile.png" alt="Profile Symbol" style="width: 100%; height: auto; object-fit: cover;">
                                </div>

                                <!-- Profile Information -->
                                 
                                <div class="col-sm-6">
                                    <div class="container md-2" style="background-color: rgb(250, 228, 255);">
                                        <p>
                                            <?php echo isset($user) ? htmlspecialchars($user->getAbout()) : "Testtext"; ?>
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

                        </div>
                             
                </div>

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
