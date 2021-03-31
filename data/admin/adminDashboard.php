<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:../../auth/admin_auth/login.php');
} else {
?>
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
                display: block;
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
                <button id="getPictures" class="btn btn-dark">Get Pictures</button>
                <button id="getSuperUserList" class="btn btn-warning">Requests</button>
                <a href="../../auth/user_auth/logout.php"> <button class="btn btn-danger">Logout</button></a>
            </div>
            <div class="nav-container-admin" style="width: fit-content;">
                <a href="../../auth/admin_auth/register.php"><button id="addAdmin" class=" btn btn-dark">Add Admin</button></a>
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
        <div class="picturelist-container">
            <div class="picture-list">
                <table class="table-data" id="pictureTable">
                </table>
            </div>
        </div>
        <br>
        <div class="superUser-container">
            <div class="superUser-list">
                <table class="table-data" id="superUserList">
                </table>
            </div>
        </div>
        <script>
            var superList = document.getElementById('getSuperUserList');
            superList.addEventListener('click', getSuperUserList);

            function getSuperUserList() {
                fetch('superUserList.php')
                    .then(response => response.json())
                    .then(data => {
                        HandleSuperUserList(data);
                    });
            }

            function HandleSuperUserList(data) {
                let tableData = ` 
<thead class="thead-dark">
<tr>
<th scope="col">id</th>
<th scope="col">name</th>
<th scope="col">Email</th>
<th scope="col">Accept</th>
<th scope="col">Decline</th>
</tr>
</thead>`;
                superTable = document.getElementById('superUserList');

                console.log(data);


                for (let i = 0; i < data.length; i++) {
                    tableData += "<tr><td>" + data[i][0] + "</td> <td> &nbsp&nbsp&nbsp " + data[i][1] + "</td> <td> &nbsp&nbsp&nbsp " + data[i][3] + "</td> <td> <button class='btn btn-danger btn-sm' onclick=acceptUser(" + data[i][0] + ")>Accept</button></td> <td> <button class='btn btn-danger btn-sm' onclick=declineUser(" + data[i][0] + ")>Decline</button></td>  </tr>"
                }

                superTable.innerHTML = tableData;

            }
        </script>
    </body>

    </html>
<?php } ?>