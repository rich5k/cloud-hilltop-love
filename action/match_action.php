<?php

//if swiped yes populate user_like table
if (isset($_POST["swipe_like"])) {

    //get username of both parties.
    $likee_username = $_GET['likee_username'];
    $liker_username = $_GET['liker_username'];

    //populate user likes table with who you like.
    $record_like = recordLikeController( $likee_username,  $liker_username);

    //match algo
    // check if there exists a record with both id but with likee in the position of liker

    $check_for_match = checkMatchController ($likee_username,  $liker_username);

    if ($check_for_match == true) {
        // insert record into match table
        record_success_match_controller($likee_username,  $liker_username);
        // send successful match notification
        exit;
    } else {
        // not a match event
    
    }


}

?>