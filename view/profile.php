<?php

require('../settings/core.php');
if (check_login() ===  false) {
    header('Location: ./auth/login.php');
}
require('../controllers/UserController.php');

//var_dump($_SESSION['Uid']);

$user = get_user_controller($_SESSION['Uid']);

//header('Location: ./auth/login.php');
$interest = get_user_interests($_SESSION['Uid']);


//var_dump($user);
//die;
// echo $pImage;
$imageUrl = "../assets/avis/" . $user['pic_name'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel="stylesheet">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/swipe_page.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>

    <div class="top-buttons">
        <button id="profile" onclick="location.href = './profile.php';"><i class="fa-solid fa-user"></i></button>
        <button id="message" onclick="location.href = './messages.php';"><i class="fa-solid fa-message"></i></button>
        <form action="./auth/logout" method="post">
            <input type="submit" class="btn" value="Logout" name="logout">
        </form>
    </div>
    <div class="userProfile">

        <div class="pic_session">
            <div class="avatar">
                <img alt="" src=<?php echo $imageUrl; ?>>
            </div>

        </div>



        <div class="row">
            <div class="col-lg-3" id="user_card">

                <div class="card hovercard">


                    <div class="info">
                        <div class="title">
                            <a target="_blank"><?php echo $user['username'] ?></a>
                        </div>
                        <div class="desc"><?php echo $user['fname'] . ' ' . $user['lname'] ?></div>
                        <div class="desc">Age</div>
                        <div class="desc"><?php echo $user['course_title'] ?></div>
                        <?php
                        if (isset($interest)) {
                            foreach ($interest as $int) {
                                echo "
                                    <span class='desc'>" . $int['interest_name'] . "</span>";
                            }
                        }
                        ?>

                    </div>
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
                    <div class="btn"><a href="updateprofile.php">
                            Update
                        </a></div>


                </div>











                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

                <script src="https://unpkg.com/quickblox/quickblox.min.js"></script>
                <script>

                </script>
</body>

</html>