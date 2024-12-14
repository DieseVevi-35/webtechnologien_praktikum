<?php
require_once 'start.php';

use Model\User;

/*
if (!($BackendService->isAuthentificated)) {
    header('Location: login.php');
    exit;
} */
    

$userData = $_SESSION['user'];
$user = User::fromJson(json_decode($userData, true));
$backendService = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user->setFirstName($_POST['first-name']);
    $user->setLastName($_POST['last-name']);
    $user->setAbout($_POST['about']);
    $user->setDrink($_POST['coffee-or-tea']);
    $user->setLayout($_POST['layout']);
    

    $user->addProfileChange('Profile updated');

    $service->saveUser($user);

    $_SESSION['user'] = json_encode($user);
    $successMessage = "Profile updated successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Settings</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="centered-container">
    <div class="content-container">
        <h1>Profile Settings</h1>

        <?php if (isset($successMessage)): ?>
            <p class="success-message"> <?= htmlspecialchars($successMessage) ?> </p>
        <?php endif; ?>

        <form method="POST" action="settings.php">
            <fieldset>
                <legend>Base Data</legend>
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" placeholder="Your name" name="first-name" value="<?php echo $user->getFirstName(); ?>" />
                <br />
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" placeholder="Your surname" name="last-name" value="<?php echo $user->getLastName(); ?>" />
                <br />

                <label for="coffee-or-tea">Coffee or Tea?</label>
                <br />
                <select name="coffee-or-tea" id="coffee-or-tea">
                    <option value="coffee" <?php echo ($user->getDrink() != null && $user->getDrink() == "coffee") ? 'selected' : ''; ?>>Coffee</option>
                    <option value="tea" <?php echo ($user->getDrink() != null && $user->getDrink() == "tea") ? 'selected' :''; ?>>Tea</option>
                    <option value="neither" <?php echo ($user->getDrink() != null && $user->getDrink() == "neither") ? 'selected' :''; ?>>Neither nor</option>
                    <option value="both" <?php echo ($user->getDrink() != null && $user->getDrink() == "both") ? 'selected' :''; ?>>Both</option>
                </select>
            </fieldset>
            
            <fieldset>
                <legend>Tell Something About You</legend>
                <textarea id="about" placeholder="Leave a comment here" name="about"> <?php echo $user->getAbout(); ?></textarea>
            </fieldset>
            <fieldset>
                <legend>Preferred Chat Layout</legend>
                <div class="radiobutton-container">
                    <div class="radio-group">
                        <input type="radio" id="layout-one-line" name="layout" value="one-line" <?php echo !$user->getLayout() ? 'checked' : '' ?> />
                        <label for="layout-one-line">Username and message in one line</label>
                    </div>
                    <br />
                    <div class="radio-group">
                        <input type="radio" id="layout-separate-lines" name="layout" value="separate-lines" <?php echo $user->getLayout() ? 'checked' : '' ?> />
                        <label for="layout-separate-lines">Username and message in separate lines</label>
                    </div>
                </div>
                
                <br />
            </fieldset>

            <button type="submit">Save</button>
            <a href="friends.php"><button type="button">Cancel</button></a>
        </form>
    </div>
</body>

</html>
