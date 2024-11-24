//friends.js

//vars
var xmlhttp = new XMLHttpRequest();
//functions https://online-lectures-cs.thi.de/chat/9aec2666-0255-4bda-8809-59228e4e9bf2/user/


function loadUsers() {
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            let data = JSON.parse(xmlhttp.responseText);
            const datalist = document.getElementById('friend-selector');
            data.forEach(user => {
                const option = document.createElement('option');
                option.value = user;
                datalist.appendChild(option);
            });
        } else if (xmlhttp.readyState == 4) {
            console.error('Request failed with status:', xmlhttp.status);
        }
    };
    xmlhttp.open("GET", `${serverUrl}/user/`, true);
    xmlhttp.setRequestHeader('Authorization', 'Bearer ' + accessToken);
    xmlhttp.send();
}


function loadFriends() {
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            let data = JSON.parse(xmlhttp.responseText);
            const friendList = document.getElementById('friend-list');
            const requestList = document.getElementById('request-list');
            console.log(data);
            friendList.innerHTML = '';
            requestList.innerHTML = '';
            data.forEach(friend => {
                const listItem = document.createElement('li');


                if (friend.status === 'accepted') {
                    const link = document.createElement('a');
                    link.textContent = friend.username;
                    link.setAttribute("href", "chat.html?friend=" + friend.username);
                    listItem.appendChild(link);
                    const notificationCounter = document.createElement("span");
                    notificationCounter.setAttribute("class", "notification");
                    notificationCounter.textContent = friend.unread;
                    listItem.appendChild(notificationCounter);
                    friendList.appendChild(listItem);
                } else if (friend.status === 'requested') {
                    listItem.innerHTML = `Friend request from <strong>${friend.username}</strong><button>Accept</button><button>Reject</button>`
                    requestList.appendChild(listItem);
                }
            });
        } else if (xmlhttp.readyState == 4) {
            console.error('Request failed with status:', xmlhttp.status);
        }
    };
    xmlhttp.open("GET", `${serverUrl}/friend/`, true);
    xmlhttp.setRequestHeader('Authorization', 'Bearer ' + accessToken);
    xmlhttp.send();
}

window.setInterval(loadFriends, 1000);
loadFriends();
loadUsers();