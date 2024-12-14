<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Alle namen immer in der Konvention kleingeschrieben-kleingeschrieben -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="centered-container">
    <div class="content-container">
        <h1>Chat with <span id="username"></span></h1>
        <a href='friends.php'>&lt Back</a>
        |
        <a href='profile.php'>Profile</a>
        |
        <a href='friends.php' id="critical-link">Remove Friend</a>
        <br>
        Chatverlauf

        <div id="chat-messages">

        </div>
        <br>
        <input type='text' id='message-field' placeholder='New Message' name='MessagSending'>
        <button onclick="sendMessage()">Send</button>
    </div>
</body>

<script src="https_calls.js"></script>
<script src="constants.js"></script>
<script src="chat.js"></script>

</html>