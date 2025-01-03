
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
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' crossorigin='anonymous'>
</head>

<body class="container-fluid " style="background-color: #FF00FF;">
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-left">Friends</h1>
                        <div class="btn-group">
                            <a href='logout.php' id="critical-link" class="btn btn-danger">&lt Log out</a> 
                            <a href='settings.php'class="btn btn-secondary">Settings</a>
                        </div>
                        
                        <hr>
                        <!-- I have to find a away to add the classes to the migrated list items -->
                        <ul id="friend-list" class="list-group">
                            <li class="list-group-item">Friend placeholder 1</li>
                            <li class="list-group-item">Friend placeholder 2</li>
                        </ul>
                        
                        <hr>
                        
                        <h3>New Requests</h3>
                        <ol id="request-list" class="list-group">
                            <li class="list-group-item list-group-item-action" id="request-item-1">request placeholder 1</li>
                            <li class="list-group-item list-group-item-action" id="request-item-2">request placeholder 2</li>
                        </ol>
                        
                        <hr>
                        
                        <form method="post" onsubmit="friends.php">
                            <div class="input-group mb-3">
                                <input type='text' id='add-friend' placeholder='Add Friend to List' name='potential_friend_name' list="friend-selector" class="form-control">
                                
                                <datalist id="friend-selector">
                                    </datalist>
                                    <button class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- This right here ist the modal one cannot see yet -->
    <div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="requestModalLabel">Request Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Modal content goes here -->
                <p id="modalContent">Request details will be shown here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Decline</button>
                <button type="button" class="btn btn-success">Accept</button>
            </div>
            </div>
        </div>
    </div>
</body>
<!-- Here i iclude the BS JS Pack -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.querySelectorAll('.list-group-item-action').forEach(item => {
            item.addEventListener('click', function() {
                const modalContent = document.getElementById('modalContent');
                modalContent.textContent = this.textContent; // Set modal content to the clicked item's text
                const requestModal = new bootstrap.Modal(document.getElementById('requestModal'));
                requestModal.show();
            });
        });

</script>

<script>
    const currentUser = "<?php echo $_SESSION['user']->getUsername() ?>";
</script>
<script src="https_calls.js"></script>
<script src="constants.js"></script>
<script src="friends.js"></script>

</html>