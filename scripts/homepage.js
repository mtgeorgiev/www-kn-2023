
const onViewAllUsersClick = event => {

    if (event.target.getAttribute('disabled')) {
        return;
    }

    clearUsersListContainer();

    event.target.setAttribute('disabled', 'disabled');
    showUserListLoader();
    
    viewAllUsers(() => {
        event.target.removeAttribute('disabled');
        hideUserListLoader();
    });
}

const clearUsersListContainer = () => {
    const usersListContainer = document.getElementById('users-list');
    usersListContainer
            .querySelectorAll('.user-info')
            .forEach(user => {
                usersListContainer.removeChild(user);
            });
}

const showUserListLoader = () => {
    document.getElementById('loader').removeAttribute('hidden');
}

const hideUserListLoader = () => {
    document.getElementById('loader').setAttribute('hidden','');
}

const viewAllUsers = (callback) => {

    const usersListContainer = document.getElementById('users-list');

    fetch('./users.php')
        .then(r=>r.json())
        .then(users => {
            users.forEach(user => {
                    usersListContainer.appendChild(userDataToHTMLElement(user));
                });

            callback.call();
        });
}

const userDataToHTMLElement = user => {
    const containerDiv = document.createElement('div');
    containerDiv.setAttribute('userid', user.id);
    containerDiv.setAttribute('class', 'user-info');
    containerDiv.innerHTML = `${user.email} Registered on: ${user.registeredOn}`;

    return containerDiv;
};

document.getElementById('view-all-users')
        .addEventListener('click', onViewAllUsersClick);