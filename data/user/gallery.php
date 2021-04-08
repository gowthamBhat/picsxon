 <?php

    session_start();

    if (!isset($_SESSION['username'])) {
        header('location:../../auth/user_auth/login.php');
    } else {
        $uname  = $_SESSION['username'];
        $userId = $_SESSION['id'];

    ?>


     <!DOCTYPE html>
     <html>

     <head>
         <title> Gallery</title>

         <link rel="stylesheet" type="text/css" href="../../styles/bootstrap.min.css">

         <link rel="stylesheet" type="text/css" href="../../styles/gallery.css">
         <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" /> -->
         <link rel="stylesheet" href="../../styles/css/all.css">
         <script src="../../js/jquery.js"></script>

         <script defer src="vote.js"></script>
         <script defer src="../../js/gallery.js"></script>

         <style>
             a {
                 text-decoration: none !important;
             }

             i {
                 text-decoration: none !important;
             }
         </style>



     </head>

     <body>

         <div class="title-main" style="width:fit-content;height:fit-content">

             <a href="http://localhost/picsxon/index.html" id="anc">
                 <p id="main-title">PicsXon</p>
             </a>
             <nav>

                 <a href="../../data/user/userPhotoUpload.php"><button id="superUserPhotoUpload" class="btn btn-outline-primary">Upload Photo</button></a>
                 <button class="btn btn-outline-success" id="super-btn" name="super" onclick="superusercaller(<?php echo $userId; ?> )">Request Super User</button>
                 <a href="../../auth/user_auth/logout.php"><button id="logout-btn" class="btn btn-outline-danger">Logout</button></a>
             </nav>


         </div>

         <div class="row">
             <div class="col-2 category-list">
                 <!-- list -->
                 <div class="" style="width: fit-content;">
                     <div class="list-group" style="width: fit-content;">
                         <?php

                            include('Posts.php');
                            $posts = new Posts();
                            $postsData = $posts->getPosts(); //from like component

                            //connecting to database
                            // $con = mysqli_connect("localhost", "root", "", "picsxon") or die("con Error " . mysqli_error($con));
                            include '../../database/DBconnection.php';

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

                            $sql = ' SELECT * FROM pictures ORDER BY vote_up DESC,post_id ASC LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
                        } else {
                            $getCategory = $_GET['category'];

                            $sql = "SELECT * FROM pictures WHERE category='$getCategory' ORDER BY vote_up DESC,post_id ASC LIMIT " . $this_page_first_result . "," . $results_per_page;
                        }



                        $result = mysqli_query($con, $sql);
                        if (!$result) {
                            echo "query failed";
                            return;
                        }

                        while ($row = mysqli_fetch_array($result)) {




                            echo "<div class='card' style='width: 18rem;'> ";
                            echo "<a href='../admin/images/" . $row['path'] . "'> <img class='card-img-top' src='../admin/images/" . $row['path'] . "' alt='Card image cap'> </a> "; //bootstrap card-view is used
                            echo " <div class='card-body'> ";
                            echo " <h5 class='card-title'>" . $row['picture_name'] . "</h5> ";
                            echo " <label class='card-text'>Category:&nbsp" . $row['category'] . "</label>";
                            echo "<br/>";
                            echo " Contributor: @" . $row['contributor'];
                            echo "<br/>";
                            echo "<a class='options' data-vote-type='1' id='post_vote_up_" . $row['post_id'] . "'><i class='far fa-heart fa-1x' data-original-title='Like this post'></i></a>";
                            echo "<span class='counter' id='vote_up_count_" . $row['post_id'] . "'>&nbsp;&nbsp;" . $row['vote_up'] . "</span>&nbsp;&nbsp;&nbsp";
                            echo "<a class='options' data-vote-type='0' id='post_vote_down_ " . $row['post_id'] . "'><i class='fas fa-heart-broken fa-1x' data-original-title='Dislike this post' ></i></a>";
                            echo "<span class='counter' id='vote_down_count_" . $row['post_id'] . "'>&nbsp;&nbsp;" . $row['vote_down'] . "</span>";
                            //  echo " <p class='card-text'>Category:" . $row['category'] . "&nbsp  like:" . $row['vote_up'] . "&nbsp  dislike:" . $row['vote_down'] . "</p> ";
                            // echo "<i class='far fa-heart fa-2x'></i>";
                            //echo "&nbsp &nbsp &nbsp &nbsp";

                            echo "&nbsp&nbsp&nbsp";
                            echo "<a href='../admin/images/" . $row['path'] . "' download><i class='fas fa-download'></i></a>";
                            echo "&nbsp&nbsp&nbsp";
                            $time = timeAgo($row['timestamp']);
                            echo "<strong><label>$time</label> </strong>"; //calling timeago function 

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
                                    echo '<a class="page-link" href="gallery.php?page=' . $page . '" >' . $page . '</a>';
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




         <script>
             function superusercaller(id) {
                 var x = document.getElementById('super-btn');

                 fetch(`superUpdate.php?id=${id}`)
                     .then(response => response.json())
                     .then(data => {
                         console.log(data);
                         x.innerHTML = "Requested";
                         x.className = "btn btn-warning";
                         x.disabled = true;
                     });

             }

             (function isSuperUserFinder() {
                 var x = document.getElementById('super-btn');
                 var uploadButton = document.getElementById('superUserPhotoUpload');
                 var id = <?php echo $userId; ?>;
                 fetch(`checkStatus.php?id=${id}`)
                     .then(response => response.json())
                     .then(data => {
                         console.log(data);
                         console.log(data[0][4]);
                         if (data[0][5] == 'accepted') {
                             x.innerHTML = "Super User";
                             x.className = "btn btn-success";
                             x.disabled = true;
                             uploadButton.style.display = 'block';

                         }
                         if (data[0][5] == 'pending') {
                             x.innerHTML = "Request Pending";
                             x.className = "btn btn-warning";
                             x.disabled = true;
                         }
                         if (data[0][5] == 'declined') {
                             x.innerHTML = "rejected";
                             x.className = "btn btn-danger";
                             x.disabled = true;
                         }
                         if (data[0][5] == 'fresh') {
                             x.innerHTML = "Request SuperUser";
                             x.className = "btn btn-info";
                         }
                         //  x.innerHTML = "Requested";
                         //  x.className = "btn btn-warning";
                         //  x.disabled = true;
                     });



             })();
         </script>

     </body>

     </html>

 <?php } ?>