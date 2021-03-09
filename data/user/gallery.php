<!-- <?php

        // session_start();

        // $uname = "";

        //$uname = $_SESSION['username'];
        ?> -->


<!DOCTYPE html>
<html>

<head>
    <title> Gallery</title>

    <link rel="stylesheet" type="text/css" href="../../styles/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../../styles/gallery.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <style>
        a {
            text-decoration: none !important;
        }

        /* .column {
            float: left;
            display: block;
            width: 30%;
            margin: 10px 10px;
            padding: 0 8px;
        }

       
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

       
        .container {
            padding: 0 16px;
        }

    
        .container::after,
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .title {
            color: grey;
        } */
    </style>

    <script async defer src="/js/gallery.js"></script>


</head>

<body>

    <div class="title-main" style="width:fit-content;height:fit-content">

        <a href="http://localhost/picsxon/index.html" id="anc">
            <p id="main-title">PicsXon</p>
        </a>


    </div>

    <div class="row">
        <div class="col-2 category-list">
            <!-- list -->
            <div class="" style="width: fit-content;">
                <div class="list-group" style="width: fit-content;">
                    <?php

                    //connecting to database
                    $con = mysqli_connect("localhost", "root", "", "picsxon") or die("con Error " . mysqli_error($con));

                    //List query
                    $sqlQuery = 'SELECT DISTINCT category FROM pictures';
                    $sqlResult = mysqli_query($con, $sqlQuery);
                    if (!$sqlResult) {
                        echo "query failed";
                        return;
                    }



                    echo '<a  href="gallery.php"><button type="button" class="list-group-item list-group-item-action ">All</button></a> ';
                    while ($row = mysqli_fetch_array($sqlResult)) {

                        echo '<a href="gallery.php?category=' . $row['category'] . ' " > <button type="button" class="list-group-item list-group-item-action ">' . $row['category'] . ' </button></a> ';
                    }


                    ?>
                </div>
            </div>
        </div>
        <div class="col">
            <!-- picture -->
            <div id="img-conatainer">

                <?php

                //photo upload time indicator function
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

                //Results allowed per page
                $results_per_page = 6;


                //Handling Category Query-Param
                if (!isset($_GET['category'])) {
                    $q = "SELECT * FROM pictures";
                } else {
                    $getCategory = $_GET['category'];
                    // echo  "SELECT * FROM sold WHERE uname='$uname'";
                    $q = "SELECT * FROM pictures WHERE category='$getCategory'";
                }



                $res = mysqli_query($con, $q);

                if (!$res) {
                    echo "query error";
                    return;
                }
                //This will return the number of results in the table
                $number_of_results = mysqli_num_rows($res);



                // determine number of total pages available
                $number_of_pages = ceil($number_of_results / $results_per_page);

                // determine which page number visitor is currently on
                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                // determine the sql LIMIT starting number for the results on the displaying page
                $this_page_first_result = ($page - 1) * $results_per_page;

                if (!isset($_GET['category'])) {

                    $sql = ' SELECT * FROM pictures ORDER BY like_count DESC,id ASC LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
                } else {
                    $getCategory = $_GET['category'];

                    $sql = "SELECT * FROM pictures WHERE category='$getCategory' ORDER BY like_count DESC,id ASC LIMIT " . $this_page_first_result . "," . $results_per_page;
                }



                $result = mysqli_query($con, $sql);
                if (!$result) {
                    echo "query failed";
                    return;
                }

                while ($row = mysqli_fetch_array($result)) {


                    // echo "<div class='row'>";
                    // echo "<div class='column'>";
                    // echo " <div class='card'>";
                    // echo "  <img src='../admin/images/" . $row['path'] . "' alt='Card image cap' style='width:100%'>";

                    // echo "<div class='container'>";
                    // echo " <h5 class='card-title'>" . $row['picture_name'] . "</h5> ";
                    // echo    "<p class='title'>Category:</p>" . $row['category'];
                    // echo  "&nbsp  like:" . $row['like_count'] . "&nbsp  dislike:" . $row['dislike_count'] . "</p>";
                    // echo "<i class='far fa-heart fa-2x'></i>&nbsp &nbsp &nbsp &nbsp <i class='fas fa-heart-broken fa-2x'></i>";
                    // echo "&nbsp &nbsp &nbsp &nbsp";
                    // echo timeAgo($row['timestamp']);
                    // echo "</div>";
                    // echo "</div>";
                    // echo "  </div>";


                    echo "<div class='card' style='width: 18rem;'> ";
                    echo "<img class='card-img-top' src='../admin/images/" . $row['path'] . "' alt='Card image cap'> "; //bootstrap card-view is used
                    echo " <div class='card-body'> ";
                    echo " <h5 class='card-title'>" . $row['picture_name'] . "</h5> ";
                    echo " <p class='card-text'>Category:" . $row['category'] . "&nbsp  like:" . $row['like_count'] . "&nbsp  dislike:" . $row['dislike_count'] . "</p> ";
                    echo "<i class='far fa-heart fa-2x'></i>";
                    echo "&nbsp &nbsp &nbsp &nbsp";
                    echo " <i class='fas fa-heart-broken fa-2x'></i>";
                    echo "&nbsp &nbsp &nbsp &nbsp";
                    echo timeAgo($row['timestamp']); //calling timeago function 

                    echo "  </div> ";
                    echo "  </div> ";
                }


                ?>




            </div>
        </div>
    </div>
    <div class="row-2">
        <!-- pagination -->

        <div class="paginationBar">
            <nav aria-label="...">
                <ul class="pagination pagination-lg">
                    <?php
                    // display the links to the pages
                    if (!isset($_GET['category'])) {

                        for ($page = 1; $page <= $number_of_pages; $page++) {

                            echo  "<li class='page-item'>";
                            echo '<a class="page-link" href="gallery.php?page=' . $page . '" tabindex="-1">' . $page . '</a>';
                            echo " </li>";
                        }
                    } else {
                        $getCategory = $_GET['category'];
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo  "<li class='page-item'>";

                            echo '<a class="page-link" href="gallery.php?page=' . $page . '&category=' . $getCategory . ' " " tabindex="-1">' . $page . '</a>';

                            echo " </li>";
                        }
                    }

                    ?>
                </ul>
            </nav>
        </div>
    </div>






</body>

</html>