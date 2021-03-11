var user = document.getElementById('user-list-view');
var list = document.getElementById('list-container');
user.addEventListener('click', function (event) {
    event.preventDefault();
    list.classList.toggle("list-hide");
})