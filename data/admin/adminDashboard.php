<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/AdminDashBoard.css">
    <link rel="stylesheet" href="../../styles/unminify_bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script async defer src="../../js/adminDashboardScript.js"></script>
    <style>
        a:link {
            text-decoration: none !important;
        }

        .list-hide {
            display: none;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <a href="../../index.html">
        <h1 style="margin:30px 50px">Picsxon</h1>
    </a>
    <nav>
        <div class="nav-container-upload">


            <a href="photoupload.php"><button class="nav btn btn-dark">Upload Photo</button></a>

        </div>
        <div class="nav-container-2-user">
            <button id="user-list-view" class=" btn btn-dark">view users</button>
        </div>




    </nav>
    <center>
        <div id="image-container">
            <figure>
                <img id="admin" src="../../images/admin.png" alt="admin img" width="330" height="330">
                <i class="fas fa-camera-retro fa-2x" id="cam-icon" title="upload new image"></i>

                <figcaption>Admin</figcaption>
            </figure>
        </div>
    </center>


    <div class="list-container" id="list-container">
        <div class="user-list">

            <table class='table-data' id="user-table">


            </table>

        </div>
    </div>

    <script>
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
    </script>

</body>

</html>