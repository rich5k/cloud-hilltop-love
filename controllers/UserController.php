<?php
require("../classes/User.php");

function add_user_controller($fname, $lname, $username, $email, $pass, $twitter, $instagram, $gender, $class, $sexual_orientation, $dob, $major, $phone, $role){
    $user_instance = new user();
    return $user_instance->adduser($fname, $lname, $username, $email, $pass, $twitter, $instagram, $gender, $class, $sexual_orientation, $dob, $major, $phone, $role);
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

function find_email($email) {
    $user_instance = new user();
    return $user_instance->findEmail($email);
}

function find_user_id($email) {
    $user_instance = new user();
    return $user_instance->findID($email);
}

// function find_user_role($email){
//     $user_instance = new user();
//     return $user_instance->find_role($email);
// }

// function get_user_controller($id){
//     $user_instance = new user();
//     return $user_instance->get_user($id);
// }

// function get_user_service_controller($id) {
//     $user_instance = new user();
//     return $user_instance->get_user_service($id);
// }














?>