<?php
require("../classes/User.php");

function add_user_controller($fname, $lname, $username, $email, $pass,  $gender, $twitter, $instagram, $class, $sexual_orientation, $dob, $major, $phone){
    $user_instance = new user();
    return $user_instance->adduser($fname, $lname, $username, $email, $pass,  $gender, $twitter, $instagram, $class, $sexual_orientation, $dob, $major, $phone);
}

function delete_user_controller($id){
    $user_instance = new user();
    return $user_instance->deleteuser($id);
}

function update_user_controller($id,$fname, $lname, $username, $email, $pass, $twitter, $instagram, $gender, $class, $sexual_orientation, $dob, $major, $phone){
    $user_instance = new user();
    return $user_instance->edituser($id,$fname, $lname, $username, $email, $pass, $twitter, $instagram, $gender, $class, $sexual_orientation, $dob, $major, $phone);
}

function find_user_controller($email){
    $user_instance = new user();
    return $user_instance->finduser($email);
}

function find_email_controller($email) {
    $user_instance = new user();
    return $user_instance->findEmail($email);
}

function find_user_id_controller($email) {
    $user_instance = new user();
    return $user_instance->findID($email);
}

function add_image_controller($Uid, $image_1){
    $user_instance = new user();
    return $user_instance->addImage($Uid, $image_1);
}

function update_image_controller($id,$image_1){
    $user_instance = new User();
    return $user_instance->updateImage($id,$image_1);
}

function get_user_controller($id){
    $user_instance = new user();
    return $user_instance->getUser($id);
}

function get_partner_controller($id, $gender, $sexual_orientation){
    $user_instance = new User();
    return $user_instance->getPartner($id, $gender, $sexual_orientation);
}


function get_all_user_images_controller($id){
    $user_instance = new User();
    return $user_instance->getAllUserImages($id);
}

function recordLikeController( $likee_username,  $liker_username){
    $user_instance = new User();
    return $user_instance->recordLike( $likee_username,  $liker_username);

}


function checkMatchController ($likee_username,  $liker_username){
    $user_instance = new User();
    return $user_instance->recordLike( $likee_username,  $liker_username);

}

function record_success_match_controller($likee_username,  $liker_username){
    $user_instance = new User();
    return $user_instance->record_success_match( $likee_username,  $liker_username);

}

function get_user_messages($id){
    $user_instance = new User();
    return $user_instance->getUserMessages($id);
}