<?php


try {
    $con = mysqli_connect('localhost', 'root', '', 'picsxon');
} catch (MySQli_Sql_Exception $ex) {
    echo "connection Error:" . $ex;
}
// session_start();

// if (!isset($_SESSION['username'])) {
//     header("location:login-pass.php");
// } else {


// $uname = $_SESSION['username'];


$picture_name = '';
$f = '';
$note = '';
$error = '';
$category = '';




if (isset($_POST['submit'])) {


    // $uname = $_SESSION['username'];


    $picture_name = $_POST['picture_name'];
    $category  = $_POST['category'];


    $f = $_FILES['image'];

    $stamp =  date("Y-m-d h:i:sa"); //current time will be used to store the file updation time to database



    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    //$file_ext=strtolower(end(explode('.',$_FILES['image']['name']))); 
    //error enountering in strtolower so disabled
    $file_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $expensions = array("jpeg", "jpg", "png");








    // if (empty($petname) || empty($petage) || empty($breed) || empty($price) || empty($mobile) || empty($address)) {


    //     $error = "<div class='error'> fields are empty </div>";
    // } elseif ($petage > 50) {


    //     $error = 'pet age error';
    // } elseif (!preg_match('/^[0-9]{10}+$/', $mobile)) {
    //     $error = 'mobile no not valid';
    // } elseif (strlen($address) < 10) {

    //     $error = 'small address length';
    // } else {



    //     if (in_array($file_ext, $expensions) === false) {
    //         $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    //     }
    //     if ($file_size > 2097152) {
    //         $errors[] = 'File size must be excately 2 MB';
    //     }
    //     if (empty($errors) == true) {
    //         move_uploaded_file($file_tmp, "images/" . $file_name);

    //         $q = "INSERT INTO pictures(uname,petname,petage,breed,price,mobile,address,img,type,stamp) VALUES ('$uname','$petname','$petage','$breed','$price','$mobile','$address','$file_name','$file_type','$stamp')"; //or die ("query error". mysql_error($con)) ;

    //         $res = mysqli_query($con, $q);
    //         if (!$res) {
    //             $error = "<div class='error'> query failed </div>";
    //         } elseif ($res) {

    //             $petname = '';
    //             $petage = '';
    //             $breed = '';
    //             $price = '';
    //             $mobile = '';
    //             $address = '';
    //             $note = "<div class='note'> pet added successfully </div>";
    //         }
    //     } else {
    //         print_r($errors);
    //     }

    //     //echo "success";
    // }
    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }
    if ($file_size > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
    }
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "images/" . $file_name);

        $q = "INSERT INTO pictures(picture_name,category,path,type,timestamp) VALUES ('$picture_name','$category','$file_name','$file_type','$stamp')"; //or die ("query error". mysql_error($con)) ;

        $res = mysqli_query($con, $q);
        if (!$res) {
            $error = "<div class='error'> query failed </div>";
        } elseif ($res) {

            $picture_name = "";
            $category = "";
            $note = "<div class='note'> picture added successfully </div>";
        }
    } else {
        print_r($errors);
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Picture</title>

    <!-- <link rel="shortcut icon" type="image/x-icon" href="../img/fav2.png" /> -->
    <link rel="stylesheet" href="../../styles/photoupload.css">

    <!-- <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="../../styles/bootstrap.min.css">
</head>

<body>
    <?php
    echo " $error  ";
    echo " $note ";    ?>

    <div class="nav">
        <div class="slide-nav">
            <!-- <span class="nav-user"><?php echo $uname; ?></span> -->

            <!-- <a class="nav-logout" href="log-out.php"><span class="btn btn-danger btn-sm">logout</span></a> -->
        </div>
    </div>
    <div class="title-main">

        <a href="http://localhost/picsxon/index.html" id="hov">
            <p id="dogger">Picsxon</p>
        </a>

    </div>

    <center>
        <div id="head">



            <form action="" method="POST" enctype="multipart/form-data">

                <table>

                    <tr>

                        <th>Picture Name</th>
                        <td> <input type="text" name="picture_name" placeholder="Enter name of Picture" value="<?php echo $picture_name; ?>" required="" autofocus></td>

                    </tr>
                    <tr>

                        <th>Category</th>
                        <td> <input type="text" name="category" placeholder="Picture Categrory" value="<?php echo $category; ?>" required="" autofocus></td>

                    </tr>



                    <tr>
                        <th>Pet Photo</th>
                        <td><input type="file" name="image" class="btn btn-dark btn-sm" required></td>


                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" class="btn btn-dark btn-sm"></td>
                        <td> <input type="reset" name="reset" class="btn btn-dark btn-sm"></td>


                    </tr>


                </table>

            </form>
    </center>
    </div>

</body>

</html>
<!-- closing bracket is missing php -->