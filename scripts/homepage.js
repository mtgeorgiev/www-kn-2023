
const onPageLoad = () => {
    
    clearUsersListContainer();

    fetch('./sessions.php')
        .then(r=>r.json())
        .then(r=> {
            if (r.result) { // user is logged
                document.querySelectorAll('.when-logged').forEach(element => {
                    element.classList.remove('hidden');
                });
                document.querySelectorAll('.when-not-logged').forEach(element => {
                    element.classList.add('hidden');
                });
            } else { // user is not logged
                document.querySelectorAll('.when-logged').forEach(element => {
                    element.classList.add('hidden');
                });
                document.querySelectorAll('.when-not-logged').forEach(element => {
                    element.classList.remove('hidden');
                });
            }
        });
};

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

const onLoginFormSubmit = event => {
    event.preventDefault();

    const formData = new FormData(document.getElementById('login'));
    fetch('./sessions.php', {method:'POST',body:formData})
        .then(r=>r.json())
        .then(r=> {
            if (r.result) { // successful login
                onPageLoad();
            } else { // not successful
                alert('Неуспешно влизане');
            }
        });
}

const onLogoutButtonClick = () => {
    fetch('./sessions.php', {method:'DELETE'})
        .then(r => r.json())
        .then(r => {
            onPageLoad();
        });
}

document.getElementById('view-all-users')
        .addEventListener('click', onViewAllUsersClick);

document.getElementById('login')
        .addEventListener('submit', onLoginFormSubmit);

document.getElementById('logout')
        .addEventListener('click', onLogoutButtonClick);

onPageLoad();


/*

// register
fetch('./users.php', {method:'POST',body:userData})
  .then(r=>r.json())
  .then(r=>console.log(r));
*/