<?php

require('../settings/core.php');
/*if (check_login() ===  false) {
    header('Location: ./auth/login.php');
}*/
require('../controllers/UserController.php');

//var_dump($_SESSION['Uid']);

$user = get_user_controller($_SESSION['Uid']);

//header('Location: ./auth/login.php');
$interest = get_user_interests($_SESSION['Uid']);


//var_dump($user);
//die;
// echo $pImage;
$imageUrl = "../assets/avis/" . $user['pic_name'];
//require_once "../../action/userlike.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel="stylesheet">
    <link rel="stylesheet" href="../css/profile2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/swipe_page.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet">


    <title>Profile page</title>
</head>

<body style="background-color: #ccfbfe;">
    <div class="top-buttons">
        <button id="profile" onclick="location.href = './profile.php';"><i class="fa-solid fa-user"></i></button>
        <button id="message" onclick="location.href = './messages.php';"><i class="fa-solid fa-message"></i></button>
        <form action="./auth/logout" method="post">
            <input type="submit" class="btn" value="Logout" name="logout">
        </form>
    </div>





    <div class="row">
        <!-- Use profile col-->
        <div class="col-3" style="height:100%; background-color:blue;">
            <div class="userCol">
                <div class="card" style="width: 34rem; height:500px; margin-left:20px;">
                    <img src=<?php echo $imageUrl; ?> class="rounded-circle" alt="..." style="width:150px; height:150px; text-align:center; ">
                    <div class="card-body">
                        <h4 class="card-text">
                            <?php echo $user['username'] ?></h4>
                        <div class=""><a href="updateprofile.php">
                                <i class="fa-solid fa-file-pen"></i>
                                Update
                            </a>
                        </div>
                    </div>


                </div>

            </div>
        </div>

        <!-- Like By Coloumn -->
        <div class="col-6" style="height: 100%;">

            <div class="row flex-grow-1">
                <div class="card " style="height: 250px;">
                    <h5><?php echo $user['fname'] ?></h5>
                    <h5>Age</h5>
                    <h5><?php echo $user['course_title'] ?></h5>

                    <?php
                    if (isset($interest)) {
                        foreach ($interest as $int) {
                            echo "
                            <h5 class='desc'>" . $int['interest_name'] . "</h5>";
                        }
                    }
                    ?>


                    <div class="bottom">
                        <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher" href="https://plus.google.com/+ahmshahnuralam">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a class="btn btn-primary btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
                            <i class="fa fa-behance"></i>
                        </a>
                    </div>

                </div>


            </div>
            <!-- Row for friends in the chat -->
            <div class="container horizontal-scrollable">

                <div class="row">
                    <div class="col-9">
                        <h3 class="mb-3">Friends </h3>
                    </div>

                    <div class="col-12">

                        <div class="row">

                            <?php
                            $friends = getUserMatch($_SESSION['Uid']);
                            //echo $friends['Uid'];
                            if (isset($friends)) {
                                for ($i = 0; $i < count($friends); $i++) {
                                    //echo $friends[$i]['Iid'];
                                    $user_friends = get_user_controller($friends[$i]['Iid']);

                            ?>

                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="rounded-circle img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                            <div class="card-body">
                                                <h4 class="card-title"><?php echo $user_friends['username'];
                                                                    }
                                                                } ?>
                                                </h4>
                                                <p class="card-text">User Intrests</p>
                                                <button type="button" class="btn btn-success">Chat</button>
                                            </div>

                                        </div>
                                    </div>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <button type="button" class="btn btn-success">Chat</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-3" style="height: 100%">

            <h3>Liked By</h3>
            <div class="" style="margin: 20px; height: 500px; overflow:hidden; overflow-y:auto; ">
                <?php
                $likes = get_likes($_SESSION['Uid']);
                if (!empty($likes)) {
                    foreach ($likes as $uLikes) {
                        $user_liker = get_user_controller($uLikes['lid']);
                    }
                }
                ?>
                <div class="row ">
                    <div class="card">
                        <img class="rounded-circle img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                        <div class="card-body">
                            <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <button type="button" class="btn btn-success">Chat</button>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/quickblox/quickblox.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>

</body>

</html>