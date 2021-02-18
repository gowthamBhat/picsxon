<!-- <?php

        // session_start();

        // $uname = "";

        //$uname = $_SESSION['username'];
        ?> -->


<!DOCTYPE html>
<html>

<head>
    <title> Pet Market</title>
    <!-- <style type="text/css">
		
		img 
		{
			height: 300px;
			width: 300px;
		} </style> -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="../img/fav2.png" /> -->
    <link rel="stylesheet" type="text/css" href="../../styles/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../styles/gallery.css">

    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
</head>

<body>
    <div class="title-main">

        <a href="http://localhost/dogger/index.html" id="anc">
            <p id="dogger">PicsXon</p>
        </a>


    </div>

    <div class="nav">

        <?php
        if (isset($_SESSION['username'])) {
            $uname =    $_SESSION['username'];
            echo "<p class='uname'>$uname</p>";
        }   ?>
        <a href="login-pass.php"><input type="button" name="addpet" class="gow btn btn-dark" width="50px" value="Add Pet"> </a> &nbsp
        <?php
        if (isset($_SESSION['username'])) {
            $uname = $_SESSION['username'];

            echo " <a href='mypets.php'><input type='button' name='mypets' class='gow3 btn btn-dark'  width='50px' value='My Pets'> </a> ";
            echo " <a href='myorders.php'><input type='button' name='orders' class='gow3 btn btn-dark'  width='50px' value='My Orders'> </a> ";
            echo " <a href='log-out.php'><input type='button' name='log-out' class='gow3 btn btn-danger'  width='50px' value='Logout'> </a> ";
        }

        ?>



    </div>

    <div id="img-conatainer">

        <?php

        $con = mysqli_connect("localhost", "root", "", "picsxon") or die("con Error " . mysqli_error($con));




        function timeAgo($time_ago)
        {
            $time_ago = strtotime($time_ago);
            $cur_time   = time();
            $time_elapsed   = $cur_time - $time_ago;
            $seconds    = $time_elapsed;
            $minutes    = round($time_elapsed / 60);
            $hours      = round($time_elapsed / 3600);
            $days       = round($time_elapsed / 86400);
            $weeks      = round($time_elapsed / 604800);
            $months     = round($time_elapsed / 2600640);
            $years      = round($time_elapsed / 31207680);
            // Seconds
            if ($seconds <= 60) {
                return "just now";
            }
            //Minutes
            else if ($minutes <= 60) {
                if ($minutes == 1) {
                    return "one minute ago";
                } else {
                    return "$minutes minutes ago";
                }
            }
            //Hours
            else if ($hours <= 24) {
                if ($hours == 1) {
                    return "an hour ago";
                } else {
                    return "$hours hrs ago";
                }
            }
            //Days
            else if ($days <= 7) {
                if ($days == 1) {
                    return "yesterday";
                } else {
                    return "$days days ago";
                }
            }
            //Weeks
            else if ($weeks <= 4.3) {
                if ($weeks == 1) {
                    return "a week ago";
                } else {
                    return "$weeks weeks ago";
                }
            }
            //Months
            else if ($months <= 12) {
                if ($months == 1) {
                    return "a month ago";
                } else {
                    return "$months months ago";
                }
            }
            //Years
            else {
                if ($years == 1) {
                    return "one year ago";
                } else {
                    return "$years years ago";
                }
            }
        }









        $q = "SELECT * FROM picsxon";

        $res = mysqli_query($con, $q);

        if (!$res) {
            echo "query error";
        }

        while ($row = mysqli_fetch_array($res)) //for-loop can also be used
        {
            $petname = $row['petname'];
            /*	
										echo "<div class='main-img'>";


										echo "<img src='images/" . $row['img']."'/>";

										echo "</div>"; */

            echo "<div class='card' style='width: 18rem;'> ";
            echo "<img class='card-img-top' src='images/" . $row['img'] . "' alt='Card image cap'> "; //bootstrap card-view is used
            echo " <div class='card-body'> ";
            echo " <h5 class='card-title'>" . $row['petname'] . "</h5> ";
            echo " <p class='card-text'>Breed:" . $row['breed'] . "&nbsp &nbsp  Age:" . $row['petage'] . "</p> ";
            echo "   <a href='adopt.php?petname=$petname' class='btn btn-primary'>Adopt</a> ";
            echo "Price:" . $row['price'] . "<br>";
            echo timeAgo($row['stamp']); //calling timeago function 

            echo "  </div> ";
            echo "  </div> ";
        }
        ?>


    </div>

</body>

</html>