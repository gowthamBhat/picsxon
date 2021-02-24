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


</head>

<body>

    <div class="title-main" style="width:fit-content;height:fit-content">

        <a href="http://localhost/picsxon/index.html" id="anc">
            <p id="main-title">PicsXon</p>
        </a>


    </div>
    <div class="col">
        <div class="row">
            <div id="img-conatainer">

                <?php
                //connecting to database
                $con = mysqli_connect("localhost", "root", "", "picsxon") or die("con Error " . mysqli_error($con));



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

                //Results that allowed per page
                $results_per_page = 8;

                //Retreving all the data
                $q = "SELECT * FROM pictures";

                $res = mysqli_query($con, $q);

                if (!$res) {
                    echo "query error";
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

                $sql = ' SELECT * FROM pictures ORDER BY like_count DESC LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
                $result = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_array($result)) {


                    echo "<div class='card' style='width: 18rem;'> ";
                    echo "<img class='card-img-top' src='../admin/images/" . $row['path'] . "' alt='Card image cap'> "; //bootstrap card-view is used
                    echo " <div class='card-body'> ";
                    echo " <h5 class='card-title'>" . $row['picture_name'] . "</h5> ";
                    echo " <p class='card-text'>Category:" . $row['category'] . "&nbsp  like:" . $row['like_count'] . "&nbsp  dislike:" . $row['dislike_count'] . "</p> ";

                    echo timeAgo($row['timestamp']); //calling timeago function 

                    echo "  </div> ";
                    echo "  </div> ";
                }


                ?>




            </div>
        </div>

        <div class="row">
            <div class="paginationBar">
                <nav aria-label="...">
                    <ul class="pagination pagination-lg">
                        <?php
                        // display the links to the pages
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo  "<li class='page-item'>";
                            echo '<a class="page-link" href="gallery.php?page=' . $page . '" tabindex="-1">' . $page . '</a>';
                            echo " </li>";
                            // echo '<a class="" href="gallery.php?page=' . $page . '">' . $page . '</a> ';
                        }

                        ?>
                    </ul>
                </nav>
            </div>

        </div>
    </div>







</body>

</html>