<?php

session_start();
require('../controllers/UserController.php');
//if swiped yes populate user_like table
if (isset($_POST["love"])) {
    // echo $_POST['love'];
    $isLove = $_POST['love'];
    //get username of both parties.
    $likee_username = $_POST['liked_users_id'];
    $liker_username = $_SESSION['Uid'];
    if ($isLove == 1) {
        $record_like = recordLikeController($likee_username,  $liker_username, 'l');
        // echo 'passed here';
    } else {
        $record_like = recordLikeController($likee_username,  $liker_username, 'd');
        // echo 'passed here too';
    }
    //populate user likes table with who you like.


    //match algo
    // check if there exists a record with both id but with likee in the position of liker


    $check_for_match = checkMatchController($likee_username,  $liker_username);

    if ($check_for_match) {
        // insert record into match table
        record_success_match_controller($likee_username,  $liker_username);
        $likeeEmail = getLikeeEmail($likee_username);


        echo 'true ' . $likeeEmail['email'];
    } else {
        if ($_POST['love'])
            echo 'you liked ' . $likee_username;
        else
            echo 'you disliked ' . $likee_username;
    }
}

