<?php
require('../settings/core.php');
require('../controllers/UserController.php');



if (check_login() !==  true || check_login() === NULL ) {
    header('Location: ./auth/login.php');
}
//var_dump($_SESSION['Uid']);
$user = get_user_controller($_SESSION['Uid']);
//var_dump($user);
$partners = get_partner_controller($_SESSION['Uid'], $user['gender'], $user['sexual_orientation']);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swipe Page-Meet someone new!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore.js" defer></script>
    <script src="../js/quickblox.min.js" defer></script>
    <link rel="stylesheet" href="../css/alertify.min.css">
    <script src="../js/alertify.min.js"></script>
    <link rel="stylesheet" href="../css/swipe_page.css">
</head>

<body>
    <div class="top-buttons">
        <button id="profile" onclick="location.href = './profile.php';"><i class="fa-solid fa-user"></i></button>
        <button id="message" onclick="location.href = './messages.php';"><i class="fa-solid fa-message"></i></button>


    </div>
    <div class="tinder">
        <div class="tinder--status">
            <i class="fa fa-remove"></i>
            <i class="fa fa-heart"></i>
        </div>

        <form class="tinder--cards">


            <?php
            foreach ($partners as $partner) {
                $interests = get_user_interests($partner['Uid']);
                echo

                '<div class="tinder--card">
            <img src="../assets/avis/' . $partner['pic_name'] . '">
            <h3>' . $partner['username'] . '</h3>
            <p>Interests</p>

            <input type="hidden" name="liked_users_id" value="' . $partner["Uid"] . '">
            <input type="hidden" name="liked_users_name" value="' . $partner["username"] . '">
            ';
                foreach ($interests as $interest){
                    echo '
                        <ul>
                            <li>'.$interest['interest_name'].'</li>
                        <ul>
                        ';
                }
            echo '</div>';
            }
            
            
            
            
            //var_dump($user);
            //var_dump($user);
            ?>



        </form>

        <div class="tinder--buttons">
            <button id="nope"><i class="fa fa-remove"></i></button>
            <button id="love"><i class="fa fa-heart"></i></button>
        </div>

    </div>


    <script src="../js/hammer.min.js"></script>
    <script src="../js/QBconfig.js" defer></script>
    <script src="../js/swipe_page.js"></script>
    <script src="https://unpkg.com/quickblox/quickblox.min.js"></script>
    <script src="../js/app.js" defer></script>
    <script src="../js/helpers.js" defer></script>
    <script src="../js/user.js" defer></script>
    <script src="../js/login.js" defer></script>
    <script src="../js/dialog.js" defer></script>
    <script src="../js/listeners.js" defer></script>
</body>

</html>