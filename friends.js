//friends.js

//vars
var xmlhttp = new XMLHttpRequest();
//functions https://online-lectures-cs.thi.de/chat/9aec2666-0255-4bda-8809-59228e4e9bf2/user/

document.addEventListener('DOMContentLoaded', function() {
    fetch('/token.php')
        .then(response => response.json())
        .then(data => {
            const authToken = data.token;
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    let data = JSON.parse(xmlhttp.responseText);
                    const datalist = document.getElementById('friend-selector');
                    data.forEach(friend => {
                        const option = document.createElement('option');
                        option.value = friend.name;
                        datalist.appendChild(option);
                    });
                } else if (xmlhttp.readyState == 4) {
                    console.error('Request failed with status:', xmlhttp.status);
                }
            };
            xmlhttp.open("GET", "https://online-lectures-cs.thi.de/chat/9aec2666-0255-4bda-8809-59228e4e9bf2/user/", true);
            xmlhttp.setRequestHeader('Authorization', 'Bearer ' + authToken);
            xmlhttp.send();
        })
        .catch(error => console.error('Error fetching token:', error));
});


function loadFriends() {
    fetch('/token.php')
        .then(response => response.json())
        .then(data => {
            const authToken = data.token;
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    let data = JSON.parse(xmlhttp.responseText);
                    const friendList = document.getElementById('friend-list');
                    const requestList = document.getElementById('request-list');
                    friendList.innerHTML = '';
                    requestList.innerHTML = '';
                    data.forEach(friend => {
                        const listItem = document.createElement('li');
                        const link = document.createElement('a');
                        link.textContent = friend.name;
                        link.setAttribute("href", "chat.html?friend=" + friend.username);
                        listItem.appendChild(link);
                        if (friend.status === 'accepted') {
                            friendList.appendChild(listItem);
                        } else if (friend.status === 'requested') {
                            requestList.appendChild(listItem);
                        }
                    });
                } else if (xmlhttp.readyState == 4) {
                    console.error('Request failed with status:', xmlhttp.status);
                }
            };
            xmlhttp.open("GET", "https://online-lectures-cs.thi.de/chat/9aec2666-0255-4bda-8809-59228e4e9bf2/user/", true);
            xmlhttp.setRequestHeader('Authorization', 'Bearer ' + authToken);
            xmlhttp.send();
        })
        .catch(error => console.error('Error fetching token:', error));
}

window.setInterval(loadFriends, 1000);
loadFriends();