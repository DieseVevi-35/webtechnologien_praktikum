async function addFriend(username) {
    const requestData = JSON.stringify({ "username": username });
    await post('/friend', requestData)
}

async function loadUsers() {
    const users = await get('/ajax_load_users.php');
    let friends = []
    try {
        friends = (await get('/ajax_load_friends.php')).map((friend) => friend.username);
    } catch (e) {
        console.log(e)
    }
    const datalist = document.getElementById('friend-selector');
    users.forEach(user => {
        console.log(user != currentUser);
        if (user != currentUser && !friends.includes(user)) {
            const option = document.createElement('option');
            option.value = user;
            datalist.appendChild(option);
        }
    },
    );
}


async function loadFriends() {
    try {
        const data = await get('/ajax_load_friends.php');
        const friendList = document.getElementById('friend-list');
        const requestList = document.getElementById('request-list');
        friendList.innerHTML = '';
        requestList.innerHTML = '';
        data.forEach(friend => {
            const listItem = document.createElement('li');

            if (friend.status === 'accepted') {
                const link = document.createElement('a');
                link.textContent = friend.username;
                link.setAttribute("href", "chat.php?friend=" + friend.username);
                listItem.appendChild(link);
                const notificationCounter = document.createElement("span");
                notificationCounter.setAttribute("class", "notification");
                notificationCounter.textContent = friend.unread;
                listItem.appendChild(notificationCounter);
                friendList.appendChild(listItem);
            } else if (friend.status === 'requested') {
                listItem.innerHTML = `<form method="post" onsubmit="friends.php"><li><input type="hidden" name="request_friend_name" value="${friend.username}"> Friend request from <strong>${friend.username}</strong><button name="accept">Accept</button><button name="reject">Reject</button></li></form>`
                requestList.appendChild(listItem);
            }
        });
    } catch (e) {
        console.log(e);
    }
}

window.setInterval(loadFriends, 1000);
loadUsers();
loadFriends();
