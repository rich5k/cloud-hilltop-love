<?php
require('../settings/core.php');
require('../controllers/UserController.php');

$user = get_user_controller($_SESSION['Uid']);

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
    <link rel="stylesheet" href="../css/swipe_page.css">
</head>

<body>
    <div class="top-buttons">
        <button id="profile" onclick="location.href = './profile.php';"><i class="fa-solid fa-user"></i></button>
        <button id="message" onclick="location.href = './messages.php';"><i class="fa-solid fa-message"></i></button>
        <a href="./auth/logout.php" class="btn">Logout</a>
    </div>
    <div class="tinder">
        <div class="tinder--status">
            <i class="fa fa-remove"></i>
            <i class="fa fa-heart"></i>
        </div>

        <div class="tinder--cards">
            
            <?php 
            foreach($partners as $partner) { 
            echo '<div class="tinder--card">
            <img src="../assets/avis/'.$partner['pic_name'].'">
            <h3>'.$partner['username'].'</h3>
            <p></p>
            </div>';
            
            }
            //var_dump($user);
            ?>
          


        </div>

        <div class="tinder--buttons">
            <button id="nope"><i class="fa fa-remove"></i></button>
            <button id="love"><i class="fa fa-heart"></i></button>
        </div>
    </div>

    <script src="../js/hammer.min.js"></script>
    <script src="../js/swipe_page.js"></script>
    <script src="https://unpkg.com/quickblox/quickblox.min.js"></script>
</body>

</html>