async function addFriend(username) {
    const requestData = JSON.stringify({ "username": username });
    await post('/friend', requestData)
}

async function loadUsers() {
    const users = await get('/user');
    const friends = (await get('/friend')).map((friend) => friend.username);
    const currentUser = "Tom"
    const datalist = document.getElementById('friend-selector');


    users.forEach(user => {
        if (user != currentUser && !friends.includes(user)) {
            const option = document.createElement('option');
            option.value = user;
            datalist.appendChild(option);
        }
    },
    );
}


async function loadFriends() {
    const data = await get('/friend');
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
}

// window.setInterval(loadFriends, 1000);
// loadFriends();
// loadUsers();