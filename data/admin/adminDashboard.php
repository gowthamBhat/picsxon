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
    <nav>
        <div class="nav-container-upload">


            <a href="photoupload.php"><button class="nav btn btn-dark testing">Upload Photo</button></a>

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

            <table class='table-data'>

                <?php

                include '../../database/DBconnection.php';

                $search_query = "SELECT * FROM users";
                $res = mysqli_query($con,  $search_query);



                echo "<div class='user-count'>Available Users - <button class='btn btn-dark'> " . mysqli_num_rows($res) . " </button></div>";

                echo "
							<div style='clear:both;'></div>
							<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
                        <th></th>

					</tr>
				</thead>";

                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td> &nbsp&nbsp&nbsp" . $row['email'] . "</td>";
                    echo "<td> <button class='btn btn-danger btn-sm' onclick=caller(" . $row['id'] . ")>X</button></td>";
                    echo "</tr>";
                }


                ?>
            </table>

        </div>
    </div>

    <script>
        function caller(id) {

            fetch(`respon.php?id=${id}`)
                .then(response => response.json())
                .then(data => {
                    location.reload();
                });
        }
    </script>

</body>

</html>