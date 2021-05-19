<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:../../auth/admin_auth/login.php');
} else {
    $admin_name = $_SESSION['admin'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../styles/normalize.css">
        <link rel="stylesheet" href="../../styles/AdminDashBoard.css">
        <link rel="stylesheet" href="../../styles/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
        <script defer src="../../js/adminDashboardScript.js"></script>
        <style>
            a:link {
                text-decoration: none !important;
            }

            .list-hide {
                display: block;
            }
        </style>
        <title>Admin panel</title>
    </head>

    <body style="background-color:black;">
        <div class="container">
            <a href="../../index.html">
                <h1 class="title">Picsxon</h1>
            </a>
            <nav>
                <div class="nav-list">



                    <button id="user-list-view" class="child-nav btn btn-dark">View Users</button>
                    <button id="getPictures" class="child-nav btn btn-dark">Get Pictures</button>
                    <button id="getSuperUserList" class="child-nav btn btn-warning">Requests</button>
                    <a href="photoupload.php"><button class="child-nav btn btn-dark">Upload Photo</button></a>
                    <a href="../../auth/admin_auth/register.php"><button id="addAdmin" class="child-nav btn btn-dark">Add Admin</button></a>
                    <a href="../../auth/user_auth/logout.php"> <button class="child-nav btn btn-danger">Logout</button></a>

                </div>


            </nav>
            <center>
                <div id="image-container">
                    <figure>
                        <img id="admin" src="../../images/admin.png" alt="admin img" width="330" height="330">
                        <i class="fas fa-camera-retro fa-2x" id="cam-icon" title="upload new image"></i>

                        <figcaption><?php echo $admin_name; ?></figcaption>
                    </figure>
                </div>
            </center>
            <div class="table-container">
                <table class='table-data' id="power-table">
                </table>
            </div>

    </body>

    </html>
<?php } ?>