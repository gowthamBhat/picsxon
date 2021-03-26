var user = document.getElementById('user-list-view');
var list = document.getElementById('list-container');
user.addEventListener('click', function (event) {
    event.preventDefault();

    list.classList.toggle("list-hide");
})


//* Fetch call scripts
var user_table = document.getElementById("user-table");

window.onload = fetchCall();

function fetchCall() {
    fetch(`userList.php`)
        .then(response => response.json())
        .then(data => {
            fetchDataHandler(data)
        });
}

function fetchDataHandler(data) {
    let userListOutPut = '';
    console.log(data);

    if (data == 0) {
        userListOutPut = `<thead>
    <tr>
        <th><h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp No Users Found </h3></th>
       
    </tr>
</thead>`;
    } else {
        userListOutPut = `<thead>
    <tr>
        <th>&nbsp&nbsp&nbsp Name </th>
        <th> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Email </th>
        <th> </th>
    </tr>
</thead>`;

        for (let i = 0; i < data.length; i++) {
            userListOutPut += "<tr><td>" + data[i][1] + "</td> <td> &nbsp&nbsp&nbsp " + data[i][3] + "</td> <td> <button class='btn btn-danger btn-sm' onclick=deleteUser(" + data[i][0] + ")>X</button></td> </tr>"
        }
    }
    user_table.innerHTML = userListOutPut;
}

function deleteUser(id) {

    fetch(`deleteUser.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            fetchCall();
        });
}