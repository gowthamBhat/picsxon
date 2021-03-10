<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/AdminDashBoard.css">
    <link rel="stylesheet" href="../../styles/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <style>
        a:link {
            text-decoration: none !important;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <nav>
        <div class="nav-container">
            <a href="photoupload.php"><button class="nav btn btn-dark testing">Upload Photo</button></a>
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


    <div class="list-container">
        <div class="user-list">
            <table class='table-data'>

                <?php

                $con  = mysqli_connect('localhost', 'root', '', 'picsxon');

                $search_query = "SELECT * FROM users";
                $res = mysqli_query($con,  $search_query);



                echo "<div class='user-count'>Available Users - <button class='btn btn-dark'> " . mysqli_num_rows($res) . " </button></div>";

                echo "
							<div style='clear:both;'></div>
							<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>

					</tr>
				</thead>";

                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "</tr>";
                }


                ?>
            </table>

        </div>
    </div>



</body>

</html>