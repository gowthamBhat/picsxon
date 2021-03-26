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
    <script>
        var getPic = document.getElementById('getPictures').addEventListener('click', getPictures);
        var pictureTable = document.getElementById("pictureTable");

        function getPictures() {
            fetch('picturelist.php')
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    HandlePictureResponse(data);
                });
        }

        function HandlePictureResponse(data) {
            let tableData = ` 
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">picture name</th>
      <th scope="col">Category</th>
      <th scope="col">Likes</th>
      <th scope="col">dislike</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>`;
            for (let i = 0; i < data.length; i++) {
                tableData += "<tr><td>" + data[i][0] + "</td> <td> &nbsp&nbsp&nbsp " + data[i][1] + "</td> <td> &nbsp&nbsp&nbsp " + data[i][2] + "</td> <td>  " + data[i][3] + "</td> <td>  " + data[i][4] + "</td><td> <button class='btn btn-danger btn-sm' onclick=deletePicture(" + data[i][0] + ")>X</button></td>  </tr>"
            }

            pictureTable.innerHTML = tableData;
        }

        function deletePicture(id) {
            fetch(`deletePicture.php?id=${id}`)
                .then(response => response.json())
                .then(data => {
                    getPictures();
                });
        }
    </script>
</body>

</html>