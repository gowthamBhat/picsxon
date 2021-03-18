var user = document.getElementById('user-list-view');
var list = document.getElementById('list-container');
user.addEventListener('click', function (event) {
    event.preventDefault();
    list.classList.toggle("list-hide");
})


//* Fetch call scripts

window.onload = function () {

    fetch(`userList.php`)
        .then(response => response.json())
        .then(data => {
            fetchDataHandler(data)
        });
}

function fetchDataHandler(data) {
    console.log(data);

}

function deleteUser(id) {

    fetch(`deleteUser.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            location.reload();
        });
}