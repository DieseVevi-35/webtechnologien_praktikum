function checkUsername(callback) {
    const username = document.getElementById("username").value;

    if (username.length < 3) {
        alert("Username must be at least 3 characters long.");
        return false;
    }

    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4) {
            if (xmlhttp.status === 204) {
                console.log("Exists");
                alert("Username already exists. Please choose another one.");
                return;
            } else if (xmlhttp.status === 404) {
                console.log("Does not exist");
                callback();
            }
        }
    };

    const url = `https://online-lectures-cs.thi.de/chat/9aec2666-0255-4bda-8809-59228e4e9bf2/user/${username}`;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

function checkPassword() {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm_password").value;

    if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    return true;
}

function validateForm(event) {
    event.preventDefault();
    checkUsername(function() {
        if (checkPassword()) {
            document.getElementById("registerForm").submit();
        }
    });
}

/*
ToDo Verena:
- rote Umrandungen --> css!
- Klärung Case-Sensitivity bei Username Prüfung
- method="get" da "post" nicht funktioniert --> mit php umsetzen?
- bei Password/Confirm Password: required hinzufügen? (da man sonst immer erst alles ausfüllen muss, bevor prüfung erfolgt)
*/