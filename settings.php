<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Alle namen immer in der Konvention kleingeschrieben-kleingeschrieben -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="centered-container">
    <div class="content-container">
        <h1>Profile Settings</h1>
        <fieldset>
            <legend>Base Data</legend>
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" placeholder="Your name" name="first-name" />
            <br />
            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" placeholder="Your surname" name="last-name" />
            <br />
            <label for="coffee-or-tea">Coffee or Tea?</label>
            <br />
            <select name="coffee-or-tea" id="coffee-or-tea">
                <option value="">Coffee</option>
                <option value="">Tea</option>
                <option value="">Neither nor</option>
                <option value="">Both</option>
            </select>
        </fieldset>
        <fieldset>
            <legend>Tell Something About You</legend>
            <textarea id="about" placeholder="Leave a comment here" name="about"></textarea>
        </fieldset>
        <fieldset>
            <legend>Prefered Chat Layout</legend>
            <div class="radiobutton-container">
                <div class="radio-group">
                    <input type="radio" id="layout-one-line" placeholder="Your name" name="layout-seperate-lines" />
                    <label for="layout-one-line">Username and message in one line</label>
                </div>
                    <br />
                <div class="radio-group">
                    <input type="radio" id="layout-seperate-lines" placeholder="Your surname" name="layout-seperate-lines" />
                    <label for="layout-seperate-lines">Username and message in seperate lines</label>
                </div>
            </div>
            <br />
        </fieldset>

        <a href="friends.php">
            <button>Cancel</button>
        </a>

        <a href="friends.php">
            <button>Save</button>
        </a>
    </div>
</body>

</html>