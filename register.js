function checkUsername(callback) {
    const username = document.getElementById("username").value;
    const usernameColor = document.getElementById("username");

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
                usernameColor.style.border = "2px solid rgb(122, 5, 3)";
                usernameColor.style.backgroundColor = "rgb(201, 8 , 5)";
                return;
            } else if (xmlhttp.status === 404) {
                console.log("Does not exist");
                usernameColor.style.border = "2px solid rgb(116, 185, 105)";
                usernameColor.style.backgroundColor = "rgb(224, 242, 206)";
                callback();
            }
        }
    };

    const url = `${serverUrl}/user/${username}`;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

function checkPassword() {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm_password").value;
    const passwordColor = document.getElementById("password");
    const confirmPasswordColor = document.getElementById("confirm_password");

    if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        passwordColor.style.border = "2px solid rgb(122, 5, 3)";
        passwordColor.style.backgroundColor = "rgb(201, 8 , 5)";
        return false;
    } else {
        passwordColor.style.border = "2px solid rgb(116, 185, 105)";
        passwordColor.style.backgroundColor = "rgb(224, 242, 206)";
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        passwordColor.style.border = "2px solid rgb(122, 5, 3)";
        passwordColor.style.backgroundColor = "rgb(201, 8 , 5)";
        confirmPasswordColor.style.border = "2px solid rgb(122, 5, 3)";
        confirmPasswordColor.style.backgroundColor = "rgb(201, 8 , 5)";
        return false;
    }

    return true;
}

function validateForm(event) {
    event.preventDefault();
    checkUsername(function () {
        if (checkPassword()) {
            document.getElementById("registerForm").submit();
        }
    });
}