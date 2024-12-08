loadChat();

window.setInterval(function () {
    loadChat()
}, 1000);



async function loadChat() {
    const friendName = getFriendName();
    const messagesJson = await get(`/message/${friendName}`);
    const chatHtml = generateChatHtml(messagesJson);
    setChatContent(chatHtml, friendName);
}

function sendMessage() {
    const receiver = getFriendName();
    const messageField = document.getElementById("message-field");
    const message = messageField.value;

    const requestBody = { "message": message, "to": receiver };
    const requestBodyString = JSON.stringify(requestBody);
    post("/message", requestBodyString);
    messageField.value = "";

}

function setChatContent(chatHtml, friendName) {
    usernameContainer = document.getElementById("username");
    username =
        chatContainer = document.getElementById("chat-messages");

    usernameContainer.innerHTML = friendName;
    chatContainer.innerHTML = chatHtml;
}

function generateChatHtml(messagesJson) {
    html = "";
    for (message of messagesJson) {
        const date = new Date(message["time"]);
        const timeStamp = `${date.getHours()}:${date.getMinutes()}`;

        html += '<div class="chat-message">';
        html += `<span class="message-text">${message["from"]}: ${message["msg"]}</span>`;
        html += `<span class="timestamp">${timeStamp}</span>`;
        html += "</div>";
    }

    return html;
}

/// Gets the friends name from the current url
function getFriendName() {
    const url = new URL(window.location.href);
    const queryParameters = url.searchParams;
    const friendName = queryParameters.get("friend");

    return friendName;
}


/// Performs a GET request on the server using a give url path
///
/// Parameters:
/// - String: urlPath
///
/// Returns:
/// - Promise(String): responseJson
function get(urlPath) {
    return new Promise(function (resolve, reject) {
        const xmlHttp = new XMLHttpRequest();

        xmlHttp.onload = function () {
            if (xmlHttp.status == 200 || xmlHttp.status == 304) {
                const responseJson = JSON.parse(xmlHttp.responseText);
                resolve(responseJson);
            }
        }

        xmlHttp.open("GET", serverUrl + urlPath);
        xmlHttp.setRequestHeader('Authorization', `Bearer ${accessToken}`);
        xmlHttp.send();
    });
}


function post(urlPath, requestBodyString) {
    return new Promise(function (resolve, reject) {
        const xmlHttp = new XMLHttpRequest();

        xmlHttp.onload = function () {
            if (xmlHttp.status == 200 || xmlHttp.status == 304) {
                const responseJson = JSON.parse(xmlHttp.responseText);
                resolve(responseJson);
            }
        }

        xmlHttp.open("POST", serverUrl + urlPath);
        xmlHttp.setRequestHeader('Authorization', `Bearer ${accessToken}`);
        xmlHttp.setRequestHeader('Content-type', 'application/json');
        xmlHttp.send(requestBodyString);
    });
}